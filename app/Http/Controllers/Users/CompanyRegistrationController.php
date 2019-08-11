<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Helpers\FunctionHelpers;
use App\Http\Controllers\Controller;
use App\Models\RegistrationTransaction;
use App\Models\CompanyRegistration;
use App\Models\BodyObjective;
use App\Models\PartnersAndDirector;
use App\Models\RegistrationItem;
use App\Models\Shareholding;
use App\Models\Secretary;
use App\Models\Name;
use App\Models\UserSpecialDiscount;
use App\Models\Item;
use Auth;
use File;
use Image;
use Storage;

class CompanyRegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.users.company.index');
    }

    public function create()
    {
        return view('dashboard.users.company.create');
    }

    public function store(Request $request)
    {  
        // dd($request->all());
        $issue = null;
        $amount = null;

        // if the company type is private liability 
        if($request->company_type){
            $type = $request->company_type;                      
        }

        $serviceAmount = Item::where('slug', $type)->first();
        
        // returned from FunctionHelpers if there is an issue
        $issue = FunctionHelpers::amountIssue($serviceAmount);

        // return finalamount from FunctionHelpers after checking if there are discounts
        $amount = FunctionHelpers::rolesAndSpecialDiscounts($serviceAmount, $request);

        // dd($request->all());
        $companyRegistration = new CompanyRegistration;
        $secretary = new Secretary;

        $companyRegistration->company_address = $request->company_address;
        $companyRegistration->company_email = $request->company_email;
        $companyRegistration->company_type = $request->company_type;
        $companyRegistration->company_share_capital = $request->company_share_capital;
        $companyRegistration->save();
        
        // save all the company names
        foreach($request->company_name_details as $company_name){
            $name = new Name;
            $name->name = $company_name['company_name'];
            $companyRegistration->companyNames()->save($name);
        }

        // all save all the company objectives
        foreach($request->company_objective_details as $company_objective_detail){
            $objective = new BodyObjective;
            $objective->description = $company_objective_detail['company_objective'];
            $objective->user_id = Auth::id();
            $companyRegistration->bodyObjectives()->save($objective);
        }

         // all save all the company partners and directors
        foreach($request->company_partners_details as $company_partners_detail){
            $partnersAndDirector = new PartnersAndDirector;
            $partnersAndDirector->full_name = $company_partners_detail['full_name'];
            $partnersAndDirector->email = $company_partners_detail['email'];
            $partnersAndDirector->identity_type = $company_partners_detail['identity_type'];
            $partnersAndDirector->identity_no = $company_partners_detail['identity_no'];
            $partnersAndDirector->phone_number = $company_partners_detail['phone_number'];
            $partnersAndDirector->gender = $company_partners_detail['gender'];
            $partnersAndDirector->dob = $company_partners_detail['dob'];
            $partnersAndDirector->nationality = $company_partners_detail['nationality'];
            $partnersAndDirector->address = $company_partners_detail['address'];
            $partnersAndDirector->city = $company_partners_detail['city'];
            $partnersAndDirector->state = $company_partners_detail['state'];
            $partnersAndDirector->country = $company_partners_detail['country'];

            if ($company_partners_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $company_partners_detail['upload_id'], 
                    $company_partners_detail['full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/partners/upload_id/', 
                    $partnersAndDirector->upload_id
                );
                $oldFilename = $partnersAndDirector->upload_id;
                // add the new photo
                $partnersAndDirector->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($company_partners_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $company_partners_detail['signature'], 
                    $company_partners_detail['full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/partners/signature/', 
                    $partnersAndDirector->upload_id
                );
                $oldFilename = $partnersAndDirector->signature;
                // add the new photo
                $partnersAndDirector->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }
            $companyRegistration->partnersAndDirectors()->save($partnersAndDirector);
        }

        // all save all the company secretaries
        foreach($request->company_secretary_details as $company_secretary_detail){
            $secretary = new Secretary;
            $secretary->secretary_full_name = $company_secretary_detail['secretary_full_name'];
            $secretary->secretary_email = $company_secretary_detail['secretary_email'];
            $secretary->secretary_identity_type = $company_secretary_detail['secretary_identity_type'];
            $secretary->secretary_identity_no = $company_secretary_detail['secretary_identity_no'];
            $secretary->secretary_phone_number = $company_secretary_detail['secretary_phone_number'];
            $secretary->secretary_gender = $company_secretary_detail['secretary_gender'];
            $secretary->secretary_dob = $company_secretary_detail['secretary_dob'];
            $secretary->secretary_rc_no = $company_secretary_detail['secretary_rc_no'];

            if ($company_secretary_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $company_secretary_detail['upload_id'], 
                    $company_secretary_detail['secretary_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/secretary/upload_id/', 
                    $secretary->upload_id
                );
                $oldFilename = $secretary->upload_id;
                // add the new photo
                $secretary->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($company_secretary_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $company_secretary_detail['signature'], 
                    $company_secretary_detail['secretary_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/secretary/signature/', 
                    $secretary->upload_id
                );
                $oldFilename = $secretary->signature;
                // add the new photo
                $secretary->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }            
            $companyRegistration->secretaries()->save($secretary);
        }

        // all save all the company shareholders
        foreach($request->company_shareholders_details as $company_shareholders_detail){ 
            $shareholding = new Shareholding;     
            $shareholding->shareholder_full_name = $company_shareholders_detail['shareholder_full_name'];
            $shareholding->shareholder_email = $company_shareholders_detail['shareholder_email'];
            $shareholding->shareholder_identity_type = $company_shareholders_detail['shareholder_identity_type'];
            $shareholding->shareholder_identity_no = $company_shareholders_detail['shareholder_identity_no'];
            $shareholding->shareholder_phone_number = $company_shareholders_detail['shareholder_phone_number'];
            $shareholding->shareholder_gender = $company_shareholders_detail['shareholder_gender'];
            $shareholding->shareholder_dob = $company_shareholders_detail['shareholder_dob'];
            $shareholding->shareholder_address = $company_shareholders_detail['shareholder_address'];
            // $shareholding->shareholder_nationality = $company_shareholders_detail['shareholder_nationality'];
            // $shareholding->shareholder_city = $company_shareholders_detail['shareholder_city'];
            // $shareholding->shareholder_state = $company_shareholders_detail['shareholder_state'];
            // $shareholding->shareholder_country = $company_shareholders_detail['shareholder_country'];
            $shareholding->shares = $company_shareholders_detail['shareholder_shares'];
            $shareholding->user_id = Auth::id();

            if ($company_shareholders_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $company_shareholders_detail['upload_id'], 
                    $company_shareholders_detail['shareholder_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/shareholders/upload_id/', 
                    $shareholding->upload_id
                );
                $oldFilename = $shareholding->upload_id;
                // add the new photo
                $shareholding->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($company_shareholders_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $company_shareholders_detail['signature'], 
                    $company_shareholders_detail['shareholder_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/shareholders/signature/', 
                    $shareholding->upload_id
                );
                $oldFilename = $shareholding->signature;
                // add the new photo
                $shareholding->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            } 

            $companyRegistration->shareholdings()->save($shareholding);
        }

        $transaction = new RegistrationTransaction;
        $transaction->execution = "No Execution";
        $transaction->status = "pending";
        $transaction->issues = $issue;
        $transaction->amount = $amount;
        $transaction->identifier = $companyRegistration->identifier;
        $transaction->user_id = Auth::id();

        $companyRegistration->registrationTransactions()->save($transaction);

        return redirect()->route('company.show', $companyRegistration->identifier);
    }

    public function show($id)
    {
        $company = CompanyRegistration::where('identifier', $id)->first();
        if($company == null){
            return redirect()->back();
        }
        return view('dashboard.users.company.show')
                ->with('company', $company);
    }

    public function edit($id)
    {
        $company = CompanyRegistration::where('identifier', $id)->first();
        if($company == null){
            return redirect()->back();
        }
        return view('dashboard.users.company.edit')
                ->with('company', $company);
    }

    public function update(Request $request, $id)
    {  
        // dd($request->all());

        // if the company type is private liability 
        if($request->company_type){
            $type = $request->company_type;                      
        }

        // dd($request->all());
        $companyRegistration = CompanyRegistration::where('identifier', $id)->first();
        $secretary = new Secretary;

        $companyRegistration->company_address = $request->company_address;
        $companyRegistration->company_email = $request->company_email;
        $companyRegistration->company_type = $request->company_type;
        $companyRegistration->company_share_capital = $request->company_share_capital;
        $companyRegistration->save();
        
        // save all the company names
        foreach($request->company_name_details as $company_name){
            $name = new Name;
            $name->name = $company_name['company_name'];
            $companyRegistration->companyNames()->save($name);
        }

        // all save all the company objectives
        foreach($request->company_objective_details as $company_objective_detail){
            $objective = new BodyObjective;
            $objective->description = $company_objective_detail['company_objective'];
            $objective->user_id = Auth::id();
            $companyRegistration->bodyObjectives()->save($objective);
        }

         // all save all the company partners and directors
        foreach($request->company_partners_details as $company_partners_detail){
            $partnersAndDirector = new PartnersAndDirector;
            $partnersAndDirector->full_name = $company_partners_detail['full_name'];
            $partnersAndDirector->email = $company_partners_detail['email'];
            $partnersAndDirector->identity_type = $company_partners_detail['identity_type'];
            $partnersAndDirector->identity_no = $company_partners_detail['identity_no'];
            $partnersAndDirector->phone_number = $company_partners_detail['phone_number'];
            $partnersAndDirector->gender = $company_partners_detail['gender'];
            $partnersAndDirector->dob = $company_partners_detail['dob'];
            $partnersAndDirector->nationality = $company_partners_detail['nationality'];
            $partnersAndDirector->address = $company_partners_detail['address'];
            $partnersAndDirector->city = $company_partners_detail['city'];
            $partnersAndDirector->state = $company_partners_detail['state'];
            $partnersAndDirector->country = $company_partners_detail['country'];

            if ($company_partners_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $company_partners_detail['upload_id'], 
                    $company_partners_detail['full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/partners/upload_id/', 
                    $partnersAndDirector->upload_id
                );
                $oldFilename = $partnersAndDirector->upload_id;
                // add the new photo
                $partnersAndDirector->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($company_partners_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $company_partners_detail['signature'], 
                    $company_partners_detail['full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/partners/signature/', 
                    $partnersAndDirector->upload_id
                );
                $oldFilename = $partnersAndDirector->signature;
                // add the new photo
                $partnersAndDirector->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }
            $companyRegistration->partnersAndDirectors()->save($partnersAndDirector);
        }

        // all save all the company secretaries
        foreach($request->company_secretary_details as $company_secretary_detail){
            $secretary = new Secretary;
            $secretary->secretary_full_name = $company_secretary_detail['secretary_full_name'];
            $secretary->secretary_email = $company_secretary_detail['secretary_email'];
            $secretary->secretary_identity_type = $company_secretary_detail['secretary_identity_type'];
            $secretary->secretary_identity_no = $company_secretary_detail['secretary_identity_no'];
            $secretary->secretary_phone_number = $company_secretary_detail['secretary_phone_number'];
            $secretary->secretary_gender = $company_secretary_detail['secretary_gender'];
            $secretary->secretary_dob = $company_secretary_detail['secretary_dob'];
            $secretary->secretary_rc_no = $company_secretary_detail['secretary_rc_no'];

            if ($company_secretary_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $company_secretary_detail['upload_id'], 
                    $company_secretary_detail['secretary_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/secretary/upload_id/', 
                    $secretary->upload_id
                );
                $oldFilename = $secretary->upload_id;
                // add the new photo
                $secretary->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($company_secretary_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $company_secretary_detail['signature'], 
                    $company_secretary_detail['secretary_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/secretary/signature/', 
                    $secretary->upload_id
                );
                $oldFilename = $secretary->signature;
                // add the new photo
                $secretary->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }            
            $companyRegistration->secretaries()->save($secretary);
        }

        // all save all the company shareholders
        foreach($request->company_shareholders_details as $company_shareholders_detail){ 
            $shareholding = new Shareholding;     
            $shareholding->shareholder_full_name = $company_shareholders_detail['shareholder_full_name'];
            $shareholding->shareholder_email = $company_shareholders_detail['shareholder_email'];
            $shareholding->shareholder_identity_type = $company_shareholders_detail['shareholder_identity_type'];
            $shareholding->shareholder_identity_no = $company_shareholders_detail['shareholder_identity_no'];
            $shareholding->shareholder_phone_number = $company_shareholders_detail['shareholder_phone_number'];
            $shareholding->shareholder_gender = $company_shareholders_detail['shareholder_gender'];
            $shareholding->shareholder_dob = $company_shareholders_detail['shareholder_dob'];
            $shareholding->shareholder_address = $company_shareholders_detail['shareholder_address'];
            // $shareholding->shareholder_nationality = $company_shareholders_detail['shareholder_nationality'];
            // $shareholding->shareholder_city = $company_shareholders_detail['shareholder_city'];
            // $shareholding->shareholder_state = $company_shareholders_detail['shareholder_state'];
            // $shareholding->shareholder_country = $company_shareholders_detail['shareholder_country'];
            $shareholding->shares = $company_shareholders_detail['shareholder_shares'];
            $shareholding->user_id = Auth::id();

            if ($company_shareholders_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $company_shareholders_detail['upload_id'], 
                    $company_shareholders_detail['shareholder_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/shareholders/upload_id/', 
                    $shareholding->upload_id
                );
                $oldFilename = $shareholding->upload_id;
                // add the new photo
                $shareholding->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($company_shareholders_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $company_shareholders_detail['signature'], 
                    $company_shareholders_detail['shareholder_full_name'], 
                    'assets/files/'.$companyRegistration->identifier .'/shareholders/signature/', 
                    $shareholding->upload_id
                );
                $oldFilename = $shareholding->signature;
                // add the new photo
                $shareholding->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            } 

            $companyRegistration->shareholdings()->save($shareholding);
        }

        return redirect()->route('company.show', $companyRegistration->identifier);
    }

    public function destroy($id)
    {
        //
    }
}

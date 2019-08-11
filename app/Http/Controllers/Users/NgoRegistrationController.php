<?php

namespace App\Http\Controllers\Users;

use Auth;
use Illuminate\Http\Request;
use App\Http\Helpers\FunctionHelpers;
use App\Http\Controllers\Controller;
use App\Models\NgoRegistration;
use App\Models\RegistrationTransaction;
use App\Models\PartnersAndDirector;
use App\Models\Name;
use App\Models\Trustee;
use App\Models\Item;
use App\Models\RegistrationItem;
use App\Models\UserSpecialDiscount;
use File;
use Image;
use Storage;

class NgoRegistrationController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.users.ngo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.ngo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceAmount = Item::where('slug', 'ngo')->first();
        $issue = null;
        $amount = null;
        $issue = FunctionHelpers::amountIssue($serviceAmount);
        $amount = FunctionHelpers::rolesAndSpecialDiscounts($serviceAmount);

        $ngoRegistration = new NgoRegistration;
        $ngoRegistration->address = $request->address;
        $ngoRegistration->save();
        
        foreach($request->ngo_name_details as $ngo_name){
            $name = new Name;
            $name->name = $ngo_name['ngo_name'];
            $ngoRegistration->ngoNames()->save($name);
        }


        foreach($request->ngo_partners_details as $ngo){
            $trustee = new PartnersAndDirector;
            $trustee->full_name = $ngo['full_name'];
            $trustee->email = $ngo['email'];
            $trustee->identity_type = $ngo['identity_type'];
            $trustee->identity_no = $ngo['identity_no'];
            $trustee->phone_number = $ngo['phone_number'];
            $trustee->gender = $ngo['gender'];
            $trustee->dob = $ngo['dob'];
            $trustee->nationality = $ngo['nationality'];
            $trustee->address = $ngo['address'];
            $trustee->city = $ngo['city'];
            $trustee->state = $ngo['state'];
            $trustee->country = $ngo['country'];

            if ($ngo['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $ngo['upload_id'], 
                    $ngo['full_name'], 
                    'assets/files/'.$ngoRegistration->identifier .'/trustee/upload_id/', 
                    $trustee->upload_id
                );
                $oldFilename = $trustee->upload_id;
                // add the new photo
                $trustee->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($ngo['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $ngo['signature'], 
                    $ngo['full_name'], 
                    'assets/files/'.$ngoRegistration->identifier .'/applicants/signature/', 
                    $trustee->upload_id
                );
                $oldFilename = $trustee->signature;
                // add the new photo
                $trustee->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($ngo['constitution_file']){
                $path = FunctionHelpers::uploadAnything(
                    $ngo['constitution_file'], 
                    $ngo['full_name'], 
                    'assets/files/'.$ngoRegistration->identifier .'/constitution_file/', 
                    $trustee->upload_id
                );
                $oldFilename = $trustee->constitution_file;
                // add the new photo
                $trustee->constitution_file = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }
            
            $ngoRegistration->trustees()->save($trustee);
        }


        $transaction = new RegistrationTransaction;
        $transaction->execution = "No Execution";
        $transaction->status = "pending";
        $transaction->issues = $issue;
        $transaction->amount = $amount;
        $transaction->identifier = $ngoRegistration->identifier;
        $transaction->user_id = Auth::id();

        $ngoRegistration->registrationTransactions()->save($transaction);

        
        return redirect()->route('ngo.show', $ngoRegistration->identifier);
    }

    public function show($id)
    {
        $ngo = NgoRegistration::where('identifier', $id)->first();
        if($ngo == null){
            return redirect()->back();
        }
        return view('dashboard.users.ngo.show')
                ->with('ngo', $ngo);
    }

    public function edit($id)
    {
        $ngo = NgoRegistration::where('identifier', $id)->first();
        if($ngo == null){
            return redirect()->back();
        }
        return view('dashboard.users.ngo.edit')
                ->with('ngo', $ngo);
    }

    public function update(Request $request, $id)
    {
        $ngoRegistration = NgoRegistration::where('identifier', $id)->first();
        $ngoRegistration->address = $request->address;
        $ngoRegistration->save();
        
        foreach($request->ngo_name_details as $ngo_name){
            $name = new Name;
            $name->name = $ngo_name['ngo_name'];
            $ngoRegistration->ngoNames()->save($name);
        }


        foreach($request->ngo_partners_details as $ngo){
            $trustee = new PartnersAndDirector;
            $trustee->full_name = $ngo['full_name'];
            $trustee->email = $ngo['email'];
            $trustee->identity_type = $ngo['identity_type'];
            $trustee->identity_no = $ngo['identity_no'];
            $trustee->phone_number = $ngo['phone_number'];
            $trustee->gender = $ngo['gender'];
            $trustee->dob = $ngo['dob'];
            $trustee->nationality = $ngo['nationality'];
            $trustee->address = $ngo['address'];
            $trustee->city = $ngo['city'];
            $trustee->state = $ngo['state'];
            $trustee->country = $ngo['country'];

            if ($ngo['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $ngo['upload_id'], 
                    $ngo['full_name'], 
                    'assets/files/'.$ngoRegistration->identifier .'/trustee/upload_id/', 
                    $trustee->upload_id
                );
                $oldFilename = $trustee->upload_id;
                // add the new photo
                $trustee->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($ngo['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $ngo['signature'], 
                    $ngo['full_name'], 
                    'assets/files/'.$ngoRegistration->identifier .'/applicants/signature/', 
                    $trustee->upload_id
                );
                $oldFilename = $trustee->signature;
                // add the new photo
                $trustee->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($ngo['constitution_file']){
                $path = FunctionHelpers::uploadAnything(
                    $ngo['constitution_file'], 
                    $ngo['full_name'], 
                    'assets/files/'.$ngoRegistration->identifier .'/constitution_file/', 
                    $trustee->upload_id
                );
                $oldFilename = $trustee->constitution_file;
                // add the new photo
                $trustee->constitution_file = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }
            
            $ngoRegistration->trustees()->save($trustee);
        }        
        return redirect()->route('ngo.show', $ngoRegistration->identifier);
    }

    public function destroy($id)
    {
        //
    }
}

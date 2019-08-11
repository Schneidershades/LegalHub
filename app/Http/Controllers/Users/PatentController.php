<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Helpers\FunctionHelpers;
use App\Http\Controllers\Controller;
use Session;
use Auth;
use App\Models\Name;
use App\Models\PartnersAndDirector;
use App\Models\PatentRegistration;
use App\Models\BodyObjective;
use App\Models\RegistrationTransaction;
use App\Models\RegistrationItem;
use App\Models\Item;
use App\Models\UserSpecialDiscount;
use File;
use Image;
use Storage;

class PatentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.patent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceAmount = Item::where('slug', 'trademark')->first();
        $issue = null;
        $amount = null;
        $issue = FunctionHelpers::amountIssue($serviceAmount);
        $amount = FunctionHelpers::rolesAndSpecialDiscounts($serviceAmount);

         // dd($request->all());
        $patentRegistration = new PatentRegistration;
        $name = new Name;

        $patentRegistration->company_name = $request->company_name;
        $patentRegistration->title = $request->title;
        $patentRegistration->agent_name = $request->agent_name;
        $patentRegistration->agent_number = $request->agent_number;
        $patentRegistration->letter_addressing = $request->letter_addressing;
        $patentRegistration->indiviual_company_name = $request->indiviual_company_name;
        $patentRegistration->save();
        
        // save all the patent names
        // foreach($request->patent_applicant_details as $patent_applicant_detail){
        //     $name->name = $patent_applicant_detail['name'];
        //     $patentRegistration->patentNames()->save($name);
        // }

        // all save all the patent objectives
        foreach($request->patent_statement_details as $patent_statement_detail){
            $statements = new BodyObjective;
            $statements->description = $patent_statement_detail['patent_statement'];
            $statements->user_id = Auth::id();
            $patentRegistration->statements()->save($statements);
        }
        

        // all save all the patent partners and directors
        foreach($request->patent_applicant_details as $patent_applicant_detail){
            $applicant = new PartnersAndDirector;
            $applicant->full_name = $patent_applicant_detail['full_name'];
            $applicant->email = $patent_applicant_detail['email'];
            $applicant->phone_number = $patent_applicant_detail['phone_number'];
            // $applicant->nationality = $patent_applicant_detail['nationality'];
            $applicant->address = $patent_applicant_detail['address'];
            $applicant->description = $patent_applicant_detail['patent_description'];

            if ($patent_applicant_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $patent_applicant_detail['upload_id'], 
                    $patent_applicant_detail['full_name'], 
                    'assets/files/'.$patentRegistration->identifier .'/applicants/upload_id/', 
                    $applicant->upload_id
                );
                $oldFilename = $applicant->upload_id;
                // add the new photo
                $applicant->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($patent_applicant_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $patent_applicant_detail['signature'], 
                    $patent_applicant_detail['full_name'], 
                    'assets/files/'.$patentRegistration->identifier .'/applicants/signature/', 
                    $applicant->upload_id
                );
                $oldFilename = $applicant->signature;
                // add the new photo
                $applicant->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($patent_applicant_detail['content_file']){
                $path = FunctionHelpers::uploadAnything(
                    $patent_applicant_detail['content_file'], 
                    $patent_applicant_detail['full_name'], 
                    'assets/files/'.$patentRegistration->identifier .'/applicants/content_file/', 
                    $applicant->upload_id
                );
                $oldFilename = $applicant->content_file;
                // add the new photo
                $applicant->content_file = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            $patentRegistration->applicants()->save($applicant);
        }

        $transaction = new RegistrationTransaction;
        $transaction->execution = "No Execution";
        $transaction->status = "pending";
        $transaction->issues = $issue;
        $transaction->amount = $amount;
        $transaction->identifier = $patentRegistration->identifier;
        $transaction->user_id = Auth::id();

        $patentRegistration->registrationTransactions()->save($transaction);

        return redirect()->route('patent.show', $patentRegistration->identifier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patent = PatentRegistration::where('identifier', $id)->first();
        if($patent == null){
            return redirect()->back();
        }
        return view('dashboard.users.patent.show')
                ->with('patent', $patent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patent = PatentRegistration::where('identifier', $id)->first();
        if($patent == null){
            return redirect()->back();
        }
        return view('dashboard.users.patent.edit')
                ->with('patent', $patent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // dd($request->all());
        $patentRegistration = PatentRegistration::where('identifier', $id)->first();
        $name = new Name;

        $patentRegistration->company_name = $request->company_name;
        $patentRegistration->title = $request->title;
        $patentRegistration->agent_name = $request->agent_name;
        $patentRegistration->agent_number = $request->agent_number;
        $patentRegistration->letter_addressing = $request->letter_addressing;
        $patentRegistration->indiviual_company_name = $request->indiviual_company_name;
        $patentRegistration->save();
        
        // save all the patent names
        // foreach($request->patent_applicant_details as $patent_applicant_detail){
        //     $name->name = $patent_applicant_detail['name'];
        //     $patentRegistration->patentNames()->save($name);
        // }

        // all save all the patent objectives
        foreach($request->patent_statement_details as $patent_statement_detail){
            $statements = new BodyObjective;
            $statements->description = $patent_statement_detail['patent_statement'];
            $statements->user_id = Auth::id();
            $patentRegistration->statements()->save($statements);
        }
        

        // all save all the patent partners and directors
        foreach($request->patent_applicant_details as $patent_applicant_detail){
            $applicant = new PartnersAndDirector;
            $applicant->full_name = $patent_applicant_detail['full_name'];
            $applicant->email = $patent_applicant_detail['email'];
            $applicant->phone_number = $patent_applicant_detail['phone_number'];
            // $applicant->nationality = $patent_applicant_detail['nationality'];
            $applicant->address = $patent_applicant_detail['address'];
            $applicant->description = $patent_applicant_detail['patent_description'];

            if ($patent_applicant_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                    $patent_applicant_detail['upload_id'], 
                    $patent_applicant_detail['full_name'], 
                    'assets/files/'.$patentRegistration->identifier .'/applicants/upload_id/', 
                    $applicant->upload_id
                );
                $oldFilename = $applicant->upload_id;
                // add the new photo
                $applicant->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($patent_applicant_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                    $patent_applicant_detail['signature'], 
                    $patent_applicant_detail['full_name'], 
                    'assets/files/'.$patentRegistration->identifier .'/applicants/signature/', 
                    $applicant->upload_id
                );
                $oldFilename = $applicant->signature;
                // add the new photo
                $applicant->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($patent_applicant_detail['content_file']){
                $path = FunctionHelpers::uploadAnything(
                    $patent_applicant_detail['content_file'], 
                    $patent_applicant_detail['full_name'], 
                    'assets/files/'.$patentRegistration->identifier .'/applicants/content_file/', 
                    $applicant->upload_id
                );
                $oldFilename = $applicant->content_file;
                // add the new photo
                $applicant->content_file = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            $patentRegistration->applicants()->save($applicant);
        }
        return redirect()->route('patent.show', $patentRegistration->identifier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

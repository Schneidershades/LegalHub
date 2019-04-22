<?php

namespace App\Http\Controllers\Users;

use Auth;
use App\Http\Helpers\FunctionHelpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessRegistration;
use App\Models\RegistrationTransaction;
use App\Models\Name;
use App\Models\Item;
use App\Models\RegistrationItem;
use App\Models\PartnersAndDirector;
use App\Models\UserSpecialDiscount;
use Session;
use File;
use Image;
use Storage;

class BusinessRegistrationController extends Controller
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
    	return view('backend.users.business.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $serviceAmount = Item::where('slug', 'business')->first();
        $issue = null;
        $amount = null;

        // returned from FunctionHelpers if there is an issue
        $issue = FunctionHelpers::amountIssue($serviceAmount);

        // return finalamount from FunctionHelpers after checking if there are discounts
        $amount = FunctionHelpers::rolesAndSpecialDiscounts($serviceAmount);

        // dd($amount);

        
        $businessRegistration = new BusinessRegistration;
        $transaction = new RegistrationTransaction;

        $businessRegistration->business_address = $request->business_address;
        $businessRegistration->business_branch_address = $request->business_branch;
        $businessRegistration->save();
        
        foreach($request->business_name_details as $business_name){
            $name = new Name;
            $name->name = $business_name['business_name'];
            $businessRegistration->businessNames()->save($name);
        }

        // dd( $request->business_partners_details); 

        foreach($request->business_partners_details as $business_partners_detail){ 

            $partnersAndDirector = new PartnersAndDirector;
            $partnersAndDirector->full_name = $business_partners_detail['full_name'];
            $partnersAndDirector->email = $business_partners_detail['email'];
            $partnersAndDirector->identity_type = $business_partners_detail['identity_type'];
            $partnersAndDirector->identity_no = $business_partners_detail['identity_no'];
            $partnersAndDirector->phone_number = $business_partners_detail['phone_number'];
            $partnersAndDirector->gender = $business_partners_detail['gender'];
            $partnersAndDirector->dob = $business_partners_detail['dob'];
            $partnersAndDirector->nationality = $business_partners_detail['nationality'];
            $partnersAndDirector->address = $business_partners_detail['address'];
            $partnersAndDirector->city = $business_partners_detail['city'];
            $partnersAndDirector->state = $business_partners_detail['state'];
            $partnersAndDirector->country = $business_partners_detail['country'];

            if ($business_partners_detail['upload_id']){
                $path = FunctionHelpers::uploadAnything(
                            $business_partners_detail['upload_id'], 
                            $business_partners_detail['full_name'], 
                            'assets/files/'.$businessRegistration->identifier .'/partners/upload_id/', 
                            $partnersAndDirector->upload_id
                        );
                $oldFilename = $partnersAndDirector->upload_id;
                // add the new photo
                $partnersAndDirector->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }

            if ($business_partners_detail['signature']){
                $path = FunctionHelpers::uploadAnything(
                            $business_partners_detail['signature'],
                            $business_partners_detail['full_name'], 
                            'assets/files/'.$businessRegistration->identifier .'/partners/signature/', 
                            $partnersAndDirector->signature
                        );
                $oldFilename = $partnersAndDirector->signature;
                // add the new photo
                $partnersAndDirector->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);
            }


            $businessRegistration->partnersAndDirectors()->save($partnersAndDirector); 
            
        }

   

        $transaction->execution = "No Execution";
        $transaction->status = "pending";
        $transaction->issues = $issue;
        $transaction->amount = $amount;
        $transaction->identifier = $businessRegistration->identifier;
        $transaction->user_id = Auth::id();

        $businessRegistration->registrationTransactions()->save($transaction);

        return redirect()->route('business.show', $businessRegistration->identifier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $business = BusinessRegistration::where('identifier', $id)->first();
        if($business == null){
            return redirect()->back();
        }
        return view('backend.users.business.show')
                ->with('business', $business);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $business = BusinessRegistration::where('identifier', $id)->first();
        if($business == null){
            return redirect()->back();
        }
        return view('backend.users.business.edit')
                ->with('business', $business);
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
        //
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

    public function postSignature()
    {
        return 'good';
    }

    public function postPassport()
    {
        return 'good';
    }

}

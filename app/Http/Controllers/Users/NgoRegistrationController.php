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
        return view('backend.users.ngo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.ngo.create');
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
                // add the new photo
                $image = $ngo['upload_id'];
                $filename = $ngo['full_name'] . '.' . $image->getClientOriginalExtension();
                $directory = 'assets/files/'.$companyRegistration->identifier .'/trustee/upload_id/';
                $path = 'assets/files/'.$companyRegistration->identifier .'/trustee/upload_id/' . $filename;

                if(!File::exists($directory)) {
                    // path does not exist
                    File::makeDirectory($directory, $mode = 0777, true, true);
                }
                Image::make($image)->resize(635, 423)->save($path);

                $oldFilename = $partnersAndDirector->upload_id;
                // add the new photo
                $partnersAndDirector->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);

            }

            if ($ngo['signature']){
                // add the new photo
                $image = $ngo['signature'];
                $filename = $ngo['full_name']. '.' . $image->getClientOriginalExtension();
                $directory = 'assets/files/'.$companyRegistration->identifier .'/trustee/signature/';
                $path = 'assets/files/'.$companyRegistration->identifier .'/trustee/signature/' . $filename;

                if(!File::exists($directory)) {
                    // path does not exist
                    File::makeDirectory($directory, $mode = 0777, true, true);
                }

                Image::make($image)->resize(400, 400)->save($path);

                $oldFilename = $partnersAndDirector->signature;
                // add the new photo
                $partnersAndDirector->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);

            }

            if ($ngo['constitution_file']){
                // add the new photo
                $image = $ngo['constitution_file'];

                $filename = $ngo['full_name']. '.' . $image->getClientOriginalExtension();
                $directory = 'assets/files/'.$ngoRegistration->identifier.'/constitution_file/';
                $path = 'assets/files/'.$ngoRegistration->identifier.'/constitution_file/' . $filename;

                if(!File::exists($directory)) {
                    // path does not exist
                    File::makeDirectory($directory, $mode = 0777, true, true);
                }

                Image::make($image)->resize(400, 400)->save($path);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ngo = NgoRegistration::where('identifier', $id)->first();
        if($ngo == null){
            return redirect()->back();
        }
        return view('backend.users.ngo.show')
                ->with('ngo', $ngo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ngo = NgoRegistration::where('identifier', $id)->first();
        if($ngo == null){
            return redirect()->back();
        }
        return view('backend.users.ngo.edit')
                ->with('ngo', $ngo);
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
}

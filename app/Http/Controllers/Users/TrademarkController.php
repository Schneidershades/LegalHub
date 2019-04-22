<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\FunctionHelpers;
use App\Models\TrademarkRegistration;
use App\Models\PartnersAndDirector;
use App\Models\Agent;
use App\Models\BodyObjective;
use App\Models\RegistrationItem;
use App\Models\RegistrationTransaction;
use App\Models\Item;
use App\Models\UserSpecialDiscount;
use Auth;
use File;
use Image;
use Storage;

class TrademarkController extends Controller
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
        return view('backend.users.trademark.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trademarkRegistration = new TrademarkRegistration;
        $trademarkRegistration->name = $request->trademark_name;
        $trademarkRegistration->type = $request->trademark_type;

        if ($request->hasFile('file')){
                // add the new photo
            $image = $request->hasFile('file');
            $filename = $image . '.' . $image->getClientOriginalExtension();
            $directory = 'assets/files/copyright_file/';
            $path = 'assets/files/copyright_file/' . $filename;

            if(!File::exists($directory)) {
                // path does not exist
                File::makeDirectory($directory, $mode = 0777, true, true);
            }
            Image::make($image)->resize(400, 400)->save($path);

            $oldFilename = $copyrightRegistration->file;
            // add the new photo
            $copyrightRegistration->file = $path;
            // delete the old photo
            Storage::delete($oldFilename);

        }

        $trademarkRegistration->save();

        foreach($request->trademark_objective_details as $trademark_objective_detail){
            $objective = new BodyObjective;
            $objective->description = $trademark_objective_detail['trademark_objective'];
            $objective->user_id = Auth::id();
            $trademarkRegistration->objectives()->save($objective);
        }
                
        foreach($request->trademark_owner_details as $proprietor_detail){
            $proprietor = new PartnersAndDirector;
            $proprietor->full_name = $proprietor_detail['full_name'];
            $proprietor->email = $proprietor_detail['email'];
            // $proprietor->identity_type = $proprietor_detail['identity_type'];
            // $proprietor->identity_no = $proprietor_detail['identity_no'];
            $proprietor->phone_number = $proprietor_detail['phone_number'];
            // $proprietor->gender = $proprietor_detail['gender'];
            // $proprietor->dob = $proprietor_detail['dob'];
            // $proprietor->nationality = $proprietor_detail['nationality'];
            $proprietor->address = $proprietor_detail['address'];
            $proprietor->city = $proprietor_detail['city'];
            $proprietor->state = $proprietor_detail['state'];
            $proprietor->country = $proprietor_detail['country'];
            $proprietor->rc_no = $proprietor_detail['rc_no'];

            if ($proprietor_detail['upload_id']){
                // add the new photo
                $image = $proprietor_detail['upload_id'];
                $filename = $proprietor_detail['full_name'] . '.' . $image->getClientOriginalExtension();
                $directory = 'assets/files/'.$trademarkRegistration->identifier .'/proprietors/upload_id/';
                $path = 'assets/files/'.$trademarkRegistration->identifier .'/proprietors/upload_id/' . $filename;

                if(!File::exists($directory)) {
                    // path does not exist
                    File::makeDirectory($directory, $mode = 0777, true, true);
                }


                Image::make($image)->resize(400, 400)->save($path);

                $oldFilename = $proprietor->upload_id;
                // add the new photo
                $proprietor->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);

            }

            if ($proprietor_detail['signature']){
                // add the new photo
                $image = $proprietor_detail['signature'];
                $filename = $proprietor_detail['full_name']. '.' . $image->getClientOriginalExtension();
                $directory = 'assets/files/'.$trademarkRegistration->identifier .'/proprietors/signature/';
                $path = 'assets/files/'.$trademarkRegistration->identifier .'/proprietors/signature/' . $filename;

                if(!File::exists($directory)) {
                    // path does not exist
                    File::makeDirectory($directory, $mode = 0777, true, true);
                }
                
                Image::make($image)->resize(600, 600)->save($path);

                $oldFilename = $proprietor->signature;
                // add the new photo
                $proprietor->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);

            }
            
            $trademarkRegistration->proprietors()->save($proprietor);
        }

        // all save all the company secretaries
        foreach($request->trademark_corresponding_agent_details as $trademark_agent_detail){
            $agent = new Agent;
            $agent->full_name = $trademark_agent_detail['full_name'];
            $agent->email = $trademark_agent_detail['email'];
            // $agent->identity_type = $trademark_agent_detail['identity_type'];
            // $agent->identity_no = $trademark_agent_detail['identity_no'];
            $agent->phone_number = $trademark_agent_detail['phone_number'];
            // $agent->gender = $trademark_agent_detail['gender'];
            // $agent->dob = $trademark_agent_detail['dob'];
            // $agent->nationality = $trademark_agent_detail['nationality'];
            $agent->address = $trademark_agent_detail['address'];
            $agent->city = $trademark_agent_detail['city'];
            $agent->state = $trademark_agent_detail['state'];
            $agent->country = $trademark_agent_detail['country'];

            if ($trademark_agent_detail['upload_id']){
                // add the new photo
                $image = $trademark_agent_detail['upload_id'];
                $filename = $trademark_agent_detail['full_name'] . '.' . $image->getClientOriginalExtension();
                $directory = 'assets/files/'.$trademarkRegistration->identifier .'/agents/upload_id/';
                $path = 'assets/files/'.$trademarkRegistration->identifier .'/agents/upload_id/' . $filename;

                if(!File::exists($directory)) {
                    // path does not exist
                    File::makeDirectory($directory, $mode = 0777, true, true);
                }


                Image::make($image)->resize(400, 400)->save($path);

                $oldFilename = $proprietor->upload_id;
                // add the new photo
                $proprietor->upload_id = $path;
                // delete the old photo
                Storage::delete($oldFilename);

            }

            if ($trademark_agent_detail['signature']){
                // add the new photo
                $image = $trademark_agent_detail['signature'];
                $filename = $trademark_agent_detail['full_name']. '.' . $image->getClientOriginalExtension();
                $directory = 'assets/files/'.$trademarkRegistration->identifier .'/agents/signature/';
                $path = 'assets/files/'.$trademarkRegistration->identifier .'/agents/signature/' . $filename;

                if(!File::exists($directory)) {
                    // path does not exist
                    File::makeDirectory($directory, $mode = 0777, true, true);
                }
                
                Image::make($image)->resize(600, 600)->save($path);

                $oldFilename = $proprietor->signature;
                // add the new photo
                $proprietor->signature = $path;
                // delete the old photo
                Storage::delete($oldFilename);

            }
            
            $trademarkRegistration->agents()->save($agent);
        }


        $serviceAmount = Item::where('slug', 'trademark')->first();

        $issue = null;
        $amount = null;

        $issue = FunctionHelpers::amountIssue($serviceAmount);
        $amount = FunctionHelpers::rolesAndSpecialDiscounts($serviceAmount);

        $transaction = new RegistrationTransaction;
        $transaction->execution = "No Execution";
        $transaction->status = "pending";
        $transaction->issues = $issue;
        $transaction->amount = $amount;
        $transaction->identifier = $trademarkRegistration->identifier;
        $transaction->user_id = Auth::id();

        $trademarkRegistration->registrationTransactions()->save($transaction);

        return redirect()->route('trademark.show', $trademarkRegistration->identifier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trademark = TrademarkRegistration::where('identifier', $id)->first();
        if($trademark == null){
            return redirect()->back();
        }
        return view('backend.users.trademark.show')
                ->with('trademark', $trademark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademark = TrademarkRegistration::where('identifier', $id)->first();
        if($trademark == null){
            return redirect()->back();
        }
        return view('backend.users.trademark.edit')
                ->with('trademark', $trademark);
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

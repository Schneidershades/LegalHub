<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Helpers\FunctionHelpers;
use App\Http\Controllers\Controller;
use App\Models\CopyrightRegistration;
use App\Models\PartnersAndDirector;
use App\Models\RegistrationTransaction;
use App\Models\Item;
use App\Models\RegistrationItem;
use App\Models\UserSpecialDiscount;
use Auth;
use File;
use Image;
use Storage;

class CopyrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.copyright.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.copyright.create');
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
        $serviceAmount = Item::where('slug', 'copyright')->first();
        $issue = null;
        $amount = null;
        $issue = FunctionHelpers::amountIssue($serviceAmount);
        $amount = FunctionHelpers::rolesAndSpecialDiscounts($serviceAmount);
        $copyrightRegistration = new CopyrightRegistration;        

        $copyrightRegistration->name = $request->name;
        $copyrightRegistration->dob = $request->dob;
        $copyrightRegistration->email = $request->email;
        $copyrightRegistration->phone_number = $request->phone_number;
        $copyrightRegistration->address = $request->address;
        $copyrightRegistration->city = $request->city;
        $copyrightRegistration->state = $request->state;
        $copyrightRegistration->country = $request->country;

        if ($request['upload_id']){
                // add the new photo
            $image = $request['upload_id'];
            $filename = $request['name'] . '.' . $image->getClientOriginalExtension();
            $directory = 'assets/files/'.$copyrightRegistration->identifier .'/copyright_file/';
            $path = 'assets/files/'.$copyrightRegistration->identifier .'/copyright_file/' . $filename;

            if(!File::exists($directory)) {
                // path does not exist
                File::makeDirectory($directory, $mode = 0777, true, true);
            }
            Image::make($image)->resize(400, 400)->save($path);

            $oldFilename = $copyrightRegistration->copyright_file;
            // add the new photo
            $copyrightRegistration->copyright_file = $path;
            // delete the old photo
            Storage::delete($oldFilename);

        }
        
        $copyrightRegistration->save();

        // all save all the company partners and directors
        foreach($request->agent_owner_details as $agent_detail){
            $agent = new PartnersAndDirector;
            $agent->full_name = $agent_detail['full_name'];
            $agent->email = $agent_detail['email'];
            $agent->phone_number = $agent_detail['phone_number'];
            $agent->address = $agent_detail['address'];
            $agent->city = $agent_detail['city'];
            $agent->state = $agent_detail['state'];
            $agent->country = $agent_detail['country'];

            $copyrightRegistration->agents()->save($agent);
        }

        $transaction = new RegistrationTransaction;
        $transaction->execution = "No Execution";
        $transaction->status = "pending";
        $transaction->issues = $issue;
        $transaction->amount = $amount;
        $transaction->identifier = $copyrightRegistration->identifier;
        $transaction->user_id = Auth::id();

        $copyrightRegistration->registrationTransactions()->save($transaction);

        return redirect()->route('copyright.show', $copyrightRegistration->identifier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $copyright = CopyrightRegistration::where('identifier', $id)->first();
        if($copyright == null){
            return redirect()->back();
        }
        return view('backend.users.copyright.show')
                ->with('copyright', $copyright);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $copyright = CopyrightRegistration::where('identifier', $id)->first();
        if($copyright == null){
            return redirect()->back();
        }
        return view('backend.users.copyright.edit')
                ->with('copyright', $copyright);
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

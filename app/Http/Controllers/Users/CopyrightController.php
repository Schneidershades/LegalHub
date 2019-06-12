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
    public function index()
    {
        return view('backend.users.copyright.index');
    }

    public function create()
    {
        return view('backend.users.copyright.create');
    }

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

        if ($request->copyright_file){
            $path = FunctionHelpers::uploadAnything(
                $request->copyright_file, 
                $request->name, 
                'assets/files/'.$copyrightRegistration->identifier .'/copyright_file/', 
                $copyrightRegistration->copyright_file
            );
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

    public function show($id)
    {
        $copyright = CopyrightRegistration::where('identifier', $id)->first();
        if($copyright == null){
            return redirect()->back();
        }
        return view('backend.users.copyright.show')
                ->with('copyright', $copyright);
    }

    public function edit($id)
    {
        $copyright = CopyrightRegistration::where('identifier', $id)->first();
        if($copyright == null){
            return redirect()->back();
        }
        return view('backend.users.copyright.edit')
                ->with('copyright', $copyright);
    }

    public function update(Request $request, $id)
    {
        $copyrightRegistration = CopyrightRegistration::where('identifier', $id)->first();        
        $copyrightRegistration->name = $request->name;
        $copyrightRegistration->dob = $request->dob;
        $copyrightRegistration->email = $request->email;
        $copyrightRegistration->phone_number = $request->phone_number;
        $copyrightRegistration->address = $request->address;
        $copyrightRegistration->city = $request->city;
        $copyrightRegistration->state = $request->state;
        $copyrightRegistration->country = $request->country;

        if ($request->copyright_file){
            $path = FunctionHelpers::uploadAnything(
                $request->copyright_file, 
                $request->name, 
                'assets/files/'.$copyrightRegistration->identifier .'/copyright_file/', 
                $copyrightRegistration->copyright_file
            );
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
        return redirect()->route('copyright.show', $copyrightRegistration->identifier);
    }

    public function destroy($id)
    {
        //
    }
}

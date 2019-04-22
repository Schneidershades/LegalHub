<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Image;
use Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
	{
		return view('backend.admin.settings.settings')->with('settings', Setting::first());
	}

    public function update(Request $request)
    {
    	$this->validate(request(), [
    		'site_name' => 'required',
    	]);

    	$settings = Setting::first();

    	$settings->phone_number_1 = request()->phone_number_1;
    	$settings->phone_number_2 = request()->phone_number_2;
    	$settings->email_1 = request()->email_1;
    	$settings->email_2 = request()->email_2;
    	$settings->address_1 = request()->address_1;
        $settings->address_2 = request()->address_2;
        $settings->city = request()->city;
        $settings->state = request()->state;
        $settings->country = request()->country;
        $settings->website = request()->website;
    	$settings->motto = request()->motto;
        $settings->facebook = request()->facebook;
        $settings->twitter = request()->twitter;
        $settings->linkedin = request()->linkedin;
        $settings->pinterest = request()->pinterest;
        $settings->googleplus = request()->googleplus;
        $settings->instagram = request()->instagram;
    	$settings->site_youtube = request()->site_youtube;
    	$settings->site_instagram = request()->site_instagram;
    	$settings->home_description = request()->home_description;
        $settings->about_description = request()->about_description;

         if ($request->hasFile('about_image')){
            // add the new photo
            $image = $request->file('about_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(900, 600)->save($location);

            $oldFilename = $settings->image;
            // add the new photo
            $settings->about_image = $location;
            // delete the old photo
            Storage::delete($oldFilename);

        }

    	$settings->save();

    	Session::flash('success', 'Website content updated successfully');

    	return redirect()->back();
    }
}

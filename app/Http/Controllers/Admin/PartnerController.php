<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use Session;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.partners.index')
            ->with('sliders', Partner::all());
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'answer' => 'required|max:255',
        ]);

        $partner = new Partner;
        $partner->title = $request->title;
        $partner->description = $request->description;
        
        if ($request->hasFile('image')){
            // add the new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(635, 423)->save($location);

            $oldFilename = $partner->image;
            // add the new photo
            $partner->image = $location;
            // delete the old photo
            Storage::delete($oldFilename);

        }

        $partner->save();

        Session::flash('success', 'Your Partner details was saved');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        Session::flash('success', 'The Partner details has been deleted');
    }
}

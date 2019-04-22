<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Session;

class SliderController extends Controller
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
        return view('backend.admin.slider.index')
            ->with('sliders', Slider::all());
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'answer' => 'required|max:255',
        ]);

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->description = $request->description;
        
        if ($request->hasFile('image')){
            // add the new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(635, 423)->save($location);

            $oldFilename = $slider->image;
            // add the new photo
            $slider->image = $location;
            // delete the old photo
            Storage::delete($oldFilename);

        }

        $slider->save();

        Session::flash('success', 'Your Slider details was saved');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        Session::flash('success', 'The Slider details has been deleted');
    }
}

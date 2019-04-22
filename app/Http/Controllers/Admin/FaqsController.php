<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Session;

class FaqsController extends Controller
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
        return view('backend.admin.faq.index')
            ->with('faqs', Faq::all());
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required|max:255',
            'answer' => 'required|max:255',
        ]);

        $faqs = new Faq;
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->save();

        Session::flash('success', 'Your Faq details was saved');

        return redirect()->back();
    }


    public function edit($id)
    {
        //
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
        $faq = Faq::find($id);
        $faq->delete();

        Session::flash('success', 'The faq details has been deleted');
    }
}

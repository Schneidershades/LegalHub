<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class SubscribeController extends Controller
{
    public function index ()
    {
        $subscribers = Subscriber::all();
        return view('dashboard.admin.subscriber.index')->with('subscribers', $subscribers);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
        ]);
        $subscribe = new Subscriber;
        $subscribe->email = $request->email;
        $subscribe->save();

        Session::flash('success', 'Your subscription details was saved');
        return redirect()->back();
    }

}

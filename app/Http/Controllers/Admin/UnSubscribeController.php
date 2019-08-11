<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class UnSubscribeController extends Controller
{
    public function show($email)
    {
    	$unsubscribe = Subscriber::where('email', $email)->first();
    	$unsubscribe->subscribe = false;
    	$unsubscribe->save();
    	Session::flash('success', 'Your email was unsubscribed from our system');
        return redirect()->back();
    }
}

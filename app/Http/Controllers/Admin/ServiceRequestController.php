<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;

class ServiceRequestController extends Controller
{
    public function index()
    {
    	$services = ServiceRequest::latest()->get();
    	return view('dashboard.admin.requests.index')
            ->with('services', $services);
    }

    public function show($id)
    {
    	$service = ServiceRequest::findOrFail($id);
    	return view('dashboard.admin.requests.show')
            ->with('service', $service);
    }
}

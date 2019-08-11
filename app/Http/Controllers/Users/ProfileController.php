<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::where('identifier', $id)->first();
        return view('dashboard.users.profile.show')
            ->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::where('identifier', $id)->first();
        return view('dashboard.users.profile.edit')
            ->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('identifier', $id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if ($request->image){
            $path = FunctionHelpers::uploadAnything(
                auth()->user()->name, 
                auth()->name()->identifier, 
                'assets/files/users/', 
                auth()->user()->name
            );
            $oldFilename = $user->image;
            // add the new photo
            $user->image = $path;
            // delete the old photo
            Storage::delete($oldFilename);
        }
        $user->save();
    }
}

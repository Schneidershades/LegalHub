<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Session;

class UsersController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.users.index')
            ->with('users', User::where('id', "!=",auth()->user()->id)->get());
    }

    public function create()
    {
        return view('dashboard.admin.users.create');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = 1;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.users.show')
            ->with('user', $user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.users.edit')
            ->with('user', $user)
            ->with('roles', Role::all());
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('success', 'The user details has been deleted');
    }
}


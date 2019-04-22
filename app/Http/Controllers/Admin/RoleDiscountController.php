<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RegistrationItem;
use App\Models\RoleDiscount;
use App\Models\Item;
use Session;

class RoleDiscountController extends Controller
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
        $roleDiscounts = RoleDiscount::all();
        return view('backend.admin.roleDiscounts.index')
                ->with('discounts', $roleDiscounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.roleDiscounts.create')
                ->with('items', Item::all())
                ->with('roles', Role::all());
    }

    public function storeItem(Request $request)
    {
        $item = new RoleDiscount;
        $item->role_id = $request->role;
        $item->registration_item_id = $request->service;
        $item->description = $request->description;
        $item->percentage = $request->percentage;
        $item->save();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request->all());
        foreach($request->role_discounts as $role_discount){
            $item = Item::where('id', $role_discount['item_id'])->first();
            $role = Role::where('id', $role_discount['role_id'])->first();

            $checkDiscount = RoleDiscount::where('role_id', $role->id)->where('item_id', $item->id)->first();
            // dd($checkDiscount);
            if($checkDiscount == NULL){
                $giveDiscount = new RoleDiscount;
                $giveDiscount->role_id = $role_discount['role_id'];
                $giveDiscount->item_id = $role_discount['item_id'];
                $giveDiscount->description = $role_discount['description'];
                $giveDiscount->percentage = $role_discount['percentage'];
                $giveDiscount->save();
            }else{
                $checkDiscount->role_id = $role_discount['role_id'];
                $checkDiscount->item_id = $role_discount['item_id'];
                $checkDiscount->description = $role_discount['description'];
                $checkDiscount->percentage = $role_discount['percentage'];
                // $giveDiscount->comment = $user_special_discount['comment'];
                $user->discounts()->save($checkDiscount);
            }
            
        }

        // return redirect()->back()->with('success', 'The service price details has been saved');
        return redirect()->route('roleDiscount.index');

        Session::flash('success', 'The role discount details has been saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roleDiscount = RoleDiscount::find($id);
        $roleDiscount->delete();
        return redirect()->route('roleDiscount.index');
        Session::flash('success', 'The service price details has been deleted');
    }
}

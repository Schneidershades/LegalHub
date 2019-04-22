<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\User;
use App\Models\UserSpecialDiscount;
use Auth;
use Session;

class DiscountServiceController extends Controller
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
        return view('backend.admin.discounts.index')
            ->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.discounts.create')
            ->with('items', Item::all())
            ->with('users', User::all());
    }

    public function storeItem(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->range = $request->range;
        $item->slug = str_slug($request->name);
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
        $giveDiscount = new UserSpecialDiscount;
        // dd($request->all());
            // dd($user_special_discount);
            
        foreach($request->user_special_discounts as $user_special_discount){
            $user = User::where('id', $user_special_discount['user_id'])->first();
            $checkDiscount = UserSpecialDiscount::where('user_discount_id', $user_special_discount['user_id'])->where('item_id', $user_special_discount['item_id'])->first();
            if($checkDiscount === NULL){
                $giveDiscount = new UserSpecialDiscount;
                $giveDiscount->item_id = $user_special_discount['item_id'];
                $giveDiscount->user_discount_id = $user_special_discount['user_id'];
                $giveDiscount->percentage = $user_special_discount['percentage'];
                $giveDiscount->user_id = auth()->user()->id;
                $giveDiscount->flexible = $user_special_discount['flexible'];
                $giveDiscount->flexible_percentage = $user_special_discount['flexible_percentage'];
                $giveDiscount->flexible_amount_state = $user_special_discount['flexible_amount_state'];
                // $giveDiscount->comment = $user_special_discount['comment'];
                $giveDiscount->save();
            }else{
                $checkDiscount->item_id = $user_special_discount['item_id'];
                $checkDiscount->user_discount_id = $user_special_discount['user_id'];
                $checkDiscount->user_id = auth()->user()->id;
                $checkDiscount->percentage = $user_special_discount['percentage'];
                $checkDiscount->flexible = $user_special_discount['flexible'];
                $checkDiscount->flexible_percentage = $user_special_discount['flexible_percentage'];
                $checkDiscount->flexible_amount_state = $user_special_discount['flexible_amount_state'];
                // $giveDiscount->comment = $user_special_discount['comment'];
                $user->discounts()->save($checkDiscount);
            }
            
        }

        // return redirect()->back()->with('success', 'The service price details has been saved');
        return redirect()->route('discount.index');

        Session::flash('success', 'The service price details has been saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = RegistrationItem::where('id', $id)->first();
        // dd($service);
        if($service == null){
            return redirect()->back();
        }
        return view('backend.admin.discounts.edit')
                ->with('service', $service)
                ->with('items', Item::all());
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
        // dd($request->all());
        $service = RegistrationItem::where('id', $id)->first();
        $service->user_id = Auth::id();
        $service->item_id = $request->item_id;
        $service->amount = $request->amount;
        $service->flexible = $request->flexible;
        $service->flexible_amount = $request->flexible_amount;
        $service->flexible_state = $request->flexible_state;

        $service->save();

        // return redirect()->back()->with('success', 'The service price details has been saved');
        return redirect()->route('discount.index');

        Session::flash('success', 'The service price details has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = RegistrationItem::find($id);
        $service->delete();

        Session::flash('success', 'The service price details has been deleted');
    }
}

<?php

namespace App\Http\Helpers;

use Illuminate\Http\Request;
use App\Models\RegistrationItem;
use App\Models\UserSpecialDiscount;
use App\Models\RoleDiscount;
use Auth;
use Session;
use File;
use Image;
use Storage;

class FunctionHelpers {

	// if thers is no amount for a specified order by client return and issue and inform the admin to set an amount for the service
    public static function amountIssue($serviceAmount)
    {
        if($serviceAmount->id != null){
            $registrationAmount = RegistrationItem::where('item_id', $serviceAmount->id)->first();
        }else{
            return $issue = 'No Amount has been stated for you to pay please be patient';
        }

        if($registrationAmount->id == null){
            return $issue = 'No Amount has been stated for you to pay please be patient';
        }
    }

    public static function rolesAndSpecialDiscounts($serviceAmount, $request = NULL)
    {
    	// dd($request->company_type);
    	if($serviceAmount->id != null){
            $registrationAmount = RegistrationItem::where('item_id', $serviceAmount->id)->first();
            if($registrationAmount->id != null && $registrationAmount->flexible == 'no'){
                $amountToPay = $registrationAmount->amount;

            }

            if($registrationAmount->id != null && $registrationAmount->flexible == 'yes'){
                $curve_charge = $request->company_share_capital / $registrationAmount->flexible_state;
                $multiplier_per_share = $curve_charge * $registrationAmount->flexible_amount;
                $whole = $registrationAmount->amount + $multiplier_per_share;
                $amountToPay = $whole - $multiplier_per_share;
                // dd($amountToPay);
            }
        }

    	// check if there is a discount
        $checkIfThereIsDiscount = UserSpecialDiscount::where('user_discount_id', auth()->user()->id)->where('item_id', $serviceAmount->id)->first();

        if($checkIfThereIsDiscount == NULL){

        	// check if there is a discount from roles between users/admin/lawyers
        	$checkIfThereIsDiscount = RoleDiscount::where('role_id', auth()->user()->role_id)->where('item_id', $registrationAmount->id)->first();

            if($checkIfThereIsDiscount != NULL){
                $percentage_decimal = $checkIfThereIsDiscount->percentage / 100;
                $deductable = $percentage_decimal * $amountToPay;
                $amount = $amountToPay - $deductable;
            }
        }

        if($checkIfThereIsDiscount != NULL && $checkIfThereIsDiscount->flexible == 'no'){
            // check if there is a non flexible special discount
            $percentage_decimal = $checkIfThereIsDiscount->percentage / 100;
            $deductable = $percentage_decimal * $amountToPay;
            $amount = $amountToPay - $deductable;

        }elseif($checkIfThereIsDiscount != NULL && $checkIfThereIsDiscount->flexible == 'yes'){
            // check if there is a flexible special discount
            $percentage_decimal = $checkIfThereIsDiscount->flexible_percentage / 100;
            $deductable = $percentage_decimal * $amountToPay;
            $amount = $amountToPay - $deductable;

        }else{
            $amount = $amountToPay;
        }

        return $amount;
    }

    public static function uploadAnything($file, $name, $pathDirectory, $saveDatabaseAttribute){
    	$image = $file;
        $filename = $name . '.' . $image->getClientOriginalExtension();
        $directory = $pathDirectory;
        $path = $directory . $filename;
        if(!File::exists($directory)) {
            // path does not exist
            File::makeDirectory($directory, $mode = 0777, true, true);
        }
        Image::make($image)->resize(400, 400)->save($path);
        return $path;
    }


}
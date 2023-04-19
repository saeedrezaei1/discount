<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function create()
    {
        return view('admin.discount.use');
    }
    public function use(Request $request)
    {
        $coupon = Coupon::where('code',$request->code)->where('status',1)->first();

        if ($coupon && now()->lt($coupon->valid_to)){
            $coupon->update([
                    'times_used' => $coupon->times_used + 1 ,
                ]);
            if ($coupon->times_used >= $coupon->max_uses){
                $coupon->status = 0;
            }
            return redirect()->back()->with('success','valid code');
        }
        else{
            return redirect()->back()->with('error','invalid code');
        }
    }
}



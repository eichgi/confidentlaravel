<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
    public function show(Request $request, $code)
    {
        $coupon = Coupon::where('code', $code)->whereNull('expired_at')->first();
        if ($coupon && !$coupon->wasAlreadyUsed($request->user())) {
            $request->session()->put('coupon_id', $coupon->id);
        }

        return redirect('/#buy-now');
    }
}

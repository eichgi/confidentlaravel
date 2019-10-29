<?php

function hasCoupon()
{
    return session()->has('coupon_id');
}

function coupon()
{
    return \App\Coupon::find(session('coupon_id'));
}

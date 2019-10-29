<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * @method public static Order findOrFail(integer $id)
 */
class Order extends Model
{
    protected $fillable = ['user_id', 'product_id', 'stripe_id', 'total'];

    protected $hidden = ['stripe_id'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Product::class);
    }

    public function coupon()
    {
        return $this->belongsTo(\App\Coupon::class);
    }

    public function totalInCents()
    {
        return (int)($this->total * 100);
    }

    public function applyCoupon(\App\Coupon $coupon)
    {
        $this->total -= $this->total * ($coupon->percent_off / 100);

        $this->coupon()->associate($coupon);
    }
}

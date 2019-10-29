<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function wasAlreadyUsed(\App\User $user = null)
    {
        if (!$user) {
            return false;
        }

        return \App\Order::where('user_id', $user->id)->where('coupon_id', $this->id)->exists();
    }

    public function price(\App\Product $product)
    {
        return $this->apply($product->price);
    }

    public function priceInCents(\App\Product $product)
    {
        return $this->apply($product->priceInCents());
    }

    private function apply($amount)
    {
        return $amount * ((100 - $this->percent_off) / 100);
    }
}

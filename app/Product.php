<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const STARTER = 1;
    const FULL = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public static function paid()
    {
        return self::whereIn('id', [self::STARTER, self::FULL])
            ->orderBy('ordinal', 'asc')
            ->get();
    }

    public function priceInCents()
    {
        return $this->price * 100;
    }
}

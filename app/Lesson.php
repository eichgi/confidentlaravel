<?php

namespace App;

use App\Scopes\OrdinalScope;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrdinalScope());
    }

    public function isFree()
    {
        return is_null($this->product_id);
    }

    public static function course()
    {
        return self::where('product_id', '!=', [Product::FULL])
            ->orWhereNull('product_id')
            ->get();
    }
}

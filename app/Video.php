<?php

namespace App;

use App\Scopes\OrdinalScope;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrdinalScope());
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function hasDownload()
    {
        return in_array($this->id, [8, 9]);
    }
}

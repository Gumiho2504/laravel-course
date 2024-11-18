<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Model extends Eloquent
{
    protected $fillable = ['name','maker_id'];

    public function maker(): BelongsTo{
        return $this->belongsTo(Maker::class);
    }
    public function cars():HasMany{
        return $this->hasMany(Car::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Model extends Eloquent
{
    use HasFactory;
    protected $fillable = ['name', 'maker_id'];
    const UPDATED_AT = null;
    const CREATED_AT = null;
    public function maker(): BelongsTo
    {
        return $this->belongsTo(Maker::class);
    }
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}

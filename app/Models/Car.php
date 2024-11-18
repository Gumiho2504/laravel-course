<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'maker_id',
        'model_id',
        'year',
        'price',
        'vin',
        'mileage',
        'car_type_id',
        'fuel_type_id',
        'user_id',
        'city_id',
        'address',
        'phone',
        'description'
    ];
    //protected $guarded = []; //mean that every column of this model can be filled
    //protected $guarded = ['user_id']; // mean that every column can be filled except user id

    // ManyToOne
    public function carType() : BelongsTo{
        return $this->belongsTo(CarType::class,'car_type_id');
    }

    public function fuelType() :BelongsTo{
        return $this->belongsTo(FuelType::class);
    }
    public function maker():BelongsTo{
        return $this->belongsTo(Maker::class);
    }
    public function model(){
        return $this->belongTo(Model::class);
    }
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function city():BelongsTo{
        return $this->belongsTo(City::class);
    }
    public function features() : HasOne{
        return  $this->hasOne(CarFeatures::class);
    }

    public function primaryImage() : HasOne
    {
        return $this->hasOne(CarImages::class)->oldestOfMany('position');
    }

    // OneToMany
    public  function images() : HasMany{
        return $this->hasMany(CarImages::class);
    }





    // ManyToMany
    public function favouredUsers():BelongsToMany{
        return $this->belongsToMany(User::class,'favourite_cars','car_id','user_id');
    }

}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CarModel extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function getNameAttribute()
    {
        if (app()->getLocale() == 'ar') {
            return $this->name_ar;
        } else {
            return $this->name_en;
        }
    }

    public function type(): HasOne
    {
        return $this->hasOne(CarType::class,'id','type_id');
    }

}

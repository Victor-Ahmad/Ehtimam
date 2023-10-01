<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CarType extends Model
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

    public function model(): HasOne
    {
        return $this->hasOne(CarModel::class,'type_id','id');
    }

}

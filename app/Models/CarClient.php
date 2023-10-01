<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CarClient extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function type(): HasOne
    {
        return $this->hasOne(CarType::class,'id','type_id');
    }

    public function model(): HasOne
    {
        return $this->hasOne(CarModel::class,'id','model_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}

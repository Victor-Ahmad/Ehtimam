<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceServices extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function packageService()
    {
        return $this->belongsTo(Service::class, 'package_service_id');
    }

    public function serviecs()
    {
        return $this->belongsTo(Service::class,  'service_id');
    }
}

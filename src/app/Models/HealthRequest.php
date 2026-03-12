<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRequest extends Model
{
    protected $fillable = [
        'owner_uuid',
        'ip',
    ];
}

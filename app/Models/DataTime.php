<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'hours',
         'location',
         'time',
         'user_name',
         'service_id',
         'service'
    ];
}

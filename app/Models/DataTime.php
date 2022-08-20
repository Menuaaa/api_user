<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataTime extends Model
{
    use HasFactory;
    use SoftDeletes;
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

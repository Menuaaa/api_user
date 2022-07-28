<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessTokens extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'tokenable',
        'token',
        'abilities',
        'last_used_at',
    ];
}

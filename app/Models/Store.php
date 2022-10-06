<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domain',
        'email',
        'password',
        'timezone',
        'json_data',
    ];

    protected $casts = [
        'json_data' => 'array',
    ];
}

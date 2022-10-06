<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;
use App\Models\User;

class Businessdata extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'user_name',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}

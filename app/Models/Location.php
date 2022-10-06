<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Businessdata;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'businessdata_id',
        'name',
        'email',
        'address',
    ];

    public function businessdata()
    {
        return $this->belongsTo(Businessdata::class);
    }
}

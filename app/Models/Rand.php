<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'today'
    ];

    protected function today() : Attribute {
        return Attribute::make(
            get: fn () => now()->toDateString()
        );
    }

}
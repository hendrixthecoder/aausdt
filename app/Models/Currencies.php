<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'percentage'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $table = "currencies";
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminFormElement extends Model
{
    protected $fillable = [
        'element_data',
    ];

    protected $casts = [
        'element_data' => 'array',
    ];
}
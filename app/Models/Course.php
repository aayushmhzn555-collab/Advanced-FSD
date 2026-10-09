<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['name', 'description', 'duration', 'fee', 'difficulty', 'is_active'];

    // Casts for automatic type conversion
    protected $casts = [
        'fee' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}

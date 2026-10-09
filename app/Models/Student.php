<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['name', 'email', 'phone', 'address', 'date_of_birth'];

    // Cast date_of_birth to a Carbon date object
    protected $casts = [
        'date_of_birth' => 'date',
    ];
}

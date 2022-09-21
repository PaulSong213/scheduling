<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officials extends Model
{
    use HasFactory;

    protected $table = "Officials";

    protected $fillable = [
        'position',
        'position_level',
        'department',
        'civilStatus',
        'cellphone_number',
        'profile_filename',
        'userType',
        'email',
        'first_name',
        'last_name',
        'birthdate',
        'address',
        'password',
    ];
}

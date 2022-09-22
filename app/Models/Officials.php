<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Officials extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "officials";

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

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

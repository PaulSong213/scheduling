<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credentials extends Model
{
    use HasFactory;

    protected $table = 'credentials';

    protected $fillable = [
        'purpose',
        'user_id',
        'payment_proof_filename',
        'decline_reason',
        'scheduled_date',
        'status',
        'credential_type'
    ];
}

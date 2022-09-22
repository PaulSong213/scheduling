<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permits extends Model
{
    use HasFactory;

    protected $table = 'permits';

    protected $fillable = [
        'user_id',
        'business_location',
        'business_type',
        'business_name',
        'payment_proof_filename',
        'decline_reason',
        'scheduled_date',
        'status',
    ];
}

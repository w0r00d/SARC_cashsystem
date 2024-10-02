<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = ['national_id', 'fullname', 'phonenumber',
        'recipient_name', 'recipient_phone', 'recipient_nid', 'project_name',
        'partner', 'transfer_value', 'transfer_count', 'transfer_date', 'recipient_date', 'governate', 'sector', 'modality',
    ];
}

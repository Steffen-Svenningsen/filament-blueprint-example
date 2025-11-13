<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceSetting extends Model
{
    protected $fillable = [
        'company_name',
        'address',
        'zip',
        'city',
        'cvr_number',
        'phone',
        'email',
        'bank_name',
        'reg_number',
        'account_number',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliqnshop_kyc extends Model
{
    use HasFactory;
    protected $table = 'cns_kycs';
    protected $fillable = [
        'customer_id',
        'document_type',
        'file_path_front',
        'file_path_back',
        'kyc_status',
        'rejection_reason',
        'kyc_aproved_date',
    ];
}

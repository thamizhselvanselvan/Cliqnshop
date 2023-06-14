<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_confirmation extends Model
{
    use HasFactory;
    protected $fillable = [
    
            'receved_file',
            'payload',
            'sent_payload',
            'user_agent',
            'confirm_id',
            'operation',
            'shipment_type',
            'notice_date',
            'amount',
            'tax',
            'total_amount',
            'order_id',
            'order_date',
            'quantity',
            'Shipping_amount',
            'status',
    ];
       
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Notification extends Model
{
    use HasFactory;
      protected $fillable = [

            'receved_file',
            'payload',
            'sent_payload',
            'user_agent',
            'shipment_id',
            'operation',
            'shipment_type',
            'notice_date',
            'shipment_date',
            'delivery_date',
            'order_id',
            'order_date',
            'status',

      ];

}

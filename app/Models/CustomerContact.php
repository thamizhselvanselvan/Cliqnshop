<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContact extends Model
{
    use HasFactory;
    protected $table = 'cns_contacts';
    protected $fillable= [
        'name',
        'email',
        'site_name',
        'subject',
        'message'
    ];
}

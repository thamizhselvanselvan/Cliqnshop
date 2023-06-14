<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterContent extends Model
{
    use HasFactory;
    protected $table = 'cns_footer_contents';
    protected $fillable = [
        'site_name',
        'content_name',
        'content',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageContent extends Model
{
    use HasFactory;
    
    protected $table = 'cns_home_page_contents';
    protected $fillable = [
        'section',
        'content',
    ];

    public function setContentAttribute($value) {
        return json_encode($this->attributes['content']);
    }

    public function getContentAttribute($value) {
        return json_decode($this->attributes['content']);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = 'news';
    
    public function news_image()
    {
        return $this->hasMany('App\Models\news_image');
    }
}

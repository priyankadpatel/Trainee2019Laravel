<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news_image extends Model
{
    protected $table = 'news_image';
    public function news()
    {
        return $this->belongsTo('App\Models\news');
    }
}

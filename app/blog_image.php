<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog_image extends Model
{
    protected $table = 'blog_image';
    public function blog()
    {
        return $this->belongsTo('App\blog');
    }
}

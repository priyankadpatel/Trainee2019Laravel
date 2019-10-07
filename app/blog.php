<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $table = 'blog';
    public function blog_image()
    {
        return $this->hasMany('App\blog_image');
    }

    public function comment()
    {
        return $this->hasMany('App\comment');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comment';
    
    public function blog()
    {
        return $this->belongsTo('App\blog');
    }
}

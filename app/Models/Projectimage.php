<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projectimage extends Model
{
   
        protected $table = 'projectimage';
    
        public function Project(){
            
            return $this->belongsTo('App\Models\Project');
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
 
        protected $table = 'project';

        public function Projectimage(){
            return $this->hasMany('App\Models\Projectimage');
        }

}

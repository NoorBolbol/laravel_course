<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function courseStudent(){
    	return $this->hasMany('App\CourseStudent');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    public function course(){
    	return $this->belongsTo('App\Course');
    }

    public function course_2(){
    	return $this->belongsTo('App\Course')->where('credit', '=', 4);
    }

    public function student(){
    	return $this->belongsTo('App\Student');
    }
}

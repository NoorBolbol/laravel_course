<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Student extends Model
{
	use softDeletes;
    //
    // protected $table = 'students';
    // protected $primaryKey = 'student_id';

    public function user(){
    	return $this->belongsTo('App\User');//user_id
    }

    public function college(){
    	return $this->belongsTo('App\College');
    }

    public function courseStudent(){
    	return $this->hasMany('App\CourseStudent');
    }
}

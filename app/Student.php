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
}

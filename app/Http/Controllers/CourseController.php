<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    //

    public function index(){
    	$per_page = 5;
    	$courses = Course::select()->paginate($per_page);

    	return view('course.index')->with('courses', $courses);
    }
}

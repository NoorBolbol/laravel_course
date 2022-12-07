<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Traits\CoursePriceTrait;
use App; 

class CourseController extends Controller
{
    use CoursePriceTrait;

    public function __construct()
    {
        $this->middleware('lang');
    }

    public function index(){
        
    	$per_page = 5;
    	$courses = Course::select()->paginate($per_page);
        foreach($courses as $course){
            $course->price = $this->get_price($couse);
        }

    	return view('course.index')->with('courses', $courses);
    }
}


//App::setLocale('ar');
// $locale = App::getLocale();
 
// if (App::isLocale('en')) {
//     //
// }

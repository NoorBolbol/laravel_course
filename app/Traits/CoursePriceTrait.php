<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait CoursePriceTrait{
    public function get_price($course){
        $faculty = DB::table('faculties')->select('hour_price')->where('id', $course->faculty_id)->first();
        $hour_price = $faculty->hour_price;
        $price = $course->credit * $hour_price;

        return $price;
    }
}
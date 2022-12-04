<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Student;
use App\User;
use App\College;
use DB;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
		Auth::user()->id;
    	// Raw Query
    	// $query = 'SELECT * FROM students';
    	// $students = DB::select($query);

    	// Query Builder
    	// $students = DB::table('students')->select('*')->get();
    	// Eloquent ORM
    	// $students = Student::withTrashed()->select('*')->get();
    	// $credit = 4;
    	$students = Student::select('*')
    		->with('user')
    		->with('courseStudent')
    		// ->with(['courseStudent.course'=> function ($query) use ($credit){
    		// 	$query->where('credit', $credit);
    		// }])
    		// ->with('courseStudent.course_2')
    		->get();
    	// foreach ($students as $student) {
    	// 	$student->image = Storage::disk('local')->url($student->image);
    	// }
    	// dd($request->time);
    	// return view('student.index')->with('students', $students);
        return View::make('student.index')->with('students', $students);
    }

    public function create(){
    	return view('student.create');
    }

    public function store(Request $request){
    	// Raw Query
    	// $query = 'INSERT INTO students (name, email, status) VALUES ($request->name, $request->email, 'Y')';
    	// DB::statement($query);

    	// Query Builder
    	// DB::table('students')->insert(['name'=>$request->name, 'email'=>$request->email, 'status'=>'Y']);

    	$img = $request->file('image');

    	$path = 'public/user_images/';

    	// $name = $img->getClientOriginalName();
    	$name = time().'_'.rand(1,10000).'.'.$img->getClientOriginalExtension();

    	Storage::disk('local')->put($path.$name, file_get_contents($img));


    	// Eloquent ORM
    	$student = new Student;
    	$student->std = '220200353';
    	$student->gpa = 90;
    	$student->status = 'Y';
    	$student->image = $path.$name;
	    $status = $student->save();
		// $status? session()->falsh('status','Added successfully'):null;
    	return redirect()->back()->with('status', $status);
    }

	public function edit($id){
		// Raw Query
    	// $query = 'SELECT * FROM students WHERE id = $id';
    	// $student = DB::select($query);

    	// Query Builder
    	// $student = DB::table('students')->select('*')->where('id', $id)->first();

    	// Eloquent ORM
		$student = Student::select('*')->where('id', $id)->with('user')->first();
		// $college = College::select('*')->where('id', 1)->with('student')->first();
		// $students = $college->student;
		// foreach($students as $student){
		// 	echo $student->std.'<br>';
		// }
		// die;
    	return view('student.edit')->with('student', $student);
    }

    public function update(Request $request){
    	// Raw Query
    	// $query = 'UPDATE students set name=$request->name, email=$request->email WHERE id = $id)';
    	// DB::statement($query);

    	// Query Builder
    	// DB::table('students')->where('id', $request->id)->update(['name'=>$request->name, 'email'=>$request->email]);

    	// Eloquent ORM
		// $student = Student::where('id', $request->id)->update(['name'=>$request->name, 'email'=>$request->email]);
    	$student = Student::find($request->id);
    	$student->user()->update(['name' => $request->name, 'email' => $request->email]);
    	$student->std = 90;
    	$student->save();

		return redirect()->back();
    }

    public function drop($id){
    	// Raw Query
    	// $query = 'DELETE FROM students WHERE id = $id)';
    	// DB::delete($query); //DB::statement($query);

    	// Query Builder
    	// DB::table('students')->where('id', $id)->delete();

    	// Eloquent ORM
		// $student = Student::where('id', $request->id)->update(['name'=>$request->name, 'email'=>$request->email]);
    	Student::where('id', $id)->delete();
    	return redirect('/students');
    }

    public function restore($id){
    	Student::onlyTrashed()->where('id', $id)->restore();
    	// whereNull('deleted_at')
    	return redirect('/students');
    }

}

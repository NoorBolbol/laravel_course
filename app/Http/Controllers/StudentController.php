<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index(){
    	// Raw Query
    	// $query = 'SELECT * FROM students';
    	// $students = DB::select($query);

    	// Query Builder
    	// $students = DB::table('students')->select('*')->get();

    	// Eloquent ORM
    	// $students = Student::withTrashed()->select('*')->get();
    	$students = Student::select('*')->get();
    	// $students->toArray();
    	return view('student.index')->with('students', $students);
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

    	// Eloquent ORM
    	$student = new Student;
    	$student->name = $request->name;
    	$student->email = $request->email;
    	$student->status = 'Y';
    	$student->save();
    	return redirect('/students');
    }

	public function edit($id){
		// Raw Query
    	// $query = 'SELECT * FROM students WHERE id = $id';
    	// $student = DB::select($query);

    	// Query Builder
    	// $student = DB::table('students')->select('*')->where('id', $id)->first();

    	// Eloquent ORM
		$student = Student::select('*')->where('id', $id)->first();
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
    	$student->name = $request->name;
    	$student->email = $request->email;
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

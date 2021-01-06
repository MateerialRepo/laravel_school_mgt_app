<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //
    //
    function __construct(){
        $this->middleware('auth');
    }

    function index(){
        return view('pages.liststudents');
    }

    function list(){

        $students = User::join('students', 'users.id', '=', 'students.user_id')->get();
        //dd($student);
        return view('pages.liststudents',['students'=>$students]);
    }

    function showForm(){
        return view('pages.addstudent');
    }

    
    function addStudent(Request $req){
       // $req->dd();
        // $user_id = User::max('id');
        // dd($user_id);
        // to validate the form inputs
        $req->validate([
            'firstname' => 'required|string' ,
            'lastname' => 'required|string' ,
            'phone' => 'required| numeric' ,
            'email' => 'required|email',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required'
        ]);
        
        //save into user table
        $user = new User;
        $user->name = $req->input('firstname')." ".$req->input('lastname');
        $user->email = $req->input('email');
        $user->role_id = $req->input('role');
        $user->save();

        //save into student table
        $user_id = User::max('id');
        $student = new Student;
        $student->user_id = $user_id;
        $student->gender = $req->input('gender');
        $student->phone = $req->input('phone');
        $student->dob = $req->input('dob');
        $student->address = $req->input('address');
        $student->save();
        
        //redirect to the page the list student page with the sucess message
        $req->session()->flash('status', 'Student Successfully added');
        return redirect('/students');
        
        //code to store student data in the database and 
            
    
    }

    function edit($id){
        $student = User::join('students', 'users.id', '=', 'students.user_id')->find($id);
        return view('pages.editstudent',['student'=>$student]);
    }


    function updateStudent(Request $req){
        //return $req->input();
        $req->validate([
            'firstname' => 'required|string' ,
            'lastname' => 'required|string' ,
            'phone' => 'required| numeric' ,
            'email' => 'required|email',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required'
        ]);


        //Update user table
        $user = User::find($req->user_id);
        $user->name = $req->input('firstname')." ".$req->input('lastname');
        $user->email = $req->input('email');
        $user->role_id = $req->input('role');
        $user->save();

        //Update student table
        $student = Student::find($req->stud_id);
        $student->user_id = $req->user_id;
        $student->gender = $req->input('gender');
        $student->phone = $req->input('phone');
        $student->dob = $req->input('dob');
        $student->address = $req->input('address');
        $student->save();
        
        //code to find the id of the record, update and return to the list page
        //redirect to the page the list student page with the sucess message
        $req->session()->flash('status', 'Student Record Successfully Updated');
        return redirect('/students');
        
    }


    function deleteStudent($id){
        //delete the student record from user table
        $user = User::find($id);
        $user->delete();
        
        // delete the student record from the student table
        // $student = Student::where('user_id', $id)->get();
        // $student->delete();
        DB::table('students')->where('user_id', $id)->delete();

        session()->flash('status', 'Student Record Successfully Deleted');
        return redirect('/students');
    }
}

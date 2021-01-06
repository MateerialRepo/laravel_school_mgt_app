<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

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
        $student = User::find($id)->join('students', 'users.id', '=', 'students.user_id');
        return view('/edit',['student'=>$student]);
    }


    function updateStudent(Request $req){
        //return $req->input();
        $req->validate([
            'firstname' => 'required|string' ,
            'lasttname' => 'required|string' ,
            'phone' => 'required| numeric' ,
            'email' => 'required|email',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required'
        ]);
        
        //code to find the id of the record, update and return to the list page
        
    }


    function delete($id){
        $data = Student::find($id);
        $data->delete();
        session()->flash('status', 'Student Successfully deleted');
        //return redirect('');
    }
}

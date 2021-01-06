<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class TeacherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $teachers = User::join('teachers', 'users.id', '=', 'teachers.user_id')->get();
        return view('pages.listteachers',['teachers'=>$teachers]);
    }

    function showForm(){
        return view('pages.addteacher');
    }

    function addTeacher(Request $req){
        //$req->dd();
        $req->validate([
            'firstname' => 'required|string' ,
            'lastname' => 'required|string' ,
            'phone' => 'required| numeric' ,
            'email' => 'required|email',
            'gender' => 'required',
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
         $teacher = new Teacher;
         $teacher->user_id = $user_id;
         $teacher->gender = $req->input('gender');
         $teacher->phone = $req->input('phone');
         $teacher->address = $req->input('address');
         $teacher->save();
         
         //redirect to the page the list student page with the sucess message
         $req->session()->flash('status', 'Teacher Successfully added');
         return redirect('/teachers');
         
         //code to store student data in the database and 
             
    }

    function editForm($id){
        $teacher = User::join('teachers', 'users.id', '=', 'teachers.user_id')->find($id);
        return view('pages.editteacher',['teacher'=>$teacher]);
    }


    function updateTeacher(Request $req){

        $req->validate([
            'firstname' => 'required|string' ,
            'lastname' => 'required|string' ,
            'phone' => 'required| numeric' ,
            'email' => 'required|email',
            'gender' => 'required',
            'address' => 'required'
        ]);

        //Update user table
        $user = User::find($req->user_id);
        $user->name = $req->input('firstname')." ".$req->input('lastname');
        $user->email = $req->input('email');
        $user->role_id = $req->input('role');
        $user->save();

        //Update student table
        $teacher = Teacher::find($req->teacher_id);
        $teacher->user_id = $req->user_id;
        $teacher->gender = $req->input('gender');
        $teacher->phone = $req->input('phone');
        $teacher->address = $req->input('address');
        $teacher->save();
        
        //code to find the id of the record, update and return to the list page
        //redirect to the page the list student page with the sucess message
        $req->session()->flash('status', 'Teacher Record Successfully Updated');
        return redirect('/teachers');

    }


    function deleteTeacher($id){
        //delete the student record from user table
        $user = User::find($id);
        $user->delete();
        
        // delete the student record from the student table
        // $student = Student::where('user_id', $id)->get();
        // $student->delete();
        DB::table('teachers')->where('user_id', $id)->delete();

        session()->flash('status', 'Teacher Record Successfully Deleted');
        return redirect('/teachers');
    }


}

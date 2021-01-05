<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        return view('pages.listteachers');
    }

    function showForm(){
        return view('pages.addteacher');
    }

    function addTeacher(Request $req){
        //$req->dd();

        $req->validate([
            'firstname' => 'required|string' ,
            'lasttname' => 'required|string' ,
            'phone' => 'required| numeric' ,
            'email' => 'required|email',
            'gender' => 'required',
            'address' => 'required'
        ]);
    }
}

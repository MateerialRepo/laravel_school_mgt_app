<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    //
    function index(){
        return view('pages.liststudents');
    }

    function list(){

        $student = Student::all();
        return view('list',['student'=>$student]);
    }

    function showForm(){
        return view('pages.addstudent');
    }

    
    function addStudent(Request $req){
        $req->dd();
        // to validate the form inputs
        $req->validate([
            'firstname' => 'required|string' ,
            'lasttname' => 'required|string' ,
            'phone' => 'required| numeric' ,
            'email' => 'required|email',
            'gender' => 'required',
            'dob' => 'required|date',
            'address' => 'required'
        ]);

        

        // //return $req->input();
        // $buka = new Buka;
        // $buka->name = $req->input('buka');
        // $buka->address = $req->input('address');
        // $buka->email = $req->input('emailaddress');
        // $buka->save();
        // $req->session()->flash('status', 'Buka Successfully added');
        // return redirect('/list');

    }

    function edit($id){
        $data = Buka::find($id);
        return view('/edit',['data'=>$data]);
    }


    function updateBuka(Request $req){
        //return $req->input();
        $req->validate([
            'buka' => 'required|string' ,
            'address' => 'required',
            'emailaddress' => 'required|email'
        ]);
        
        //code to find the id of the record, update and return to the list page
        $buka = Buka::find($req->id);
        $buka->name = $req->input('buka');
        $buka->address = $req->input('address');
        $buka->email = $req->input('emailaddress');
        $buka->save();
        $req->session()->flash('status', 'Buka Successfully Updated');
        return redirect('/list');
    }


    function delete($id){
        $data = Buka::find($id);
        $data->delete();
        session()->flash('status', 'Record Successfully deleted');
        return redirect('/list');
    }
}

@extends('layouts.dashboard')

@section('page_name')
    Student's List
@endsection

@section('content')
    <div class="card-body">
        <h1 class="text-center mt-3">List of Students</h1>

    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Address</th>              
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $count = 0 ?>
                @foreach ($students as $student)
                <tr>
                    <td scope="row">{{++$count}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->address}}</td>
                    <td class="text-center">
                        <a href="editstudent/{{$student->user_id}}"><button class="btn btn-success mr-2">Edit</button></a>
                        <a href="deletestudent/{{$student->user_id}}"><button class="btn btn-danger">Delete</button></a>                        
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
    </div>
@endsection
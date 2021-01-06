@extends('layouts.dashboard')

@section('page_name')
    Teacher's List
@endsection

@section('content')
    <div class="card-body">
        <h1 class="text-center mt-3">List of Teachers</h1>

    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Teacher's Fullname</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Email Address</th>
                <th>House Address</th>              
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $count = 1 ?>
                @foreach ($teachers as $teacher) 
                <tr>
                    <td scope="row">{{$count++}}</td>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->gender}}</td>
                    <td>{{$teacher->phone}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>{{$teacher->address}}</td>
                    <td class="text-center">
                        <a href="edit/"{{$teacher->user_id}}><button class="btn btn-success mr-2">Edit</button></a>
                        <a href="delete/"{{$teacher->user_id}}><button class="btn btn-danger">Delete</button></a>                        
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>
    </div>
@endsection
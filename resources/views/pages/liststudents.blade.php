@extends('layouts.dashboard')

@section('page_name')
    Dashboard
@endsection

@section('content')
    <div class="card-body">
        <h1 class="text-center mt-3">List of Students</h1>

    @if (session('status'))
                <div class="alert alert-info">{{session('status')}}</div>
    @endif

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Student Name</th>
                <th>Student Class</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Address</th>              
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
                {{-- @foreach ($student as $item) {{$item->id}}--}}
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <a href="edit/"><button class="btn btn-success mr-2">Edit</button></a>
                        <a href="delete/"><button class="btn btn-danger">Delete</button></a>                        
                    </td>
                </tr>
                {{-- @endforeach                --}}
            </tbody>
    </table>
    </div>
@endsection
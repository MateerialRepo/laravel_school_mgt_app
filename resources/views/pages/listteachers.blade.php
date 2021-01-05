@extends('layouts.dashboard')

@section('page_name')
    Teacher's List
@endsection

@section('content')
    <div class="card-body">
        <h1 class="text-center mt-3">List of Teachers</h1>

    @if (session('status'))
        <div class="alert alert-info">{{session('status')}}</div>
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
                {{-- @foreach ($teacher as $item) {{$item->id}}--}}
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
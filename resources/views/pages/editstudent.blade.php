@extends('layouts.dashboard')

@section('page_name')
    Edit Student
@endsection

@section('content')
    <div class="card-body">
        <h2 class="mt-4 mb-1 text-center">Edit Student Details</h2>

        @if (session('status'))
                <div class="alert alert-info">{{session('status')}}</div>
        @endif
        {{-- to check the content of data passed to the page --}}
        {{-- {{dd($student)}} --}}
        <?php       $name = explode(" ", $student->name)        ?>

        <form method="post" action="{{url('/editstudent')}}">
            @csrf

            <input type="hidden" class="form-control mb-3" name="user_id" value="{{$student->user_id}}">
            <input type="hidden" class="form-control mb-3" name="stud_id" value="{{$student->id}}">
            <input type="hidden" class="form-control mb-3" name="role" value="3">

            <div class="form-group">
                <input type="text" class="form-control mb-3" name="firstname" placeholder="Student First Name" 
                value="{{$name[0]}}">
                @error('firstname')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control mb-3" name="lastname" placeholder="Student Last Name" 
                value="{{$name[1]}}">
                @error('lastname')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>
        
            <div class="form-group">
                <input type="text" class="form-control mb-3" name="phone" placeholder="Phone Number" value="{{$student->phone}}">
                @error('phone')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>
        
            <div class="form-group">
                <input type="email" class="form-control mb-3" name="email" placeholder="Student Email" value="{{$student->email}}">
                @error('email')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="mb-3">
                <span class="btn-block">Gender:</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ (($student->gender) == 'male') ? 'checked' : '' }}>
                    <label class="form-check-label" for="male"> Male </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ (($student->gender) == 'female') ? 'checked' : '' }}>
                    <label class="form-check-label" for="female"> Female </label>
                </div>
                <div class="form-check disabled mb-3">
                    <input class="form-check-input" type="radio" name="gender" id="others" value="others" {{ (($student->gender) == 'others') ? 'checked' : '' }}>
                    <label class="form-check-label" for="others">  Others  </label>
                </div>
                @error('gender')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <label for="dob">Date Of Birth:</label>
                <input type="date" class="form-control mb-3" name="dob" placeholder="" id="dob" value="{{$student->dob}}">
                @error('dob')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <label for="textarea1">Address:</label>
                <textarea class="form-control mb-3" id="textarea1" rows="3" name="address" placeholder="Student's full address">{{$student->address}}</textarea>
                @error('address')<small class="alert alert-danger">{{$message}}</small> @enderror
              </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-block btn-primary" name="" value="">Submit</button>
        
        </form>
    </div>
@endsection 
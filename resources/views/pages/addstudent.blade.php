@extends('layouts.dashboard')

@section('page_name')
    Add Student
@endsection

@section('content')
    <div class="card-body">
        <h2 class="mt-4 mb-1 text-center">Add Student</h2>
        {{-- To display all the error messages at the top pf the form --}}
        {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
                <small class="alert alert-danger">{{$error}}</small>
            @endforeach
        @endif --}}

        
        <form method="post" action="">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control mb-3" name="firstname" placeholder="Student First Name" 
                value="{{old('firstname')}}">
                @error('firstname')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control mb-3" name="lastname" placeholder="Student Last Name" 
                value="{{old('lastname')}}">
                @error('lastname')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>
        
            <div class="form-group">
                <input type="text" class="form-control mb-3" name="phone" placeholder="Phone Number" value="{{old('phone')}}">
                @error('phone')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>
        
            <div class="form-group">
                <input type="email" class="form-control mb-3" name="email" placeholder="Student Email" value="{{old('email')}}">
                @error('email')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="mb-3">
                <span class="btn-block">Gender:</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ (old('gender') == 'male') ? 'checked' : '' }}>
                    <label class="form-check-label" for="male"> Male </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ (old('gender') == 'female') ? 'checked' : '' }}>
                    <label class="form-check-label" for="female"> Female </label>
                </div>
                <div class="form-check disabled mb-3">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" {{ (old('gender') == 'other') ? 'checked' : '' }}>
                    <label class="form-check-label" for="other">  Other  </label>
                </div>
                @error('gender')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <label for="dob">Date Of Birth:</label>
                <input type="date" class="form-control mb-3" name="dob" placeholder="" id="dob" value="{{old('dob')}}">
                @error('dob')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <label for="textarea1">Address:</label>
                <textarea class="form-control mb-3" id="textarea1" rows="3" name="address">{{old('address')}}</textarea>
                @error('address')<small class="alert alert-danger">{{$message}}</small> @enderror
              </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-block btn-primary" name="" value="">Submit</button>
        
        </form>
    </div>
@endsection 
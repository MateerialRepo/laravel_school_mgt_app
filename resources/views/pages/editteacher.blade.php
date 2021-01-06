@extends('layouts.dashboard')

@section('page_name')
    Edit Teacher
@endsection

@section('content')
    <div class="card-body">
        <h2 class="mt-4 mb-1 text-center">Edit Teacher Profile</h2>    

        <?php       $name = explode(" ", $teacher->name)        ?>    

        <form method="post" action="{{url('/editteacher')}}">
            @csrf

            <input type="hidden" class="form-control mb-3" name="role" value="2">
            <input type="hidden" class="form-control mb-3" name="user_id" value="{{$teacher->user_id}}">
            <input type="hidden" class="form-control mb-3" name="teacher_id" value="{{$teacher->id}}">
            

            <div class="form-group">
                <input type="text" class="form-control mb-3" name="firstname" placeholder="Teacher's First Name" 
                value="{{$name[0]}}">
                @error('firstname')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <input type="text" class="form-control mb-3" name="lastname" placeholder="Teacher's Last Name" 
                value="{{$name[1]}}">
                @error('lastname')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>
        
            <div class="form-group">
                <input type="text" class="form-control mb-3" name="phone" placeholder="Phone Number" value="{{$teacher->phone}}">
                @error('phone')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>
        
            <div class="form-group">
                <input type="email" class="form-control mb-3" name="email" placeholder="Teacher's Email" value="{{$teacher->email}}">
                @error('email')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="mb-3">
                <span class="btn-block">Gender:</span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{ (($teacher->gender) == 'male') ? 'checked' : '' }}>
                    <label class="form-check-label" for="male"> Male </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" {{ (($teacher->gender) == 'female') ? 'checked' : '' }}>
                    <label class="form-check-label" for="female"> Female </label>
                </div>
                <div class="form-check disabled mb-3">
                    <input class="form-check-input" type="radio" name="gender" id="others" value="others" {{ (($teacher->gender) == 'others') ? 'checked' : '' }}>
                    <label class="form-check-label" for="others">  Others  </label>
                </div>
                @error('gender')<small class="alert alert-danger">{{$message}}</small> @enderror
            </div>

            <div class="form-group">
                <label for="textarea1">Address:</label>
                <textarea class="form-control mb-3" id="textarea1" rows="3" name="address" placeholder="Teacher's full address">{{$teacher->address}}</textarea>
                @error('address')<small class="alert alert-danger">{{$message}}</small> @enderror
              </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-block btn-primary" name="" value="">Submit</button>
        
        </form>
    </div>
@endsection 
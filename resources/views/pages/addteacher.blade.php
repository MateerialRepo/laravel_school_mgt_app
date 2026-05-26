@extends('layouts.dashboard')
@section('page_name', 'Add Teacher')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="form-card p-4 p-md-5">
            <form method="POST" action="">
                @csrf
                <input type="hidden" name="role" value="2">

                <div class="form-section-title">Teacher Information</div>
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                               name="firstname" value="{{ old('firstname') }}" placeholder="e.g. Jane">
                        @error('firstname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                               name="lastname" value="{{ old('lastname') }}" placeholder="e.g. Smith">
                        @error('lastname')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                               name="phone" value="{{ old('phone') }}" placeholder="e.g. +234 801 000 0000">
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" placeholder="teacher@school.com">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <div class="d-flex gap-2 mt-1">
                            @foreach(['male','female','others'] as $g)
                            <input class="gender-option" type="radio" name="gender" id="gender_{{ $g }}" value="{{ $g }}" {{ old('gender') == $g ? 'checked' : '' }}>
                            <label class="gender-label" for="gender_{{ $g }}">
                                <i class="bi bi-{{ $g === 'male' ? 'gender-male' : ($g === 'female' ? 'gender-female' : 'gender-ambiguous') }}"></i>
                                {{ ucfirst($g) }}
                            </label>
                            @endforeach
                        </div>
                        @error('gender')<div class="text-danger mt-1" style="font-size:.8rem">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror"
                                  name="address" rows="3" placeholder="Full residential address">{{ old('address') }}</textarea>
                        @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary-custom">
                        <i class="bi bi-person-badge-fill me-2"></i>Add Teacher
                    </button>
                    <a href="{{ route('listteachers') }}" class="btn" style="background:#f1f5f9;color:#334155;border-radius:9px;padding:10px 20px;font-weight:600">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

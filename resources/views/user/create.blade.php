@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Crud</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  </head>
<body>
    
    <div class="container ">
    <div class="d-flex justify-content-between  py-3">
    <div class="h4">CREATE USER</div>
    <div><a href="{{route('userinformations.index')}}" class="btn btn-primary">Back</a></div>
    </div>
   <form action="{{route('userinformations.store')}}"  method="post" enctype="multipart/form-data">
      @csrf
    <div class="card border-0 shadow-lg">
        <div class="card-body">
@if(Session::has('success'))
<div class="alert alert-success">
{{Session::get('success')}}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">
{{Session::get('error')}}
</div>
@endif

          <div class="mb-3">
            <label for="name" class="form-label">First Name<i class="text-danger"></i></label>
            <input type="text" name="first_name" id="first_name" 
            placeholder="Enter your first Name" class="form-control
            @error('first_name') is-invalid @enderror"  value="{{old('first_name')}}" >
            @error('first_name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Last Name<i class="text-danger"></i></label>
            <input type="text" name="last_name" id="last_name" 
            placeholder="Enter your Last Name" class="form-control
            @error('last_name') is-invalid @enderror"  value="{{old('last_name')}}" >
            @error('last_name')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="email" class="form-label">Email Id<i class="text-danger">****</i></label>
            <input type="email" name="email" id="email" 
            placeholder="Enter your email" class="form-control
            @error('email') is-invalid @enderror"  value="{{old('email')}}" >
            @error('email')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
            <strong id="error2" class="text-danger"></strong>
          </div>
          
          <div class="mb-3">
            <label for="phone" class="form-label">Phone number<i class="text-danger"></i></label>
            <input type="text" name="phone" id="phone" 
            placeholder="Enter your Phone number" class="form-control
            @error('phone') is-invalid @enderror"  value="{{old('phone')}}" >
            @error('phone')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="gender" class="form-label">Gender<i class="text-danger"></i></label>
            <select  name="gender" id="gender" 
            placeholder="Enter your Name" class="form-control
            @error('gender') is-invalid @enderror">
            <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Other" {{ $user->gender === 'Other' ? 'selected' : '' }}>Other</option>
        </select>
            @error('gender')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="role" class="form-label">Role<i class="text-danger"></i></label>
            <select name="role" id="role"  class="form-control
            @error('role') is-invalid @enderror">
            <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="User" {{ $user->role === 'User' ? 'selected' : '' }}>User</option>
         </select>
            @error('role')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>
          
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture</label>
            <input type="file" name="profile_picture" class="@error('profile_picture') is-invalid @enderror"  >
            @error('profile_picture')
            <p class="invalid-feedback">{{$message}}</p>
            @enderror
          </div>

        </div>
    </div>
    <button class="btn btn-primary">Save Details</button>
</form>
</div>
@endsection
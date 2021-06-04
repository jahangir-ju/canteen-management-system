@extends('admin.layout')
<link href="{{asset('Frontend/css/register.css')}}" rel="stylesheet">
<link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
@section('admin_content')
<div class="title">
    <a href="{{ route('show.admin') }}"  class="btn btn-info btn-sm">Back</a> Update Admin  Information
</div>
<div class="wrapper">
    <div class="form">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
        @endif
        <form action="{{route('update.admin',$admins->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            
            <div class="inputField">
                <label>
                    Admin ID
                </label>
                <input class="col-md-6 input-text" name="admin_id" value="{{$admins->admin_id}}" placeholder=" ID" type="text">
                </input>
            </div>
            <div class="inputField">
                <label>
                    Admin Name
                </label>
                <input class="col-md-6 input-text" name="admin_name" value="{{$admins->admin_name}}" placeholder=" name" type="text">
                </input>
            </div>
            <div class="inputField">
                <label>
                    Email Address
                </label>
                <input class="col-md-6 input-text" name="admin_email" value="{{$admins->admin_email}}" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email" type="text">
                </input>
            </div>
            <div class="inputField">
                <label>
                    Gender
                </label>
                <select class="col-md-4" name="gender">
                    <option>
                        Gender
                    </option>
                    <option value="Male">
                        Male
                    </option>
                    <option value="Female">
                        Female
                    </option>
                </select>
            </div>
            <div class="inputField">
                <label>
                    Password
                </label>
                <input class="col-md-6 input-text" name="password" value="{{$admins->password}}" placeholder="password" type="password">
                </input>
            </div>
            <div class="inputField">
                <label>
                    Confirm Password
                </label>
                <input class="col-md-6 input-text" name="password_confirmation" value="{{$admins->password}}" placeholder="confirm password" type="password">
                </input>
            </div>
            <h4>
            Contact Details
            </h4>
            <div class="inputField">
                <label>
                    Phone Number
                </label>
                <input class="col-md-6 input-text" name="admin_phone" value="{{$admins->admin_phone}}" placeholder="Phone Number" type="text">
                </input>
            </div>
            <button class="btn btn-success" type="submit">
            Update
            </button>
        </form>
    </div>
</div>
@endsection
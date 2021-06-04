@extends('admin.layout')
<link href="{{asset('Frontend/css/register.css')}}" rel="stylesheet">
<link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
@section('admin_content')
<div class="wrapper">
    <div class="title bg-primary">
        Admin Registation Form
    </div>
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
        <form action="{{ route('save-admin') }}" enctype="multipart/form-data" method="POST">
            @csrf
            
            <div class="inputField">
                <label>
                    Admin ID
                </label>
                <input class="col-md-6 input-text" name="admin_id" placeholder=" ID" type="text">
                </input>
            </div>
            <div class="inputField">
                <label>
                    Admin Name
                </label>
                <input class="col-md-6 input-text" name="admin_name" placeholder=" name" type="text">
                </input>
            </div>
            <div class="inputField">
                <label>
                    Email Address
                </label>
                <input class="col-md-6 input-text" name="admin_email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email" type="text">
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
                <input class="col-md-6 input-text" name="password" placeholder="password" type="password">
                </input>
            </div>
            <div class="inputField">
                <label>
                    Confirm Password
                </label>
                <input class="col-md-6 input-text" name="password_confirmation" placeholder="confirm password" type="password">
                </input>
            </div>
            <h4>
            Contact Details
            </h4>
            <div class="inputField">
                <label>
                    Phone Number
                </label>
                <input class="col-md-6 input-text" name="admin_phone" placeholder="Phone Number" type="text">
                </input>
            </div>
            <div class="form-group">
                <label for="">
                </label>
                <input id="inlineCheckbox1" name="status" type="checkbox" value="1">
                Publish
                </input>
            </div>
            <button class="btn btn-success" type="submit">
            Register
            </button>
        </form>
    </div>
</div>

@endsection
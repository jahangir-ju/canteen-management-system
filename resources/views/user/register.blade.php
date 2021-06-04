@extends('layout')
@section('content')
<link href="{{asset('Frontend/css/register.css')}}" rel="stylesheet">

<div class="wrapper">
            <div class="title">
                Student Registration Form
            </div>
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

            <?php
                $message = Session::get('message');
               
                if($message){
                  echo $message;
                       
                  Session::put('message',NULL);
                }
                ?>

            <form action="{{URL('student_registerby')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form">
                    <div class="inputfield">
                        <label>
                            Student ID
                        </label>
                        <input class="input" name="st_id" type="text">
                        </input>
                    </div>
                    <div class="inputfield">
                        <label>
                            Student Name
                        </label>
                        <input class="input" name="st_name" type="text">
                        </input>
                    </div>
                    <div class="inputfield">
                        <label>
                            Dpeartment
                        </label>
                        <div class="custom_select">
                            <select name="depertment">
                                <option value="">
                                    Select
                                </option>
                                <?php 
                $dept =DB::table('departments')->
                                get();
                 foreach ($dept as $v_dept){?>
                                <option value="{{$v_dept->id}}">
                                    {{$v_dept->dept_name}}
                                </option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="inputfield">
                        <label>
                            Email Address
                        </label>
                        <input class="input" name="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" type="text">
                        </input>
                    </div>
                    <div class="inputfield">
                        <label>
                            Gender
                        </label>
                        <div class="custom_select">
                            <select name="gender">
                                <option value="">
                                    Select
                                </option>
                                <option value="male">
                                    Male
                                </option>
                                <option value="female">
                                    Female
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="inputfield">
                        <label>
                            Password
                        </label>
                        <input class="input" name="password" type="password">
                        </input>
                    </div>
                    <div class="inputfield">
                        <label>
                            Confirm Password
                        </label>
                        <input class="input" name="password_confirmation" type="password">
                        </input>
                    </div>
                    <div class="inputfield">
                        <label>
                            Phone Number
                        </label>
                        <input class="input" name="phone_number" type="text">
                        </input>
                    </div>
                    <div class="inputfield">
                        <label>
                            Hostel Name
                        </label>
                        <input class="input" name="hostel_name" type="text">
                        </input>
                    </div>
                    <div class="inputfield">
                        <label>
                            Room Number
                        </label>
                        <input class="input" name="room_number" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Upload file:
                        </label>
                        <input name="file" type="file">
                        </input>
                    </div>
                    <div class="inputfield">
                        <input class="btn" type="submit">
                        </input>
                    </div>
                    <div>
                        <p>
                            Already Have you an account
                            <a href="{{ route('login.page') }}">
                                Login
                            </a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
  @endsection()
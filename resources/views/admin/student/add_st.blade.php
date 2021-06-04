@extends('admin.layout')
<link href="{{asset('Frontend/css/register.css')}}" rel="stylesheet">
<link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
@section('admin_content')
<div class="wrapper">
     <div class="title bg-info">
                        Student Registation Form
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
                  <div class="alert alert-success">{{Session::get('message')}}</div>
                 @endif
                <form action="{{route('student_registerby_admin')}}" enctype="multipart/form-data" method="post">
                    @csrf
                   
                    <div class="inputField">
                        <label>Studnet ID</label>
                        <input class="col-md-6 input-text" name="st_id" placeholder="Student ID" type="text">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>Studnet Name</label>
                        <input class="col-md-6 input-text"  name="st_name"placeholder="Student name" type="text">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>Department ID</label>
                        <select class="col-md-4" name="depertment">
                            <option>
                                Depertment
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
                    <div class="inputField">
                        <label>Email Address</label>
                        <input class="col-md-6 input-text" name="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email" type="text">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>Gender</label>
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
                        <label>Password </label>
                        <input class="col-md-6 input-text" name="password" placeholder="password" type="password">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>Confirm Password</label>
                        <input class="col-md-6 input-text" name="password_confirmation" placeholder="confirm password" type="password">
                        </input>
                    </div>
                    <h4>
                        Contact Details
                    </h4>
                    <div class="inputField">
                        <label>Phone Number </label>
                        <input class="col-md-6 input-text" name="phone_number" placeholder="Phone Number" type="text">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>Hostel Name</label>
                        <input class="col-md-6 input-text"  name="hostel_name" placeholder="Hostel Name" type="text">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>Room Number</label>
                        <input class="col-md-6 input-text" name="room_number" placeholder="Room Number" type="text">
                        </input>
                    </div>
                    <div class="form-group">
                        <label>
                            Upload file
                        </label>
                        <div class="row">
                            <div class="col-12">
                               
                                <input aria-describedby="fileHelp" id="exampleInputFile2" name="file" type="file">
                              
                            </div>
                        </div>
                    </div>
                   
                    <button class="btn btn-success" type="submit">
                        Register
                    </button>
                </form>
            </div>
        </div>
      
@endsection

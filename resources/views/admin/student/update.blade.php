@extends('admin.layout')
<link href="{{asset('Frontend/css/register.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">

        @section('admin_content')
            <a href="{{ route('student_information') }}"  class="btn btn-info btn-sm">Back</a>
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
                <form action="{{route('update_st_info',$student_edit->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @csrf
                    <div class="title bg-info">
                        Update Student Form
                    </div>
                    <div class="inputField">
                        <label>
                            Studnet ID
                        </label>
                        <input class="col-md-6 input-text" name="st_id" type="text" value="{{$student_edit->st_id}}">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>
                            Studnet Name
                        </label>
                        <input class="col-md-6 input-text" name="st_name" type="text" value="{{$student_edit->st_name}}">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>
                            Department ID
                        </label>
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
                        <label>
                            Email Address
                        </label>
                        <input class="col-md-6 input-text" name="email" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" type="text" value="{{$student_edit->email}}">
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
                    <h4>
                        Contact Details
                    </h4>
                    <div class="inputField">
                        <label>
                            Phone Number
                        </label>
                        <input class="col-md-6 input-text" name="phone_number" type="text" value="{{$student_edit->phone}}">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>
                            Hostel Name
                        </label>
                        <input class="col-md-6 input-text" name="hostel_name" type="text" value="{{$student_edit->hostel_name}}">
                        </input>
                    </div>
                    <div class="inputField">
                        <label>
                            Room Number
                        </label>
                        <input class="col-md-6 input-text" name="room_number" type="text" value="{{$student_edit->room}}">
                        </input>
                    </div>
                    <button class="btn btn-success" type="submit">
                        Update Information
                    </button>
                </form>
            </div>
        </div>
@endsection

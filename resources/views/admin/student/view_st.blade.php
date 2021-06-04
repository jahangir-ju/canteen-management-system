@extends('admin.layout')
@section('admin_content')
<h1 class="page-title">
    User Profile
</h1>
<div class="row user-profile">
    <div class="col-lg-4 side-left">
        <div class="card mb-4">
            <div class="card-body avatar">
                <h2 class="card-title">
                    Info
                </h2>
                <img alt="" class="card-img-top" height="200px" src="{{asset(Storage::disk('local')->url($viewinfo->image))}}">
                    </img>
                
                    <p class="name">
                        {{$viewinfo->st_name}}
                    </p>
                    <p class="designation">
                        Student
                    </p>
                    <a class="email" href="#">
                        {{$viewinfo->email}}
                    </a>
                    <a class="number" href="#">
                        {{$viewinfo->phone}}
                    </a>
                </img>
            </div>
        </div>
    </div>
    <div class="col-lg-8 side-right">
        <div class="card">
            <div class="card-body">
                <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                    <h2 class="card-title">
                        Details
                    </h2>
                    <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a aria-controls="info" aria-expanded="true" class="nav-link active" data-toggle="tab" href="#info" id="info-tab" role="tab">
                                Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-controls="avatar" class="nav-link" data-toggle="tab" href="#avatar" id="avatar-tab" role="tab">
                                Avatar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a aria-controls="security" class="nav-link" data-toggle="tab" href="#security" id="security-tab" role="tab">
                                Security
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="wrapper">
                    <hr>
                        <div class="tab-content" id="myTabContent">
                            <div aria-labelledby="info-tab" class="tab-pane fade show active" id="info" role="tabpanel">
                                <form>
                                    <div class="form-group">
                                        <label for="designation">
                                            Student ID
                                        </label>
                                        <input class="form-control" disabled="" type="text" value="{{$viewinfo->st_id}}">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">
                                            Student Name
                                        </label>
                                        <input class="form-control" disabled="" type="text" value="{{$viewinfo->st_name}}">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">
                                            Mobile Number
                                        </label>
                                        <input class="form-control" disabled="" type="text" value="{{$viewinfo->phone}}">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                        </label>
                                        <input class="form-control" disabled="" type="email" value="{{$viewinfo->email}}">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">
                                            Hostal Name
                                        </label>
                                        <input class="form-control" disabled="" type="text" value="{{$viewinfo->hostel_name}}">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">
                                            Room Number
                                        </label>
                                        <input class="form-control" disabled="" type="text" value="{{$viewinfo->room}}">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">
                                            Password
                                        </label>
                                        <input class="form-control" disabled="" type="text" value="{{$viewinfo->password}}">
                                        </input>
                                    </div>
                                    <div class="form-group mt-5">
                                        <a class="btn btn-primary btn-sm" href="{{ route('student_edit',$viewinfo->id) }}">
                                            update
                                        </a>
                                       
                                    </div>
                                </form>
                            </div>
                            <!-- tab content ends -->
                            <div aria-labelledby="avatar-tab" class="tab-pane fade" id="avatar" role="tabpanel">
                                <div class="wrapper mb-5 mt-4">
                                    <div class="badge badge-warning text-white">
                                        Note :
                                    </div>
                                    <p class="d-inline ml-3 text-muted">
                                        Image size is limited to not greater than 1MB .
                                    </p>
                                </div>
                                <form>
                                    <input class="dropify" data-default-file="http://via.placeholder.com/100x100" data-max-file-size="1mb" type="file"/>
                                    <div class="form-group mt-5">
                                        <button class="btn btn-success mr-2" type="submit">
                                            Update
                                        </button>
                                        <button class="btn btn-outline-danger">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div aria-labelledby="security-tab" class="tab-pane fade" id="security" role="tabpanel">


                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="change-password">
                                            Change password
                                        </label>
                                        <input class="form-control" id="change-password" name="old_pass" placeholder="Enter you current password" type="password">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="new-password" name="new_pass" placeholder="Enter you new password" type="password">
                                        </input>
                                    </div>
                                    <div class="form-group mt-5">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            update
                                        </a>
                                        <button class="btn btn-outline-danger">
                                            Cancel
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

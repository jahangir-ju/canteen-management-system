@extends('layout')
<link href="{{ asset('Frontend/css/profile.css') }}" rel="stylesheet" type="text/css">
    @section('content')
    <div class="container">
        <div class="blank">
        </div>
        <div class="mainbody">
            <div class="row">
                <div class="col-md-4 col-sm-3">
                    <div class="box">
                        <div class="imgbox">
                            
                            <img alt="" class="card-img-top" height="200px" src="{{asset(Storage::disk('local')->url($profileinfo->image))}}">
                                
                            </img>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-8 col-sm-9">
                    <div class="right-contant">
                        <h4>
                            My Profile
                        </h4>
                        <table class="table">
                            <tr>
                                <td>
                                    Name
                                </td>
                                <td>
                                   {{$profileinfo->st_name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Department
                                </td>
                                <td>
                                    {{$profileinfo->depertment->dept_name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email Address
                                </td>
                                <td>
                                   {{$profileinfo->email}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gender
                                </td>
                                <td>
                                   {{$profileinfo->gender}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Phone Number
                                </td>
                                <td>
                                    {{$profileinfo->phone}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hostal Name
                                </td>
                                <td>
                                    {{$profileinfo->hostel_name}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   Room Number
                                </td>
                                <td>
                                    {{$profileinfo->room}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Password
                                </td>
                                <td>
                                    {{$profileinfo->password}}
                                </td>
                            </tr>
                          
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Your order item</h3>
                    <table class="table table-bordered text-center ">
                        <thead>
                            <tr>
                              <th scope="col">Order ID</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Payment Method</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderitem as $orderitems)
                            <tr>
                              <th scope="row">{{$orderitems->id}}</th>
                              <td>{{$orderitems->phone}}</td>
                              <td>{{$orderitems->payment_method}}</td>
                              @if($orderitems->status==1)
                              <td>Pending</td>
                              @elseif($orderitems->status==5)
                              <td>Confirm</td>
                               @elseif($orderitems->status==10)
                              <td>Complete</td>
                              @endif
                            <td>
                                @if($orderitems->status==1)
                                    <a href="{{ route('order.cancel', $orderitems->id) }}">Cancel</a>    
                                @endif
                            </td>
                            </tr>
                            @endforeach()
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>

@endsection

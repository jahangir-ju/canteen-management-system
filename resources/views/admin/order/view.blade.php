@extends('admin.layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" style="font-size: 22px;">
            <div class="card-header" style="background:gray; color: white">
                <h1 class="text-center">Order details</h1>
            </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col-sm-6 pt-4 pl-4" style="border:35px groove;background: #a7b10a">
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Student ID
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->student->st_id }}
                                </div>
                            </div> 
                        </p>
                         <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Student Name:
                                </div>
                                <div class="col-sm-8">
                                   : {{ $order->student->st_name }}
                                </div>
                            </div> 
                        </p>
                         <p>
                            <div class="row">
                                <div class="col-sm-4">
                              Gender
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->student->gender }}
                                </div>
                            </div> 
                        </p>
                         <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Phone Number
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->student->phone }}
                                </div>
                            </div> 
                        </p>
                         <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Email
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->student->email }}
                                </div>
                            </div> 
                        </p>
                         <p>
                            <div class="row">
                                <div class="col-sm-4">
                                  Hostal name
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->student->hostel_name }}
                                </div>
                            </div> 
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Room Number
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->student->room }}
                                </div>
                            </div> 
                        </p>                        
                    </div>
                    <div class="col-sm-6 pt-4 pl-4" style="border:35px groove;background: #a7b10a">
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Order Id
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->id }}
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Payment Method ID
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->payment_method }}
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                  Transiction ID:
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->transactionID }}
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Total Amount:
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->total_amount }}
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                 Payment Amount:
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->payment_amount }}
                                </div>
                            </div>
                        </p>
                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                                  Date and time:
                                </div>
                                <div class="col-sm-8">
                                    : {{ $order->created_at }}
                                </div>
                            </div>
                        </p>

                        <p>
                            <div class="row">
                                <div class="col-sm-4">
                            Payment  Status:
                                </div>
                            <div class="col-sm-8">
                                @if($order->status==1)
                                    Pending
                                @elseif($order->status==5)
                                    Confirm
                                @elseif($order->status==10)
                                    Complete
                                @endif
                            </div>
                        </div>
                        </p>
                      
                    </div>
                </div>
                <div class="row">
                        <table class="table">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Food Name
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Subtotal
                                </th>
                            </tr>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    {{ ++$loop->index }}
                                </td>
                                <td>
                                    {{ $item->fooditem->food_name }}
                                </td>
                                <td>
                                    {{ $item->qty }}
                                </td>
                                <td>
                                    {{ number_format($item->price, 2) }}
                                </td>
                                <td>
                                    {{ number_format($item->subtotal, 2) }}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

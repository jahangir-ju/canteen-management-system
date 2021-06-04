@extends('admin.layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">
                    Order list
                </h2>
                <div class="table-responsive">
                    <table class="table center-aligned-table">
                        <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>
                                    User name
                                </th>
                                <th>
                                    Phone Number
                                </th>
                              
                                <th>
                                    Date
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>
                                    {{$order->id}}
                                </td>
                                <td>
                                     {{$order->student->st_name}}
                                </td>
                                <td>
                                    {{$order->phone}}
                                </td>                        
                               
                                <td>
                                    {{$order->created_at->diffForHumans()}}
                                </td>
                                <td>
                                  @if($order->status==1)
                                    <a class="btn btn-primary btn-sm" href="{{ route('confirm',$order->id)}}">
                                        Pending
                                    </a>
                                    @elseif($order->status==5)
                                    <a class="btn btn-info btn-sm" href="{{ route('complete',$order->id)}}">
                                        Confirm
                                    </a>
                                    @elseif($order->status==10)
                                    <a class="btn btn-success btn-sm">
                                        Complete
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('food.orderview', $order) }}">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

@extends('layout')
@section('content')
 @if(session('student_id'))
<div class="container">
    <div class="row pt-5 pb-5">
        <div class="col-sm-12 mb-4">
            <div class="pb-2">
                <h4 class="text-center text-primary ">
                    Before Checkout Make Payment
                </h4>
                <h5>Must be full Payment Otherwise order do not confirm</h5>

            </div>
        </div>
        <div class="col-md-12">
            <div class="row ">
                <div class="col-md-6">
                    <h4 class="text-primary initialism">
                        Bkash Payment Rules:
                    </h4>
                    <ul>
                        <li>
                            Using your/agent’s Dutch Bangla Mobile Banking Account, dial*322#.
                        </li>
                        <li>
                            From the menu appeared, select 1 for Payment.
                        </li>
                        <li>
                            Select 1 for Bill Pay.
                        </li>
                        <li>
                            Enter your mobile no. as Bill Number.
                        </li>
                        <li>
                            Enter 1000 as Amount
                        </li>
                        <li>
                            Enter your/agent’s mobile banking PIN.
                        </li>
                        <li>
                            hen you will get an SMS with Transaction Id(TxnId)
                        </li>
                        <li>
                            Then input Transaction Id(TxnId) in the payment page of the admission system.
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4 class="text-primary initialism">
                        Roket Payment Rules:
                    </h4>
                    <ul>
                        <li>
                            Using your/agent’s Dutch Bangla Mobile Banking Account, dial*322#.
                        </li>
                        <li>
                            From the menu appeared, select 1 for Payment.
                        </li>
                        <li>
                            Select 1 for Bill Pay.
                        </li>
                        <li>
                            Enter your mobile no. as Bill Number.
                        </li>
                        <li>
                            Enter 1000 as Amount
                        </li>
                        <li>
                            Enter your/agent’s mobile banking PIN.
                        </li>
                        <li>
                            hen you will get an SMS with Transaction Id(TxnId)
                        </li>
                        <li>
                            Then input Transaction Id(TxnId) in the payment page of the admission system.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-sm-7 pt-5">
            <h4 class="text-primary">Fill Up this From To Order:</h4>
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


            <form action="{{ route('save-order') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">
                        Phone Number
                    </label>
                    <div class="col-sm-9">
                        <input class="col" id="inputEmail3" name="phone_number">
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">
                        Email Address
                    </label>
                    <div class="col-sm-9">
                        <input class="col" id="inputEmail3" name="email" type="email">
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">
                        Adddress
                    </label>
                    <div class="col-sm-9">
                        <input class="col" id="inputEmail3" name="address" type="text">
                        </input>
                    </div>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-3 pt-0">
                            Payment Method
                        </legend>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" id="gridRadios2" name="payment_method" type="radio" value="bkash">
                                    <label class="form-check-label" for="gridRadios2">
                                        Bkash
                                    </label>
                                </input>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="gridRadios3" name="payment_method" type="radio" value="roket">
                                    <label class="form-check-label" for="gridRadios3">
                                        Roket
                                    </label>
                                </input>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">
                        Transcation ID
                    </label>
                    <div class="col-sm-9">
                        <input class="col" id="inputEmail3" name="trxID" type="text">
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">
                        Total Amount
                    </label>
                    <div class="col-sm-9">
                        <input class="col" disabled="" id="inputEmail3" name="" type="text" value="{{Cart::totalFloat() - Cart::taxFloat()}}">
                        </input>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">
                        Payment Amount
                    </label>
                    <div class="col-sm-9">
                        <input class="col" id="inputEmail3" name="pyment_amount" type="text">
                        </input>
                    </div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-info mb-2" type="submit">
                        Confirm Order
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-5 pt-5">
            <h5 class="text-primary">Your Cart Information</h5>
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                              Food Name
                            </th>
                            <th>
                               Quantity
                            </th>
                             <th>
                               Price
                            </th>
                        </tr>
                      
                    </thead>
            
                    <tbody>
                        @foreach($checkouts as $Checkout)
                        <tr>
                            <td>
                              {{$Checkout->name}}
                            </td>
                            <td>
                                {{$Checkout->qty}}
                            </td>
                             <td>
                               {{$Checkout->price}}
                            </td>
                        </tr>
                         @endforeach
                           <tr>
                            <td colspan="2">
                              Total Price
                            </td>
                            
                             <td>
                              {{Cart::totalFloat() - Cart::taxFloat()}}
                            </td>
                        </tr>

                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@else
    @include('user.login')
@endif
@endsection

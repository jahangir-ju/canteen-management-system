@extends('layout')
@section('content')
<div class="container">
    <div class="row pt-5 pb-5">
        <div class="pl-4">
            <h3 style="text-transform: capitalize;">
                Now comfirm your cart Food:
            </h3>
        </div>
        <div class="container">
            <table class="table table-bordered table-condensed">
                <thead class="">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Total Price
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
						$total =0;
					?>
                    @foreach($food_show as $carrowID=> $food)
                    <tr>
                        <td>
                            {{$food->id}}
                        </td>
                        <td>
                            {{$food->name}}
                        </td>
                        <td>
                            <input type="number" value="{{ $food->qty }}" data-row="{{ $carrowID }}" data-url = "{{ route('public') }}" class="changeQty" style="width:100px;">
                        </td>
                        <td>
                            {{$food->price}}
                        </td>
                        <?php $subtotal =$food->
                        qty * $food->price?>
                        <td>
                            {{$subtotal}}
                        </td>
                        <td>
                            <form action="{{route('Remove.Cart')}}" method="post">
                                @csrf
                                <input name="rowID" type="hidden" value="{{ $carrowID }}">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-trash">
                                        </i>
                                        <i class="fa fa-cart-remove">
                                        </i>
                                    </button>
                                </input>
                            </form>
                        </td>
                    </tr>
                    <?php 
						$total = $total+$subtotal;
					?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a class="btn btn-info btn-block" href="{{ route('checkout') }}">
            Checkout
        </a>
    </div>
</div>
@endsection

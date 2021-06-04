@extends('layout')
@section('content')
@include('pages.slider')
<div class="container-fluid">
    <div class="row pt-4 pb-5">
        @foreach($food_Item as $v_food_Item)
        <div class="col-md-4 pd-2">
            <div class="card">
                <img alt="" class="card-img-top" height="200px" src="{{asset(Storage::disk('local')->url($v_food_Item->Food_picture))}}">
                <h5 class="btn btn-info">


                            Available Now {{$v_food_Item->quantity-$v_food_Item->order_items->sum('qty')}} Items
                        </h5>
                    <div class="card-body">
                        <h5>
                            {{$v_food_Item->food_name}}
                        </h5>
                        <h5>
                            BDT :: {{$v_food_Item->Food_price}}
                        </h5>
                        <form action="{{route('add.to.cart')}}" method="post">
                            @csrf
                            <input name="id" type="hidden" value="{{$v_food_Item->id}}">
                                <input name="food_name" type="hidden" value="{{$v_food_Item->food_name}}">
                                    <input name="qty" type="hidden">
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-cart-plus">
                                            </i>
                                            Add to cart
                                        </button>
                                    </input>
                                </input>
                            </input>
                        </form>
                    </div>
                </img>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection()

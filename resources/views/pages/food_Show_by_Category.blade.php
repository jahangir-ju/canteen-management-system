@extends('layout')
@section('content')
@include('pages.slider')
<div class="container-fluid">
    <div class="row pt-4 pb-5">
        @foreach($show_by_categories as $show_by_category)
        <div class="col-md-4 pd-2">
            <div class="card">
                <img alt="" class="card-img-top" height="200px" src="{{asset(Storage::disk('local')->url($show_by_category->Food_picture))}}">
                    <div class="card-body">
                        <h5>
                            {{$show_by_category->food_name}}
                        </h5>
                        <h5>
                            BDT :: {{$show_by_category->Food_price}}
                        </h5>
                        <form action="{{route('add.to.cart')}}" method="post">
                            @csrf
                            <input name="id" type="hidden" value="{{$show_by_category->id}}">
                                <input name="food_name" type="hidden" value="{{$show_by_category->food_name}}">
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

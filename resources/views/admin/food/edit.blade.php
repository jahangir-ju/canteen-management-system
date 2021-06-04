@extends('admin.layout')
@section('admin_content')
    <div class="content-wrapper">
        <h1 class="page-title">
            Update All Information
        </h1>
        <div class="row">
            <div class="col-12 col-lg-6 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">
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
                        <?php
                          $message = Session::get('message');
                          if($message){
                            echo 
                                $message;
                            Session::put('message',NULL);
                          }
                        ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{URL('edit_food_item',$edit_food->id)}}" class="forms-sample" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
                <label for="">
                    Food Id
                </label>
                <input aria-describedby="emailHelp" class="form-control p-input"  name="food_id" value="{{$edit_food->food_id}}" disabled="" type="test">
             
            </div>
            <div class="form-group">
                <label for="">
                    Food name
                </label>
                <input class="form-control p-input" id="username" name="food_name" value="{{$edit_food->food_name}}" type="text">
                </input>
            </div>
            <div class="form-group">
                <label for="">
                    Food Category
                </label>
                <select class="form-control col-md-8" name="food_category">
                    <option>
                        Select food type
                    </option>
                    <?php 
                        $category =DB::table('food_categories')->
                    get();
                        foreach ($category as $v_category){?>
                    <option value="{{$v_category->id}}">
                        {{$v_category->name}}
                    </option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="">
                    Food Price
                </label>
                <input class="form-control p-input"  name="food_price" value="{{$edit_food->Food_price}}" type="text">
                </input>
            </div>
             <div class="form-group">
                <label for="">
                    Quantity
                </label>
                <input class="form-control p-input"  name="quantity" value="{{$edit_food->quantity}}" type="text">
                </input>
            </div>
            
            <div class="form-group">
                <label for="exampleTextarea">
                    Food Description
                </label>
                <input type="textarea" class="form-control p-input" value="{{$edit_food->Food_description}}" rows="3" name="food_description">
              
            </div>
        
            <div class="form-group">
                <label for="">
                </label>
                <input id="inlineCheckbox1" name="status" type="checkbox" value="1">
                    Publish
                </input>
            </div>
            <button class="btn btn-success" type="submit">
                Submit
            </button>
        </form>
       
    </div>
 @endsection
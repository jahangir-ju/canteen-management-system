@extends('admin.layout')
@section('admin_content')
<div class="content-wrapper">
    <h1 class="page-title">
        Add New Food
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
                   
            <form action="{{route('save.food')}}" class="forms-sample" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label for="">
                        Food Id
                    </label>
                        <input aria-describedby="emailHelp" class="form-control p-input" name="food_id" placeholder="Type Food Id" type="test">
                
                </div>
                <div class="form-group">
                    <label for="">
                        Food name
                    </label>
                    <input class="form-control p-input"  name="food_name" placeholder="Food name" type="text">
                    
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
                <input class="form-control p-input" 
                 name="food_price" placeholder="Price" type="text">
          
            </div>
            <div class="form-group">
                <label for="">
                   Quantity
                </label>
                <input class="form-control p-input" 
                 name="quantity" placeholder="quantity" type="text">
          
            </div>
            <div class="form-group">
                <label for="exampleTextarea">
                    Food Description
                </label>
                <textarea class="form-control p-input" id="exampleTextarea" name="food_description" rows="3"></textarea>
              
            </div>
            <div class="form-group">
                <label>
                    Upload file
                </label>
                <div class="row">
                    <div class="col-12">
                        <label class="btn btn-outline-primary btn-sm" for="exampleInputFile2">
                            <i class="mdi mdi-upload btn-label btn-label-left">
                            </i>
                            Browse
                        </label>
                        <input aria-describedby="fileHelp" class="form-control-file" id="exampleInputFile2" name="file" type="file">
                      
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">
                </label>
                <input id="inlineCheckbox1" name="status" type="checkbox" value="1">
                    Publish
               
            </div>
            <button class="btn btn-success" type="submit">
                Submit
            </button>
        </form>
    </div>

@endsection

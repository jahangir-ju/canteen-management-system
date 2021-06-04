@extends('admin.layout')
@section('admin_content')

 <div class="row">
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php
                   $totalfood = DB::table('food_items')->COUNT('id');
                   ?>
                  <h2 class="card-title">Total Food Item</h2>
                  <p>{{$totalfood}}</p>
                </div>
                <div class="dashboard-chart-card-container">
                  
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php
                   $totalstudent = DB::table('register_students')->COUNT('id');
                   ?>
                  <h2 class="card-title">Total Student</h2>
                  <p >{{$totalstudent}}</p>
                </div>
                <div class="dashboard-chart-card-container">
                 
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php
                   $totalorder = DB::table('orders')->COUNT('id');
                   ?>
                  <h2 class="card-title">Total Order Food </h2>
                  <p>{{$totalorder}}</p>
                </div>
                <div class="dashboard-chart-card-container">
               
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 grid-margin">
              <div class="card">
                <div class="card-body">
                  <?php
                   $totaladmin = DB::table('admins')->COUNT('id');
                   ?>
                  <h2 class="card-title">Admin</h2>
                  <p>{{$totaladmin}}</p>
                </div>
                <div class="dashboard-chart-card-container">
                  
                </div>
              </div>
            </div>
          </div>
  @endsection
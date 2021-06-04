@extends('admin.layout')
@section('admin_content')
   <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                
                  <h2 class="card-title">Message for student</h2>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead class="bg-info">
                        <tr>
                          <th>#</th>
                          <th>Student Name</th>
                          <th>Student Email</th>
                          <th>Subject</th>
                          <th>Message</th>
                       
                       
                        </tr>
                      </thead>
                      <tbody>
                      
                    @foreach($messageall as $message)
                    <tr>
                          <td>{{$loop->index+1}}</td>
                          <td>{{$message->name}}</td>
                          <td>{{$message->email}}</td>
                          <td>{{$message->subject}}</td>
                          <td>{{$message->message}}</td>
                         
                         
                        </tr>
                    @endforeach()
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
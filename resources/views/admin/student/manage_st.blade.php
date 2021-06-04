@extends('admin.layout')
@section('admin_content')
   <div class="row">
            <div class="col-lg-12">
              <div class="card">
                @if(Session::has('message'))
                  <div class="alert alert-success">{{Session::get('message')}}</div>
                 @endif
                <div class="card-body">
                  <h2 class="card-title">All Register Student Information</h2>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead class="bg-primary">
                        <tr>
                          <th>No</th>
                          <th>Student name</th>
                          <th>Department</th>
                          <th>Email</th>
                          <th>phone</th>
                          <th>Hostal name</th>
                          <th>Room Number</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($student as $v_student)
                        <tr class="">
                          <td>{{$loop->index+1}}</td>
                          <td>{{$v_student->st_name}}</td>
                          <td>{{$v_student->depertment->dept_name}}</td>
                          <td>{{$v_student->email}}</td>
                          <td>{{$v_student->phone}}</td>
                          <td>{{$v_student->hostel_name}}</td>
                          <td>{{$v_student->room}}</td>
                          <td>
                              <a href="{{route('view_student',$v_student->id)}}" class="btn btn-primary btn-sm">View</a>
                              <form method="POST" class="delete" action="{{route('delete_student',$v_student->id)}}"> @csrf
                                <button type="submit" onclick="" class="btn btn-primary btn-sm">Delete</button>
                              </form>
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
  <script>
  $(document).ready(function(){
 $('.delete').on('submit', function(){
  if(confirm("Are you sure you want to delete it?"))
  {
   return true;
  }
  else
  {
   return false;
  }
 });
});
</script>
@endsection
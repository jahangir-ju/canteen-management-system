@extends('admin.layout')

@section('admin_content')
   <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    <h2 class="card-title">Admin information table <a href="{{ route('add.admin') }}"  class="btn btn-info btn-sm">Add New</a></h2>
                    <div class="table-responsive">
                        <table class="table center-aligned-table">
                            <thead class="bg-info">
                                <tr>
                                    <th>Index</th>
                                    <th>Admin ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Gender</th>
                                    <th>status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admin as $admins)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$admins->admin_id}}</td>
                                        <td>{{$admins->admin_name}}</td>
                                        <td>{{$admins->admin_email}}</td>
                                        <td>{{$admins->admin_phone}}</td>
                                        <td>{{$admins->gender}}</td>
                                        <td>{{$admins->password}}</td>

                                        <td>
                                          @if($admins->status==1)
                                          <a href="{{route('unactive.admin',$admins->id)}}"><label class="badge badge-info">Active</label></a>
                                          @else
                                          <a href="{{route('active.admin',$admins->id)}}"><label class="badge badge-warning">Unactive</label></a>
                                          @endif                
                                        </td>
                                        <td>
                                            <a href="{{route('admin.edit',$admins->id)}}" class="btn btn-primary btn-sm">edit</a>
                                          
                                        </td>
                                        <td>
                                     
                                            <form method="post" class="delete_form" action="{{route('admin.delete',$admins->id)}}"> @csrf
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
 $('.delete_form').on('submit', function(){
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
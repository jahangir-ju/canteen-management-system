@extends('admin.layout')
@section('admin_content')
   <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                 @if(Session::has('message'))
                  <div class="alert alert-success">{{Session::get('message')}}</div>
                 @endif
                  <h2 class="card-title">Food Item Table</h2>
                  <div class="table-responsive">
                    <table class="table center-aligned-table">
                      <thead class="bg-info">
                        <tr>
                          <th>#</th>
                          <th>Food ID</th>
                          <th>Food name</th>
                          <th>Food category</th>
                          <th>Food Description</th>
                          <th>Food price</th>
                          <th>Quantity</th>
                          <th>Food image</th>
                          <th>Status</th>
                          <th>Action</th>
                       
                        </tr>
                      </thead>
                      <tbody>
                      
                    @foreach($fooditems as $fooditem)
                    <tr>
                          <td>{{$loop->index+1}}</td>
                          <td>{{$fooditem->food_id}}</td>
                          <td>{{$fooditem->food_name}}</td>
                          <td>{{ optional($fooditem->categories)->name }}</td>
                          <td>{{$fooditem->Food_description }}</td>
                          <td>BDT:{{$fooditem->Food_price}}</td>
                          <td>{{$fooditem->quantity}}</td>
                          <td> <img alt="" class="card-img-top" height="80px" src="{{asset(Storage::disk('local')->url($fooditem->Food_picture))}}"></td>
                          <td>
                            @if($fooditem->status==1)
                            <a href="{{ route('unactive_food',$fooditem->id)}}"><label class="badge badge-info">Active</label></a>
                            @else
                            <a href="{{route('active_food',$fooditem->id)}}"><label class="badge badge-warning">Unactive</label></a>
                            @endif                
                          </td>
                          <td>
                            <a href="{{ route('edit',$fooditem->id) }}" class="btn btn-primary btn-sm">edit</a>
                            <form method="post" class="delete" action="{{route('delete_food',$fooditem->id)}}"> @csrf
                                <button type="submit" onclick="" class="btn btn-primary btn-sm">Delete</button>
                              </form>
                          </td>

                        </tr>
                    @endforeach()
                        
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
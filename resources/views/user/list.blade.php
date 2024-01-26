@extends('layouts.app')
@section('content')
   
<div class="row my-3">
       
@if(Session::has('success'))
<div class="alert alert-success">
  {{Session::get('success')}}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger">
{{Session::get('error')}}
</div>
@endif
        
  <div class="h4 col-8 px-5">User Details</div>
    <div class="col px-4 mx-4">
  <a href="{{route('userinformations.create')}}" class="btn btn-primary ml-5">+</a>
</div>

</div>
<div class="card border-0 shadow-lg">
        <div class="card-body">
            <table class="table table-stripped">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email ID</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                @if($userinformations->isNotEmpty())
                @foreach ($userinformations as $userinformation)
                <tr>
                    <td>{{$userinformation->id}}</td>
                    <td>
                        @if($userinformation->profile_picture !='' && file_exists(public_path().'/uploads/users/'.$userinformation->profile_picture))
                        <img src="{{url('/uploads/users/'.$userinformation->profie_picture)}}"  height="50" width="50" class="rounded-circle">
                        @else
                        <img src="{{url('/assets/images/no-image.png')}}"  height="50" width="50" class="rounded-circle">
                        @endif
                    </td>
                    <td>{{$userinformation->name}}</td>
                    <td>{{$userinformation->fisrt_name}}</td>
                    <td>{{$userinformation->last_name}}</td>
                    <td>{{$userinformation->phone}}</td>
                    <td>{{$userinformation->email}}</td>
                    <td>{{$userinformation->gender}}</td>
                    <td>{{$userinformation->role}}</td>


                    <td>
                     <a href="{{route('userinformations.edit',$userinformation->id)}}" class="btn btn-success btn-sm">Edit</a>
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$userinformation->id}}">
                        Delete
                      </button>

                      <!-- Modal -->
<div class="modal fade" id="exampleModal{{$userinformation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h4>Do you really want to delete it</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="/userinformations/{{$userinformation->id}}" class="btn btn-primary">Yes Deleted </a>
        </div>
      </div>
    </div>
  </div>
</td>
</tr>  
@endforeach
@else
<td colspan="6">Record Not Found</td>
                @endif
            </table>
        </div>
    </div>
    
    <div>
        {{$users->links()}}
    </div>
</div>


@endsection

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
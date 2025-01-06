@extends ('admin.layout')

@section('title') Edit User @endsection

@section ('content')

<form class="ml-4" method="POST" action="{{route('users.update',$user->id)}}" >

    @csrf
    @method('put')
    <div class="mb-3">
      <label for="name" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="titlecourse" name="name" value="{{$user->name}}">
      
    </div>

      
   
    <button type="submit" class="btn btn-primary">Update</button>
  </form>

@endsection
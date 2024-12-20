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

      
      <div class="mb-3" >
        <label for="gender">Choose a gender:</label>
        <select name="gender" id="gender">
        <option value="male">male</option>
        <option value="female">female</option>
        </select>
       
      </div>


      <div class="mb-3">
        <label for="role">Choose a role:</label>
        <select name="role" id="role">
        <option value="student">student</option>
        <option value="instructor">instructor</option> 
        <option value="admin">admin</option> 
        </select>
       
      </div>
    
   
    <button type="submit" class="btn btn-primary">Update</button>
  </form>

@endsection
@extends('admin.layout');

@section('title') Edit Course @endsection

@section('content')
<form class="ml-4" method="POST" action="{{route('courses.update',$course->id)}}">

    @csrf
    @method('put')
    <div class="mb-3">
      <label for="titlecourse" class="form-label">Title Course</label>
      <input type="text" class="form-control" id="titlecourse" name="title" value="{{$course->title}}">
      
    </div>

    <div class="mb-3">
        <label for="titlecourse" class="form-label">Description Course</label>
        <input type="text" class="form-control" id="titlecourse" name="description" value="{{$course->description}}">
        
      </div>

      <div class="mb-3">
        <label for="titlecourse" class="form-label">Price Course</label>
        <input type="number" class="form-control" id="titlecourse" name="price" value="{{$course->price}}">
        
      </div>

    
   
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection
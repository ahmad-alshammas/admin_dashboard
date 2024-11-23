@extends('admin.layout');

@section('title') Edit Category @endsection

@section('content')
<form class="ml-4" method="POST" action="{{route('categories.update',$category)}}">

    @csrf
    @method('put')
    <div class="mb-3">
      <label for="titlecourse" class="form-label">Title Course</label>
      <input type="text" class="form-control" id="titlecourse" name="name" value="{{$category->name}}">
      
    </div>

    <div class="mb-3">
        <label for="titlecourse" class="form-label">Description Course</label>
        <input type="text" class="form-control" id="titlecourse" name="description" value="{{$category->description}}">
        
      </div>

    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection
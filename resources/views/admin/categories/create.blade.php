@extends ('admin.layout')

@section('title') Create Course Catygory @endsection

@section ('content')

<form class="ml-4" method="POST" action="{{route('categories.store')}}">

    @csrf
    <div class="mb-3">
      <label for="namecategory" class="form-label">Name Category</label>
      <input type="text" class="form-control" id="namecategory" name="name" required>
      
    </div>

    <div class="mb-3">
        <label for="descriptioncategory" class="form-label">Description Category</label>
        <input type="text" class="form-control" id="descriptioncategory" name="description" required>
      </div>
     
    <button type="submit" class="btn btn-primary mt-4">Add</button>
  </form>

@endsection
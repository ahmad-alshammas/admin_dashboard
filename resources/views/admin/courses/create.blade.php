@extends ('admin.layout')

@section('title') Create Course @endsection

@section ('content')

<form class="ml-4" method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">

    @csrf
    <div class="mb-3">
      <label for="titlecourse" class="form-label">Title Course</label>
      <input type="text" class="form-control" id="titlecourse" name="title" required>
      
    </div>

    <div class="mb-3">
        <label for="descriptioncourse" class="form-label">Description Course</label>
        <input type="text" class="form-control" id="descriptioncourse" name="description" required>
      </div>

      <div class="mb-3">
        <label for="pricecourse" class="form-label">Price Course</label>
        <input type="number" class="form-control" id="pricecourse" name="price" required>
      </div>

      <div class="mb-3">
        <label for="imagecourse" class="form-label">Upload File Image</label>
        <input type="file" class="form-control" id="imagecourse" name="image" required>
      </div>

      <div class="mb-3">
        <label for="instructor">Instructor</label>
        <select name="instructor_id" id="instructor" class="form-control">
            <option value="" disabled selected>Select an Instructor</option>
            @foreach ($instructors as $instructor)
                <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
            @endforeach
        </select>
     
        <div class="mb-3 mt-2">
          <label for="category_id" class="form-label">Category</label>
          <select name="category_id" id="category_id" class="form-control">
              <option value="" selected disabled>Select a Category</option>
              @foreach($categories as $category)
                  <option value="{{ $category->category_id }}">{{ $category->name }}</option>
              @endforeach
          </select>
          @error('category_id')
              <small class="text-danger">{{ $message }}</small>
          @enderror
      </div>

    <button type="submit" class="btn btn-primary mt-4">Add</button>
  </form>

@endsection
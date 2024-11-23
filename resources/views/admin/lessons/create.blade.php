@extends('admin.layout');

@section ('title') Create Lesson @endsection

@section ('content')

<div class="ml-4">
    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="section_id" class="form-label">Section</label>
            <select name="section_id" id="section_id" class="form-control">
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content_url" class="form-label">Content URL</label>
            <input type="text" name="content_url" id="content_url" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" id="order" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Lesson</button>
    </form>
</div>




@endsection
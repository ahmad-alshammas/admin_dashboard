@extends('admin.layout');

@section ('title') Courses @endsection

@section ('content')

<div class="card shadow mb-4">

{{--     
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">

            <a href="{{ route('lessons.create') }}" class="btn btn-primary mb-3">Add Lesson</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Section</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->id }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->section->title }}</td>
                        <td>{{ $lesson->order }}</td>
                        <td>
                            <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-info">Edit</a>
                            <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
        </div>
    </div>
</div>


@endsection
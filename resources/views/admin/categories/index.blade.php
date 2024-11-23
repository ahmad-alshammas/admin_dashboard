@extends('admin.layout');

@section ('title') Courses @endsection

@section ('content')

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

            <a href="{{route('categories.create')}}"><button type="button" class="btn btn-primary ml-4 mb-4 text-end">Add New Category</button></a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($categoires as $categoy)
                <tr>
                    <td>{{$categoy->category_id}}</td>
                    <td>{{$categoy->name}}</td>
                    <td>{{$categoy->description}}</td>
                    <td>
                        <a href="{{route('categories.edit', $categoy->category_id)}}"><button type="button" class="btn btn-info">Edit</button></a>
                        
                        <form id="delete-form-{{ $categoy->category_id }}" action="{{route('categories.destroy', $categoy->category_id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $categoy->category_id }})">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach       
                </tbody>   
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(categoryId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${categoryId}`).submit();
            }
        });
    }
</script>

@endsection

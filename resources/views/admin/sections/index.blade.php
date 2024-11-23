@extends('admin.layout');

@section ('title') Sections @endsection

@section ('content')

<div class="card shadow mb-4">

{{--     
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">

            <a href="{{route('sections.create')}}"><button type="button" class="btn btn-primary ml-4 mb-4 text-end">Add New Section</button></a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>order</th>
                        <th>Total</th>
                        <th>course</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->id }}</td>
                    <td>{{ $section->title }}</td>
                    <td>{{ $section->order }}</td>
                    <td>{{ $section->total }}</td>
                    <td>{{ optional($section->course)->title }}</td>
                    <td>
                        <a href="{{route('sections.edit', $section->id)}}"><button type="button" class="btn btn-info">Edit</button></a>
                        
                        <form id="delete-form-{{ $section->id }}" action="{{ route('sections.destroy', $section->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $section->id }})">
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
    function confirmDelete(sectionId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${sectionId}`).submit();
            }
        });
    }
</script>

@endsection
@extends('admin.layout');

@section('title') users @endsection

@section('content')


<div class="card shadow mb-4">

    
   
    <div class="card-body">
        <div class="table-responsive">

           <a href="{{route('users.create')}}"><button type="button" class="btn btn-primary ml-4 mb-4 text-end">Add New User</button></a> 
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>role</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->role}}</td>
                    
                    <td>
                       <a href="{{route('users.edit', $user->id)}}"> <button type="button" class="btn btn-info">Edit</button></a>
                       <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $user->id }})">
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
    function confirmDelete(userId) {
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
                document.getElementById(`delete-form-${userId}`).submit();
            }
        });
    }
</script>

@endsection












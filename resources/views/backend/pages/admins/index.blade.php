@extends('backend.layouts.master')
@section('content')
<div class="card card-preview">
    <div class="card-inner">
        <a href="{{ route('admin.admins.create') }}" class="btn btn-dim btn-info mr-auto mb-2">Create User</a>
        <table class="datatable-init table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Created Time</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{ $user->email }}</td>
                        <td>Role</td>
                        <td>Permissions</td>
                        <td>{{ date('F d, Y', strtotime($user->created_at)) }}</td>
                        <td>
                            <a href="{{route('admin.admins.edit',$user->id)}}" class="btn btn-dim btn-primary">Edit</a>
                            <a  onclick="deleteAdmin({{ $user->id }})" href="javascript:;" class="btn btn-dim btn-danger">Delete</a>
                            <form action="{{route('admin.admins.destroy',$user->id)}}" method="post"
                                style="display: none" id="delete-form-{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div><!-- .card-preview -->
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    function deleteAdmin(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-dim btn-success',
                    cancelButton: 'btn btm-dim btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'This role data is safe :)',
                        'error'
                    )
                }
            })
        }
</script>
@endpush
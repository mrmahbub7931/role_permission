@extends('backend.layouts.master')
@section('content')
<div class="card card-preview">
    <div class="card-inner">
        <a href="{{ route('admin.roles.create') }}" class="btn btn-dim btn-info mr-auto mb-2">Create Role</a>
        <table class="datatable-init table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard Name</th>
                    <th>Created Time</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    
                    <tr>
                        <td>{{$key + 1}}</td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>
                            <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-dim btn-primary">Edit</a>
                            <a  onclick="deleteRole({{ $role->id }})" href="{{route('admin.roles.delete',$role->id)}}" class="btn btn-dim btn-danger">Delete</a>
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
    function deleteRole(id) {
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
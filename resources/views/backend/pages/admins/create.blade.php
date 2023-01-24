@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-xl mx-auto">
                    <nav>
                        <ul class="breadcrumb breadcrumb-arrow">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ul>
                    </nav>
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">User managements</h5>
                            </div>
                            <form action="{{ route('admin.admins.store') }}" method="POST" class="gy-3">
                                @csrf
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="name">User name</label>
                                            <span class="form-note">Give your name here</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="name" name="name" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <span class="form-note">Specify permissions for this role</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input data-role="tagsinput" type="text" class="form-control" id="permissions" name="permissions">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <span class="form-note">Put a unique password</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label">Select Role</label>
                                            <span class="form-note">Select A role for this user</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <div class="form-control-select">
                                                    <select class="form-control" id="role" name="role">
                                                        <option value="">Select Role</option>
                                                        @foreach ($roles as $role)
                                                            <option data-role-id="{{ $role->id }}" data-role-slug="{{ $role->slug }}" value="{{$role->id}}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="permission_box">
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label">Select Permissions</label>
                                                <span class="form-note">Choose permissions for this user.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="custom-control custom-checkbox permissions_list">
                                                        {{-- <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Option Label</label> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-7 offset-lg-5">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-dim btn-primary">Create User</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- card -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        (function($){
            $(document).ready(function() {
                var permission_box = $('.permission_box');
                permission_box.hide();

                $('#role').on('change', function(){
                    let that = $(this);
                    let role_id = that.find(':selected').data('role-id'),
                        role_slug = that.find(':selected').data('role-slug');
                    $.ajax({
                        type: 'GET'
                    });
                });
            });
    })(jQuery)
    </script>
@endpush
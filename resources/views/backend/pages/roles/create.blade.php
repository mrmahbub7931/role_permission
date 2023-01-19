@extends('backend.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap-tagsinput.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-xl mx-auto">
                    <nav>
                        <ul class="breadcrumb breadcrumb-arrow">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Role</li>
                        </ul>
                    </nav>
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="card-head">
                                <h5 class="card-title">Website Setting</h5>
                            </div>
                            <form action="{{ route('admin.roles.store') }}" method="POST" class="gy-3">
                                @csrf
                                <div class="row g-3 align-center">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label class="form-label" for="site-name">Role Name</label>
                                            <span class="form-note">Give a role name for your author user.</span>
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
                                            <label class="form-label">Permission</label>
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
                                <div class="row g-3">
                                    <div class="col-lg-7 offset-lg-5">
                                        <div class="form-group mt-2">
                                            <button type="submit" class="btn btn-dim btn-primary">Save Role</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- card -->
                    {{-- <div class="card card-preview">
                        <div class="card-inner">
                            <div class="preview-block">
                                <form action="{{ route('admin.roles.create') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label" for="default-01">Role name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="ex: Super Admin">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-5">
                                            <button type="submit" class="btn btn-dim btn-primary">Save Role</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('backend/assets/js/bootstrap-tagsinput.js') }}"></script>
@endpush
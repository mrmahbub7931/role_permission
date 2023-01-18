@extends('backend.layouts.master')
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

                    <div class="card card-preview">
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
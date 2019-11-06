@extends('multiauth::layouts.app') 
@section('content')
@section('title')
    Edit Role
@endsection
<div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Role</li>
          </ol>
          <h6 class="slim-pagetitle">Edit Role</h6>
        </div><!-- slim-pageheader -->
        @include('multiauth::message')

        <div class="section-wrapper">
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-info text-white">Edit this Role</div>
                    
                                    <div class="card-body">
                                        <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                                            @csrf @method('patch')
                                            <div class="form-group">
                                                <label for="role">Role Name</label>
                                                <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="role">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Change</button>
                                            <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div><!-- section-wrapper -->

    </div>
@endsection


  
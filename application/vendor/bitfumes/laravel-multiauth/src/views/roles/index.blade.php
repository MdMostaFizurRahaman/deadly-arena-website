@extends('multiauth::layouts.app') 
@section('title')
    Role
@endsection
@section('content')

    <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Role</li>
          </ol>
          <h6 class="slim-pagetitle">Role List</h6>
        </div><!-- slim-pageheader -->
        @include('multiauth::message')

        <div class="section-wrapper">
                <div class="card-header text-white">
                    <span class="h5" style="text-transform:uppercase;">All Role List</span> 
                    <span class="float-right">
                        <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus fa-fw"></i>  New Role</a>
                    </span>
                </div>
                <div class="card-body">
                            <ol class="list-group">
                                @foreach ($roles as $role)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ Str::title($role->name) }}
                                    <span class="badge badge-primary badge-pill">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}</span>
                                    <div class="float-right">
                                        <a href="" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                        <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                            @csrf @method('delete')
                                        </form>
        
                                        <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary mr-3">Edit</a>
                                    </div>
                                </li>
                                @endforeach
                            </ol>
                        </div>
        </div><!-- section-wrapper -->

    </div>

@endsection

{{-- 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        Roles
                        <span class="float-right">
                            <a href="{{ route('admin.role.create') }}" class="btn btn-sm btn-success">New Role</a>
                        </span>
                    </div>
    
                    <div class="card-body">
                    @include('multiauth::message')
                        <ol class="list-group">
                            @foreach ($roles as $role)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $role->name }}
                                <span class="badge badge-primary badge-pill">{{ $role->admins->count() }} {{ ucfirst(config('multiauth.prefix')) }}</span>
                                <div class="float-right">
                                    <a href="" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                    <form id="delete-form-{{ $role->id }}" action="{{ route('admin.role.delete',$role->id) }}" method="POST" style="display: none;">
                                        @csrf @method('delete')
                                    </form>
    
                                    <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-primary mr-3">Edit</a>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@extends('multiauth::layouts.app') 
@section('title')
    Admin List
@endsection

@section('content')
    <div class="container">
        <div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
          </ol>
          <h6 class="slim-pagetitle">Admin List</h6>
        </div><!-- slim-pageheader -->
        @include('multiauth::message')

        <div class="section-wrapper">
                <div class="card-header text-white">
                    <span class="h5" style="text-transform:uppercase;">All Admin List</span> 
                    <span class="float-right">
                        <a href="{{ route('admin.register') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus fa-fw"></i>  New Admin</a>
                    </span>
                </div>
                <table class="table mg-b-0 tx-13">
                    <thead>
                        <tr class="tx-10">
                        <th class="wd-10p pd-y-5">Image</th>
                        <th class="pd-y-5">Name</th>
                        <th class="pd-y-5 tx-center">Role</th>
                        <th class="pd-y-5">Email</th>
                        <th class="pd-y-5">Edit</th>
                        <th class="pd-y-5 tx-right"> <span class="mr-3">Delete</span></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($admins as $admin)
                            <tr>
                                <td class="pd-l-20">
                                    <img src="{{asset('application/public')}}/{{$admin->image}}" class="wd-55" alt="Image">
                                </td>
                                <td class="valign-middle">
                                    <a href="" class="tx-white tx-14 tx-medium d-block">{{$admin->name}}</a>
                                    <span class="tx-11 d-block"><span class="square-8 {{ $admin->active? 'bg-success' : 'bg-danger' }} mg-r-5 rounded-circle"></span> {{ $admin->active? 'Active' : 'Inactive' }}</span>
                                </td>
                                <td class="valign-middle tx-14 tx-center">
                                        <span class="badge">
                                                @foreach ($admin->roles as $role)
                                                    <span class="badge-primary badge-pill ml-2">
                                                        {{ Str::title($role->name) }}
                                                    </span> @endforeach
                                        </span>
                                </td>
                                <td class="valign-middle">{{$admin->email}}</td>
                                <td class="valign-middle">
                                    
                                        <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-primary"><i class="fa fa-edit fa-fw"></i> Edit</a>
                                </td>
                                <td class="valign-middle tx-right">
                                        <a href="#" class="btn btn-danger " onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                                            @csrf @method('delete')
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          {{-- <ul class="list-group">
                @foreach ($admins as $admin)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $admin->name }}
                    <span class="badge">
                            @foreach ($admin->roles as $role)
                                <span class="badge-primary badge-pill ml-2">
                                    {{ Str::title($role->name) }}
                                </span> @endforeach
                    </span>
                    {{ $admin->active? 'Active' : 'Inactive' }}
                    <div class="float-right">
                        <a href="#" class="btn btn-sm btn-secondary mr-3" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">Delete</a>
                        <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.delete',[$admin->id]) }}" method="POST" style="display: none;">
                            @csrf @method('delete')
                        </form>
        
                        <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3">Edit</a>
                    </div>
                </li>
                @endforeach @if($admins->count()==0)
                {{-- <p>No {{ config('multiauth.prefix') }} created Yet, only super {{ config('multiauth.prefix') }} is available.</p> --}}
                {{-- @endif
            </ul>  --}}
        </div><!-- section-wrapper -->

    </div>
@endsection

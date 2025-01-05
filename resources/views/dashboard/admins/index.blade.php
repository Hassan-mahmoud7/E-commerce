@extends('layouts.dashboard.app')
@section('title',  __('dashboard.admins'))
@section('content')
    <!-- Bordered striped start -->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.dashboard') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.welcome') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="#">{{ __('dashboard.admins') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
               @include('dashboard.includes.button-header')
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>{{ __('dashboard.admins') }}</b></h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <a href="{{ route('dashboard.admins.create') }}" class="btn btn-success px-2 round btn-glow"> <i class="ft-edit"></i> {{ __('dashboard.create_admin') }}</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('dashboard.admin_name') }}</th>
                                            <th scope="col">{{ __('dashboard.email') }}</th>
                                            <th scope="col">{{ __('dashboard.admin_status') }}</th>
                                            <th scope="col">{{ __('dashboard.role') }}</th>
                                            <th scope="col">{{ __('dashboard.created') }}</th>
                                            <th scope="col">{{ __('dashboard.operations') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($admins as $admin)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td class="text-{{ $admin->status == 1 ? 'success' : 'danger' }}">{{ $admin->status == 1 ? __('dashboard.active') : __('dashboard.not_active') }}</td>
                                            <td>{{ $admin->role->role }}</td>
                                            <td>{{ $admin->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <div class="content-header-right  col-md-6 col-12">
                                                    <div class="dropdown float-md-right m-auto">
                                                        <button
                                                        class="btn btn-info dropdown-toggle round btn-glow "
                                                        id="dropdownBreadcrumbButton" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">{{ __('dashboard.operations') }}</button>
                                                        <div class="dropdown-menu"
                                                        aria-labelledby="dropdownBreadcrumbButton">
                                                        {{-- edit --}}
                                                        <a class="dropdown-item text-info" href="{{ route('dashboard.admins.edit' , $admin->id) }}"><i class="ft-edit-3"> {{ __('dashboard.edit') }}</i> </a>
                                                        {{-- status --}}
                                                        <a class="dropdown-item {{ $admin->status == 0 ? 'text-success' : 'text-darck' }}" href="{{ route('dashboard.admins.status' , $admin->id) }}">
                                                            <i class="{{ $admin->status == 0 ? 'la la-toggle-on' : 'la la-toggle-off' }}"></i> {{ $admin->status == 0 ? __('dashboard.active') : __('dashboard.not_active') }}</a>
                                                        {{-- Delete --}}
                                                            <button class="dropdown-item text-danger" data-toggle="modal" data-target="#Delete-{{ $admin->id }}">
                                                                    <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   @include('dashboard.admins._delete-model')
                                             </td>
                                        </tr>              
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-info">{{ __('dashboard.no_data') }}</td>                   
                                        </tr>                     
                                        @endforelse
                                    </tbody>
                                </table>   
                                     <div class="col-12 float-md-right p-3">                           
                                          {{ $admins->links() }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bordered striped end -->
@endsection

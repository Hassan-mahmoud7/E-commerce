@extends('layouts.dashboard.app')
@section('title', 'Roles')
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
                                        href="#">{{ __('dashboard.role') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">
                        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
                            type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item"
                                href="#"><i class="la la-calendar-check-o"></i> Calender</a>
                            <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
                            <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i
                                    class="la la-cog"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>{{ __('dashboard.role') }}</b></h4>
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
                                <a href="{{ route('dashboard.roles.create') }}" class="btn btn-success px-2 round btn-glow"> <i class="ft-edit"></i> {{ __('dashboard.create_role') }}</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('dashboard.role_name') }}</th>
                                            <th scope="col">{{ __('dashboard.permissions') }}</th>
                                            <th scope="col">{{ __('dashboard.operations') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $role)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $role->role }}</td>
                                            <td>
                                                
                                                @if (config('app.locale') == 'ar')
                                                    @foreach (Config::get('permissions_ar') as $permissions_ar => $value)
                                                        @foreach ($role->permission as $permission)
                                                          @if ($permission == $permissions_ar)
                                                                 {{ $value .' , ' }}  
                                                          @endif
                                                        @endforeach
                                                    @endforeach 
                                                @else
                                                    @foreach ($role->permission as $permission)
                                                        {{ $permission .' , ' }} 
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="content-header-right m-auto col-md-6 col-12">
                                                    <div class="dropdown float-md-right ">
                                                        <button
                                                        class="btn btn-info dropdown-toggle round btn-glow "
                                                        id="dropdownBreadcrumbButton" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">{{ __('dashboard.operations') }}</button>
                                                        <div class="dropdown-menu"
                                                        aria-labelledby="dropdownBreadcrumbButton">
                                                        <a class="dropdown-item text-info" href="{{ route('dashboard.roles.edit' , $role->id) }}"><i
                                                            class="ft-edit-3"> {{ __('dashboard.edit') }}</i> </a>
                                                                <button class="dropdown-item text-danger" data-toggle="modal" data-target="#Delete-{{ $role->id }}">
                                                                    <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                   @include('dashboard.roles.delete-model')
                                             </td>
                                        </tr>              
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-info">No Data</td>                   
                                        </tr>                     
                                        @endforelse
                                    </tbody>
                                </table>   
                                     <div class="col-12 float-md-right p-3">                           
                                          {{ $roles->links() }}
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

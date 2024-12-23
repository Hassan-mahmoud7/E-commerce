    @extends('layouts.dashboard.app')
    @section('title', __('dashboard.cities'))
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
                                            href="#">{{ __('dashboard.city') }}</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    @include('dashboard.includes.button-header')
                </div>
                {{-- <section id="configuration"> --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><b>{{ __('dashboard.cities') }}</b></h4>
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
                                {{-- <div class="card-body">
                                    <a href="{{ route('dashboard.citys.create') }}" class="btn btn-success px-2 round btn-glow"> <i class="ft-edit"></i> {{ __('dashboard.create_city') }}</a>
                                </div> --}}
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        @include('dashboard.includes.tostar-success')
                                        @include('dashboard.includes.tostar-error')
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ __('dashboard.city_name') }}</th>
                                                <th scope="col">{{ __('dashboard.governorate_name') }}</th>
                                                <th scope="col">{{ __('dashboard.count_of_users') }}</th>
                                                <th scope="col">{{ __('dashboard.city_status') }}</th>
                                                <th scope="col">{{ __('dashboard.manage_status') }}</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($cities as $city)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $city->name }}</td>
                                                <td><div class="badge badge-pill badge-border border-info text-dark ">{{ $city->governorate->name }}</div></td>
                                                <td><div class="badge badge-pill badge-border border-primary primary">{{ $city->users_count }}</div></td>
                                                <td ><div id="status_{{ $city->id }}" class="badge badge-pill badge-border border-{{ $city->status == 1 ? 'success success' : 'danger danger' }}"> {{ $city->status == 1 ? __('dashboard.active') : __('dashboard.not_active') }}</div></td>
                                                <td>   
                                                {{-- status --}}
                                                <input type="checkbox" id="switcherySize2" class="switchery-sm change_status" 
                                                city-id={{ $city->id }}
                                                @if ($city->status == 1 ) checked @endif
                                                />                                                             
                                                </td>
                                            </tr>             
                                            @empty
                                            <tr>
                                                <td colspan="5" class="text-info">No Data</td>                   
                                            </tr>                     
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.city_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.governorate_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.count_of_users') }}</th>
                                                    <th scope="col">{{ __('dashboard.city_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.manage_status') }}</th>
    
                                                </tr>
                                        </tfoot> 
                                    </table>  
                                        <div class="col-12 float-md-right p-3">                           
                                            {{-- {{ $city->links() }} --}}
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </section> --}}
            </div>
        </div>
        
        <!-- Bordered striped end -->
    @endsection
    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/dashboard') }}/vendors/css/tables/datatable/datatables.min.css">
    @endpush
        @push('js')
        <script src="{{ asset('assets/dashboard/') }}/js/scripts/tables/components/table-components.js" type="text/javascript"></script>
        <script src="{{ asset('assets/dashboard/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/dashboard/js/scripts/tables/datatables/datatable-basic.js') }}" type="text/javascript"></script>
            <script>
                $(document).on('change' , '.change_status' , function () {
                    var id = $(this).attr('city-id');
                    var url = "{{ route('dashboard.cities.status',':id') }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function (response) {
                            
                            if (response.status == 'success') {
                                $('.tostar_success').text(response.message);
                                $('.tostar_success').removeAttr('hidden');
                                $('.tostar_success').show();
                                //change status
                                $('#status_' + response.data.id).empty();
                                $('#status_' + response.data.id).text("{{  __('dashboard.active') }}");
                                $('#status_' + response.data.id).removeClass('border-danger danger').addClass('border-success success')
                                
                                setTimeout(function () {
                                    $('.tostar_success').fadeOut(function () {
                                        $(this).attr('hidden', 'hidden').text('');
                                    });
                                }, 3000);
                            }if (response.status == 'success_not_active') {

                                $('.tostar_success').text(response.message);
                                $('.tostar_success').removeAttr('hidden');
                                $('.tostar_success').show();
                                //change status
                                $('#status_' + response.data.id).empty();
                                $('#status_' + response.data.id).text("{{  __('dashboard.not_active') }}");
                                $('#status_' + response.data.id).removeClass('border-success success').addClass('border-danger danger')
                                    
                            }else{
                                $('#tostar_error').removeAttr('hidden');
                                $('#tostar_error').show();
                                $('#tostar_error').text(data.message);
                            }
                            setTimeout(function () {
                                $('.tostar_success').fadeOut(function () {
                                        $(this).attr('hidden', 'hidden').text('');
                                    });
                            }, 3000);
                        }
                        
                    });
                });
            </script>
        
        @endpush
@extends('layouts.dashboard.app')
@section('title', __('dashboard.governorates'))
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
                                        href="#">{{ __('dashboard.governorates') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                @include('dashboard.includes.button-header')
            </div>
            <section id="configuration">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>{{ __('dashboard.governorates') }}</b></h4>
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
                                <a href="{{ route('dashboard.governorates.create') }}" class="btn btn-success px-2 round btn-glow"> <i class="ft-edit"></i> {{ __('dashboard.create_governorate') }}</a>
                            </div> --}}
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    @include('dashboard.includes.tostar-success')
                                    @include('dashboard.includes.tostar-error')
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('dashboard.governorate_name') }}</th>
                                            <th scope="col">{{ __('dashboard.country') }}</th>
                                            <th scope="col">{{ __('dashboard.governorate_count_cities') }}</th>
                                            <th scope="col">{{ __('dashboard.count_of_users') }}</th>
                                            <th scope="col">{{ __('dashboard.governorate_status') }}</th>
                                            <th scope="col">{{ __('dashboard.manage_status') }}</th>
                                            <th scope="col">{{ __('dashboard.shipping_price') }}</th>
                                            <th scope="col">{{ __('dashboard.price_change') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($governorates as $governorate)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td><a class="" href="{{ route('dashboard.cities.by.governorate', $governorate->id) }}">{{ $governorate->name }} <i class="flag-icon flag-icon-{{ $governorate->flag_code }}"></i></a></td>
                                                    <td>{{ $governorate->country->name }} <i class="flag-icon flag-icon-{{ $governorate->country->flag_code }}"></i></td>
                                                    <td><div class="badge badge-pill badge-border border-purple purple">{{ $governorate->cities_count }}</div></td>
                                                    <td><div class="badge badge-pill badge-border border-success success">{{ $governorate->users_count }}</div></td>
                                                    <td ><div id="status_{{ $governorate->id }}" class="badge badge-pill badge-border border-{{ $governorate->status == 1 ? 'success success' : 'danger danger' }}"> {{ $governorate->status == 1 ? __('dashboard.active') : __('dashboard.not_active') }}</div></td>
                                                    <td>   
                                                    {{-- status --}}
                                                    <input type="checkbox" id="switcherySize2" class="switchery-sm change_status" 
                                                    governorate-id={{ $governorate->id }}
                                                    @if ($governorate->status == 1 ) checked @endif/>                                                             
                                                    </td>
                                                    <td><div id="price_{{ $governorate->id }}" class="badge badge-pill badge-border border-primary primary">{{ $governorate->shippingPrice->price }}</div></td>
                                                    <td> <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#change_price_{{ $governorate->id }}">
                                                        <i class="ft-edit"></i> {{ __('dashboard.price_change') }}</button>
                                                        @include('dashboard.world.change-price')
                                                    </td>
                                                </tr>             
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-info">No Data</td>                   
                                                </tr>                     
                                            @endforelse
                                        </tbody>
                                    </table>   
                                    <div class="col-12 float-md-right p-3">                           
                                        {{-- {{ $governorate->links() }} --}}
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
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
    {{-- Change Price --}}
    <script>
        $(document).on('submit','.update_shipping_price', function (e) {
            e.preventDefault();

            var data = new FormData($(this)[0]);
            var gover_id = $(this).attr('gover-id');

            $.ajax({
                url: "{{ route('dashboard.governorates.shipping.price') }}",
                type: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == 'success') {
                        $('.tostar_success').removeAttr('hidden');
                        $('.tostar_success').text(response.message).show();
                        $('#change_price_'+gover_id).removeClass('show').css('display', 'none').attr('aria-hidden', 'true');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $('#price_' + response.data.id).empty();
                        $('#price_' + response.data.id).text(response.data.shipping_price.price);
                                                
                        setTimeout(function () {
                            $('.tostar_success').fadeOut(function () {
                                $(this).attr('hidden', 'hidden').text('');
                            });
                        }, 3000);
                        $(this).attr('modal', 'hide'); 
                    };
                },
                error: function(data){
                    var response = $.parseJSON(data.responseText);
                    $('#errors_' + gover_id).text(response.errors.price).show();
                },
            });
        });
    </script>
    {{-- Change Status --}}
        <script>
            $(document).on('change' , '.change_status' , function () {
                var id = $(this).attr('governorate-id');
                var url = "{{ route('dashboard.governorates.status',':id') }}";
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
@extends('layouts.dashboard.app')
@section('title', __('dashboard.coupons'))
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
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.coupon') }}</a>
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
                                <h4 class="card-title"><b>{{ __('dashboard.coupons') }}</b></h4>
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
                                    <button class="btn btn-success px-2 round btn-glow" data-toggle="modal"
                                        data-target="#bootstrap"> <i class="ft-edit"></i>
                                        {{ __('dashboard.create_coupon') }}</button>

                                    @include('dashboard.coupons._create')
                                    @include('dashboard.coupons._edit')

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        @include('dashboard.includes.tostar-success')
                                        @include('dashboard.includes.tostar-error')
                                        <table id="yajra_table"
                                            class="table table-striped language-file table-bordered column-rendering dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.coupon_code') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_discount_percentage') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_start_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_end_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_limit') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_time_used') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.coupon_code') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_discount_percentage') }}
                                                    </th>
                                                    <th scope="col">{{ __('dashboard.coupon_start_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_end_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_limit') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_time_used') }}</th>
                                                    <th scope="col">{{ __('dashboard.coupon_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="col-12 float-md-right p-3">
                                            {{-- {{ $coupon->links() }} --}}
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
@endpush


@push('js')
    {{-- js DataTable  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        var table = $('#yajra_table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            fixedColumns: true,
            colReorder: true,
            // scrollCollapse: true,
            // scroller: true,
            // scrollY: 500,
            rowReorder: {
                update:false,
                selector:'td:not(:first-child)',
            },
            // select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for {{ __('dashboard.coupon') }}:' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.coupons.all') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'code',
                    name: 'code',
                },
                {
                    data: 'discount_percentage',
                    name: 'Discount Percentage',
                },
                {
                    data: 'start_date',
                    name: 'Start Date',
                },
                {
                    data: 'end_date',
                    name: 'End Date',
                },
                {
                    data: 'limit',
                    name: 'Limit',
                },
                {
                    data: 'time_used',
                    name: 'Time Used',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'created_at',
                    name: 'created',
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                    orderable: false,
                },
            ],
            layout: {
                topStart: {
                    buttons: ['colvis', 'copy', 'print', 'excel', 'pdf']
                }
            },
            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
            } : {},
        });
        // disable the row order when cliking
        $('table').on('mousedown' , 'button',function (e) { 
            table.rowReorder.disable();
         });
         // enable the row order when mouseup
         $('table').on('mouseup', 'button', function (e) { 
            table.rowReorder.enable();
         });
        // create coupon using Ajax
        $('#create_coupon').on('submit', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            $.ajax({
                url: "{{ route('dashboard.coupons.store') }}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        $('#create_coupon')[0].reset();
                        $('#yajra_table').DataTable().page(currentPage).draw(false);
                        $('#bootstrap').removeClass('show').css('display', 'none').attr('aria-hidden',
                            'true');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function(data) {
                    if (data.responseJSON.errors) {
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list').append('<li>' + value[0] + '</li>');
                            $('#error_div').show();
                        });
                    }
                },
            });
        });

        // edit coupon using Ajax
        $(document).on('click', '.edit_coupon', function(e) {
            e.preventDefault();

            $('#coupon_id').val($(this).attr('coupon_id'));
            $('#coupon_code').val($(this).attr('coupon_code'));
            $('#coupon_discount').val($(this).attr('coupon_discount'));
            $('#coupon_limit').val($(this).attr('coupon_limit'));
            $('#coupon_start_date').val($(this).attr('coupon_start_date'));
            $('#coupon_end_date').val($(this).attr('coupon_end_date'));

            if ($(this).attr('coupon_status') == 1) {
                $('#coupon_active').prop('checked', true);
            } else {
                $('#coupon_not_active').prop('checked', true);
            }

            $('#edit_bootstrap').modal('show');
        });
        // update coupon using Ajax
        $('#update_coupon').on('submit', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            var edit_coupon_id = $('#coupon_id').val();
            $.ajax({
                url: "{{ route('dashboard.coupons.update', 'id') }}".replace('id', edit_coupon_id),
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        $('#yajra_table').DataTable().page(currentPage).draw(false);
                        $('#edit_bootstrap').removeClass('show').css('display', 'none').attr('aria-hidden', 'true');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function(data) {
                    if (data.responseJSON.errors) {
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list_edit').append('<li>' + value[0] + '</li>');
                            $('#error_div_edit').show();
                        });
                    }
                },
            });
        });
        // delete coupon using Ajax
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var title = "{{ __('dashboard.delete_msg') }}";
            var text = "{{ __('dashboard.alert_delete_text') }}";
            var btnDelete = "{{ __('dashboard.delete_text') }}";
            var btnCancel = "{{ __('dashboard.cancel_text') }}";
            var Delete = "{{ __('dashboard.delete') }}";
            var Delete_success = "{{ __('dashboard.delete_success') }}";
            var delete_coupon_id = $(this).attr('coupon_id');
            Swal.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: btnDelete,
                cancelButtonText: btnCancel,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('dashboard.coupons.destroy', 'id') }}".replace('id', delete_coupon_id),
                        method: "DELETE",
                        data:{
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: Delete,
                                    text: Delete_success,
                                    icon: "success"
                                });
                                $('#yajra_table').DataTable().ajax.reload();
                            }else{
                                Swal.fire({
                                    title: response.title,
                                    text: response.message,
                                    icon: "error"
                                });
                            }
                        },

                    });

                }
            });
        });
    </script>
@endpush

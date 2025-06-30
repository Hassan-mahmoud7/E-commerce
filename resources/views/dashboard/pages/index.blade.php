@extends('layouts.dashboard.app')
@section('title', __('dashboard.pages'))
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
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.page') }}</a>
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
                                <h4 class="card-title"><b>{{ __('dashboard.pages') }}</b></h4>
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
                                    <a href="{{ route('dashboard.pages.create') }}" class="btn btn-success px-2 round btn-glow"> <i class="ft-edit"></i>
                                        {{ __('dashboard.create_page') }}</a>



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
                                                    <th scope="col">{{ __('dashboard.page_title') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_image') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_content') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_created_at') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.page_title') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_image') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_content') }}</th>
                                                    <th scope="col">{{ __('dashboard.page_created_at') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="col-12 float-md-right p-3">
                                            {{-- {{ $page->links() }} --}}
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
    {{-- file input  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {
            $('#singleImage').fileinput({
                theme: 'fa5',
                language: lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload: false,
                showUpload: false,
            });
        });
    </script>
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
                update: false,
                selector: 'td:not(:first-child):not(:nth-child(4))',
            },
            // select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for {{ __('dashboard.page') }}:' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.pages.all') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'title',
                    name: 'title',
                },
                {
                    data: 'image',
                    name: 'image',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'content',
                    name: 'content',
                },
                {
                    data: 'created_at',
                    name: 'created',
                },
                {
                    data: 'action',
                    searchable: false,
                    orderable: false,
                },
            ],
            layout: {
                topStart: {
                    buttons: ['colvis', 'copy']
                }
            },
            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
            } : {},
        });
        // disable the row order when cliking
        $('table').on('mousedown', 'button', function(e) {
            table.rowReorder.disable();
        });
        // enable the row order when mouseup
        $('table').on('mouseup', 'button', function(e) {
            table.rowReorder.enable();
        });
        // change status using Ajax
        $(document).on('click', '.change_status', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            var id = $(this).attr('page-id');
            var url = "{{ route('dashboard.pages.status', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {

                    if (response.status == 'success') {
                        $('#yajra_table').DataTable().page(currentPage).draw(false);
                        //change status
                        $('#status_' + response.data.id).empty();
                        $('#status_' + response.data.id).text("{{ __('dashboard.active') }}");
                        $('#status_' + response.data.id).removeClass('btn-outline-success').addClass(
                            'btn-outline-black');
                        $('#icon_' + response.data.id).removeClass('la la-toggle-on').addClass(
                            'la la-toggle-off');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                    if (response.status == 'success_not_active') {
                        $('#yajra_table').DataTable().page(currentPage).draw(false);
                        //change status
                        $('#status_' + response.data.id).empty();
                        $('#status_' + response.data.id).text("{{ __('dashboard.not_active') }}");
                        $('#status_' + response.data.id).removeClass('btn-outline-black').addClass(
                            'btn-outline-success')
                        $('#icon_' + response.data.id).removeClass('la la-toggle-off').addClass(
                            'la la-toggle-on');
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }

            });
        });

        // // // delete page using Ajax
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            var title = "{{ __('dashboard.delete_msg') }}";
            var text = "{{ __('dashboard.alert_delete_text') }}";
            var btnDelete = "{{ __('dashboard.delete_text') }}";
            var btnCancel = "{{ __('dashboard.cancel_text') }}";
            var Delete = "{{ __('dashboard.delete') }}";
            var delete_page_id = $(this).attr('page_id');
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
                        url: "{{ route('dashboard.pages.destroy', 'id') }}".replace('id',delete_page_id),
                        method: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: Delete,
                                    text: response.message,
                                    icon: "success"
                                });
                                $('#yajra_table').DataTable().page(currentPage).draw(false);
                                $('#yajra_table').DataTable().ajax.reload();
                            } else {
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

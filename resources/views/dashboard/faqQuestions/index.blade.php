@extends('layouts.dashboard.app')
@section('title', __('dashboard.faq_questions'))
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
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.faq_question') }}</a>
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
                                <h4 class="card-title"><b>{{ __('dashboard.faq_questions') }}</b></h4>
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
                                    {{-- <a href="{{ route('dashboard.faq_questions.create') }}" class="btn btn-success px-2 round btn-glow"> <i class="ft-edit"></i>
                                        {{ __('dashboard.create_faq_question') }}</a> --}}



                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        {{-- @include('dashboard.includes.tostar-success')
                                        @include('dashboard.includes.tostar-error') --}}
                                        <table id="yajra_table"
                                            class="table table-striped language-file table-bordered column-rendering dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_email') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_subject') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_message') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                     <th scope="col">{{ __('dashboard.faq_question_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_email') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_subject') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_message') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_question_created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="col-12 float-md-right p-3">
                                            {{-- {{ $faq_question->links() }} --}}
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
                            return 'Details for {{ __('dashboard.faq_question') }}:' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.faq.questions.all') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'subject',
                    name: 'subject',
                },
                {
                    data: 'message',
                    name: 'message',
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

        // // // delete faq_question using Ajax
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            var title = "{{ __('dashboard.delete_msg') }}";
            var text = "{{ __('dashboard.alert_delete_text') }}";
            var btnDelete = "{{ __('dashboard.delete_text') }}";
            var btnCancel = "{{ __('dashboard.cancel_text') }}";
            var Delete = "{{ __('dashboard.delete') }}";
            var delete_faq_question_id = $(this).attr('faq_question_id');
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
                        url: "{{ route('dashboard.faq.question.destroy', 'id') }}".replace('id',delete_faq_question_id),
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

@extends('layouts.dashboard.app')
@section('title', __('dashboard.brands'))
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
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.brand') }}</a>
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
                                <h4 class="card-title"><b>{{ __('dashboard.brands') }}</b></h4>
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
                                data-target="#bootstrap"> <i class="ft-edit"></i> {{ __('dashboard.create_brand') }}</button>
                                @include('dashboard.brands.create')
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
                                                    <th scope="col">{{ __('dashboard.brand_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.brand_logo') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_count') }}</th>
                                                    <th scope="col">{{ __('dashboard.brand_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                             
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.brand_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.brand_logo') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_count') }}</th>
                                                    <th scope="col">{{ __('dashboard.brand_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="col-12 float-md-right p-3">
                                            {{-- {{ $brand->links() }} --}}
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
    {{-- errors open model --}}
    @if ($errors->any())
    <script>
        $(document).ready(function () {
            $('#bootstrap').modal('show');
        });
    </script>
    @endif
    {{-- file input  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        $(function() {
            $('#singleImage').fileinput({
                theme: 'fa5',
                language:lang,
                allowedFileTypes: ['image'],
                maxFileCount: 1,
                enableResumableUpload:false,
                showUpload: false,
            });
        });
    </script>        
    {{-- js DataTable  --}}
    <script>
        var lang = "{{ app()->getLocale() }}";
        $('#yajra_table').DataTable({
            processing: true,
            serverSide: true,
            fixedHeader: true,
            fixedColumns: true,
            colReorder: true,
            // scrollCollapse: true,
            // scroller: true,
            // scrollY: 500,
            // rowReorder: true,
            // select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.brands.all') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'logo',
                    name: 'logo',
                },
                {
                    data: 'products_count',
                    name: 'Count Product',
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
                    buttons: ['colvis' , 'copy' , 'print','excel','pdf']
                }
            },
            language: lang === 'ar' ? {
                url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
            }:{},
        });
    </script>

@endpush

@extends('layouts.dashboard.app')
@section('title', __('dashboard.attributes'))
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
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.attribute') }}</a>
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
                                <h4 class="card-title"><b>{{ __('dashboard.attributes') }}</b></h4>
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
                                        data-target="#attributeModal"> <i class="ft-edit"></i>
                                        {{ __('dashboard.create_attribute') }}</button>

                                    @include('dashboard.products.attributes._create')
                                    @include('dashboard.products.attributes._edit')

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table id="yajra_table"
                                            class="table table-striped language-file table-bordered column-rendering dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.attribute_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.attribute_value') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.attribute_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.attribute_value') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>

                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="col-12 float-md-right p-3">
                                            {{-- {{ $attribute->links() }} --}}
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
            // rowReorder: {
            //     update:false,
            //     selector:'td:not(:first-child)',
            // },
            // select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for {{ __('dashboard.attribute') }}:' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.attributes.all') }}",
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
                    data: 'attributeValue',
                    name: 'attributeValue',
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
                    buttons: ['colvis', 'copy', 'print', 'excel', 'pdf']
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

        //add more row in create
        $(document).ready(function() {
            let valueIndex = 2;
            $('#add_more').on('click', function(e) {
                e.preventDefault();
                let newRow = `<div class="row attribute_value_row">
                        <fieldset class="form-group floating-label-form-group col-md-5">
                            <label for="value_en_${valueIndex}">{{ __('dashboard.attribute_value_en') }}</label>
                            <input type="text" name="value[${valueIndex}][en]" class="form-control" id="value_en_${valueIndex}"
                                placeholder="{{ __('dashboard.attribute_value_en') }}" value="{{ old('value.en') }}">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group col-md-5 ">
                            <label for="value_ar_${valueIndex}">{{ __('dashboard.attribute_value_ar') }}</label>
                            <input type="text" name="value[${valueIndex}][ar]" class="form-control" id="value_ar_${valueIndex}"
                                placeholder="{{ __('dashboard.attribute_value_ar') }}" value="{{ old('value.ar') }}">
                        </fieldset>
                         <div class="col-md-2 m-auto">
                             <button type="button" class="btn btn-outline-danger btn-sm remove_attribute_value">
                                 <i class="ft-x"></i> 
                             </button>
                         </div>
                    </div>`;
                $('.attribute_value_row:last').after(newRow);
                valueIndex++;
            });
            $(document).on('click', '.remove_attribute_value', function() {
                $(this).closest('.attribute_value_row').remove();
            });
           
        });
        // create attribute using Ajax
        $('#create_attribute').on('submit', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            $.ajax({
                url: "{{ route('dashboard.attributes.store') }}",
                method: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        $('#create_attribute')[0].reset();
                        $('#yajra_table').DataTable().page(currentPage).draw(false);
                        $('#attributeModal').removeClass('show').css('display', 'none').attr(
                            'aria-hidden', 'true');
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
                        $('#error_list').empty();
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list').append('<li>' + value[0] + '</li>');
                            $('#error_div').show();
                        });
                    }
                },
            });
        });

        // // edit attribute using Ajax
        $(document).on('click', '.edit_attribute', function(e) {
            e.preventDefault();
            let attribute_id = $(this).data('id');
            let attribute_name_en = $(this).data('name-en');
            let attribute_name_ar = $(this).data('name-ar');
            let Values = $(this).data('values');
            
            $('.attribute_value_row_edit').empty();

            $('#attribute_Id').val(attribute_id);
            $('#attributeNameEn').val(attribute_name_en);
            $('#attributeNameAr').val(attribute_name_ar);

            let valueContainer = $('.attribute_value_row_edit:last');
            valueContainer.empty();
            Values.forEach(value => {
                valueContainer.after(`
                <div class="row attribute_value_row_edit">
                        <fieldset class="form-group floating-label-form-group col-md-5">
                            <label for="attribute_value_en">{{ __('dashboard.attribute_value_en') }}</label>
                            <input type="text" name="value[${value.id}][en]" class="form-control" id="attribute_value_en"
                                placeholder="{{ __('dashboard.attribute_value_en') }}" value="${value.value_en}">
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group col-md-5 ">
                            <label for="attribute_value_ar">{{ __('dashboard.attribute_value_ar') }}</label>
                            <input type="text" name="value[${value.id}][ar]" class="form-control" id="attribute_value_ar"
                                placeholder="{{ __('dashboard.attribute_value_ar') }}" value="${value.value_ar}">
                        </fieldset>
                        <div class="col-md-2 m-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm remove_attribute_value_edit">
                                <i class="ft-x"></i> 
                            </button>
                        </div>
                 </div>`);
            });
            $('#error_list_edit').empty();
            $('#error_div_edit').hide();
            $('#updateAttributeModal').modal('show').attr('aria-hidden', 'true');
        });
        // add new value to attribute in case edit
        $(document).ready(function() {
            let valueIndex = 2;
            $('#add_more_edit').on('click', function(e) {
                e.preventDefault();
                let newRow = ` <div class="row attribute_value_row_edit">
                        <fieldset class="form-group floating-label-form-group col-md-5">
                            <label for="attribute_value_en">{{ __('dashboard.attribute_value_en') }}</label>
                            <input type="text" name="value[${valueIndex}][en]" class="form-control" id="attribute_value_en"
                                placeholder="{{ __('dashboard.attribute_value_en') }}" >
                        </fieldset>
                        <fieldset class="form-group floating-label-form-group col-md-5 ">
                            <label for="attribute_value_ar">{{ __('dashboard.attribute_value_ar') }}</label>
                            <input type="text" name="value[${valueIndex}][ar]" class="form-control" id="attribute_value_ar"
                                placeholder="{{ __('dashboard.attribute_value_ar') }}" >
                        </fieldset>
                        <div class="col-md-2 m-auto">
                            <button type="button" class="btn btn-outline-danger btn-sm remove_attribute_value_edit">
                                <i class="ft-x"></i> 
                            </button>
                        </div>
                 </div>`;
                $('.attribute_value_row_edit:last').after(newRow);
                valueIndex++;
            });
            $(document).on('click', '.remove_attribute_value_edit', function() {
                $(this).closest('.attribute_value_row_edit').remove();
            });
        });
        // // update attribute using Ajax
        $('#update_attribute').on('submit', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            var edit_attribute_id = $('#attribute_Id').val();            
            $.ajax({
                url: "{{ route('dashboard.attributes.update', ':id') }}".replace(':id', edit_attribute_id),
                method: "POST",
                data: new FormData($(this)[0]),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'success') {
                        $('#yajra_table').DataTable().page(currentPage).draw(false);
                        $('#update_attribute')[0].reset();
                        $('#updateAttributeModal').modal('hide');
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
                        $('#error_list_edit').empty();
                        $('#error_div_edit').hide();
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list_edit').append('<li>' + value[0] + '</li>');
                            $('#error_div_edit').show();
                        });
                    }
                },
            });
        });
        // // delete attribute using Ajax
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var title = "{{ __('dashboard.delete_msg') }}";
            var text = "{{ __('dashboard.alert_delete_text') }}";
            var btnDelete = "{{ __('dashboard.delete_text') }}";
            var btnCancel = "{{ __('dashboard.cancel_text') }}";
            var Delete = "{{ __('dashboard.delete') }}";
            var Delete_success = "{{ __('dashboard.delete_success') }}";
            var delete_attribute_id = $(this).attr('attribute_id');
            console.log(delete_attribute_id);
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
                        url: "{{ route('dashboard.attributes.destroy', 'id') }}".replace('id', delete_attribute_id),
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

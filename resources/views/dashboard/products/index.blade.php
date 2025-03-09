@extends('layouts.dashboard.app')
@section('title', __('dashboard.products'))
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
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.product') }}</a>
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
                                <h4 class="card-title"><b>{{ __('dashboard.products') }}</b></h4>
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
                                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-success px-2 round btn-glow"> <i class="ft-edit"></i>
                                        {{ __('dashboard.create_product') }}</a>



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
                                                    <th scope="col">{{ __('dashboard.product_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_has_variants') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_images') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_sku') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_available_for') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_price') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_quantity') }}</th>
                                                    <th scope="col">{{ __('dashboard.category') }}</th>
                                                    <th scope="col">{{ __('dashboard.brand') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.product_name') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_has_variants') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_images') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_sku') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_available_for') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_price') }}</th>
                                                    <th scope="col">{{ __('dashboard.product_quantity') }}</th>
                                                    <th scope="col">{{ __('dashboard.category') }}</th>
                                                    <th scope="col">{{ __('dashboard.brand') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="col-12 float-md-right p-3">
                                            {{-- {{ $product->links() }} --}}
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
                selector:'td:not(:first-child):not(:nth-child(4))',
            },
            // select: true,
            responsive: {
                details: {
                    display: DataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            return 'Details for {{ __('dashboard.product') }}:' + data['code'];
                        }
                    }),
                    renderer: DataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            ajax: "{{ route('dashboard.products.all') }}",
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
                    data: 'has_variants',
                    name: 'has_variants',
                },
                {
                    data: 'images',
                    name: 'images',
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'sku',
                    name: 'sku',
                },
                {
                    data: 'available_for',
                    name: 'available_for',
                },
                {
                    data: 'price',
                    name: 'price',
                },
                {
                    data: 'quantity',
                    name: 'quantity',
                },
                {
                    data: 'category',
                    name: 'category',
                },
                {
                    data: 'brand',
                    name: 'brand',
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
        // change status using Ajax
        $(document).on('click' , '.change_status' , function (e) {
                    e.preventDefault();
                    var currentPage = $('#yajra_table').DataTable().page();
                    var id = $(this).attr('product-id');
                    var url = "{{ route('dashboard.products.status',':id') }}";
                    url = url.replace(':id', id);
                    $.ajax({
                        url: url,
                        type: "GET",
                        success: function (response) {
                            
                            if (response.status == 'success') {
                                $('#yajra_table').DataTable().page(currentPage).draw(false);
                                //change status
                                $('#status_' + response.data.id).empty();
                                $('#status_' + response.data.id).text("{{  __('dashboard.active') }}");
                                $('#status_' + response.data.id).removeClass('btn-outline-success').addClass('btn-outline-black');
                                $('#icon_' + response.data.id).removeClass('la la-toggle-on').addClass('la la-toggle-off');
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: response.message,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }if (response.status == 'success_not_active') {
                                $('#yajra_table').DataTable().page(currentPage).draw(false);
                                //change status
                                $('#status_' + response.data.id).empty();
                                $('#status_' + response.data.id).text("{{  __('dashboard.not_active') }}");
                                $('#status_' + response.data.id).removeClass('btn-outline-black').addClass('btn-outline-success')
                                $('#icon_' + response.data.id).removeClass('la la-toggle-off').addClass('la la-toggle-on');
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

        //add more row in create
        // $(document).ready(function() {
        //     let valueIndex = 2;
        //     $('#add_more').on('click', function(e) {
        //         e.preventDefault();
        //         let newRow = `<div class="row product_value_row">
        //                 <fieldset class="form-group floating-label-form-group col-md-5">
        //                     <label for="value_en_${valueIndex}">{{ __('dashboard.product_value_en') }}</label>
        //                     <input type="text" name="value[${valueIndex}][en]" class="form-control" id="value_en_${valueIndex}"
        //                         placeholder="{{ __('dashboard.product_value_en') }}" value="{{ old('value.en') }}">
        //                 </fieldset>
        //                 <fieldset class="form-group floating-label-form-group col-md-5 ">
        //                     <label for="value_ar_${valueIndex}">{{ __('dashboard.product_value_ar') }}</label>
        //                     <input type="text" name="value[${valueIndex}][ar]" class="form-control" id="value_ar_${valueIndex}"
        //                         placeholder="{{ __('dashboard.product_value_ar') }}" value="{{ old('value.ar') }}">
        //                 </fieldset>
        //                  <div class="col-md-2 m-auto">
        //                      <button type="button" class="btn btn-outline-danger btn-sm remove_product_value">
        //                          <i class="ft-x"></i> 
        //                      </button>
        //                  </div>
        //             </div>`;
        //         $('.product_value_row:last').after(newRow);
        //         valueIndex++;
        //     });
        //     $(document).on('click', '.remove_product_value', function() {
        //         $(this).closest('.product_value_row').remove();
        //     });
           
        // });
        // // create product using Ajax
        // $('#create_product').on('submit', function(e) {
        //     e.preventDefault();
        //     var currentPage = $('#yajra_table').DataTable().page();
        //     $.ajax({
        //         url: "{{ route('dashboard.products.store') }}",
        //         method: "POST",
        //         data: new FormData(this),
        //         processData: false,
        //         contentType: false,
        //         success: function(data) {
        //             if (data.status == 'success') {
        //                 $('#create_product')[0].reset();
        //                 $('#yajra_table').DataTable().page(currentPage).draw(false);
        //                 $('#productModal').removeClass('show').css('display', 'none').attr(
        //                     'aria-hidden', 'true');
        //                 $('body').removeClass('modal-open');
        //                 $('.modal-backdrop').remove();
        //                 Swal.fire({
        //                     position: "center",
        //                     icon: "success",
        //                     title: data.message,
        //                     showConfirmButton: false,
        //                     timer: 2000
        //                 });
        //             }
        //         },
        //         error: function(data) {
        //             if (data.responseJSON.errors) {
        //                 $('#error_list').empty();
        //                 $.each(data.responseJSON.errors, function(key, value) {
        //                     $('#error_list').append('<li>' + value[0] + '</li>');
        //                     $('#error_div').show();
        //                 });
        //             }
        //         },
        //     });
        // });

        // // // edit product using Ajax
        // $(document).on('click', '.edit_product', function(e) {
        //     e.preventDefault();
        //     let product_id = $(this).data('id');
        //     let product_name_en = $(this).data('name-en');
        //     let product_name_ar = $(this).data('name-ar');
        //     let Values = $(this).data('values');
            
        //     $('.product_value_row_edit').empty();

        //     $('#product_Id').val(product_id);
        //     $('#productNameEn').val(product_name_en);
        //     $('#productNameAr').val(product_name_ar);

        //     let valueContainer = $('.product_value_row_edit:last');
        //     valueContainer.empty();
        //     Values.forEach(value => {
        //         valueContainer.after(`
        //         <div class="row product_value_row_edit">
        //                 <fieldset class="form-group floating-label-form-group col-md-5">
        //                     <label for="product_value_en">{{ __('dashboard.product_value_en') }}</label>
        //                     <input type="text" name="value[${value.id}][en]" class="form-control" id="product_value_en"
        //                         placeholder="{{ __('dashboard.product_value_en') }}" value="${value.value_en}">
        //                 </fieldset>
        //                 <fieldset class="form-group floating-label-form-group col-md-5 ">
        //                     <label for="product_value_ar">{{ __('dashboard.product_value_ar') }}</label>
        //                     <input type="text" name="value[${value.id}][ar]" class="form-control" id="product_value_ar"
        //                         placeholder="{{ __('dashboard.product_value_ar') }}" value="${value.value_ar}">
        //                 </fieldset>
        //                 <div class="col-md-2 m-auto">
        //                     <button type="button" class="btn btn-outline-danger btn-sm remove_product_value_edit">
        //                         <i class="ft-x"></i> 
        //                     </button>
        //                 </div>
        //          </div>`);
        //     });
        //     $('#error_list_edit').empty();
        //     $('#error_div_edit').hide();
        //     $('#updateproductModal').modal('show').attr('aria-hidden', 'true');
        // });
        // // add new value to product in case edit
        // $(document).ready(function() {
        //     let valueIndex = 2;
        //     $('#add_more_edit').on('click', function(e) {
        //         e.preventDefault();
        //         let newRow = ` <div class="row product_value_row_edit">
        //                 <fieldset class="form-group floating-label-form-group col-md-5">
        //                     <label for="product_value_en">{{ __('dashboard.product_value_en') }}</label>
        //                     <input type="text" name="value[${valueIndex}][en]" class="form-control" id="product_value_en"
        //                         placeholder="{{ __('dashboard.product_value_en') }}" >
        //                 </fieldset>
        //                 <fieldset class="form-group floating-label-form-group col-md-5 ">
        //                     <label for="product_value_ar">{{ __('dashboard.product_value_ar') }}</label>
        //                     <input type="text" name="value[${valueIndex}][ar]" class="form-control" id="product_value_ar"
        //                         placeholder="{{ __('dashboard.product_value_ar') }}" >
        //                 </fieldset>
        //                 <div class="col-md-2 m-auto">
        //                     <button type="button" class="btn btn-outline-danger btn-sm remove_product_value_edit">
        //                         <i class="ft-x"></i> 
        //                     </button>
        //                 </div>
        //          </div>`;
        //         $('.product_value_row_edit:last').after(newRow);
        //         valueIndex++;
        //     });
        //     $(document).on('click', '.remove_product_value_edit', function() {
        //         $(this).closest('.product_value_row_edit').remove();
        //     });
        // });
        // // // update product using Ajax
        // $('#update_product').on('submit', function(e) {
        //     e.preventDefault();
        //     var currentPage = $('#yajra_table').DataTable().page();
        //     var edit_product_id = $('#product_Id').val();            
        //     $.ajax({
        //         url: "{{ route('dashboard.products.update', ':id') }}".replace(':id', edit_product_id),
        //         method: "POST",
        //         data: new FormData($(this)[0]),
        //         processData: false,
        //         contentType: false,
        //         success: function(data) {
        //             if (data.status == 'success') {
        //                 $('#yajra_table').DataTable().page(currentPage).draw(false);
        //                 $('#update_product')[0].reset();
        //                 $('#updateproductModal').modal('hide');
        //                 $('body').removeClass('modal-open');
        //                 $('.modal-backdrop').remove();
        //                 Swal.fire({
        //                     position: "center",
        //                     icon: "success",
        //                     title: data.message,
        //                     showConfirmButton: false,
        //                     timer: 2000
        //                 });
        //             }
        //         },
        //         error: function(data) {
        //             if (data.responseJSON.errors) {
        //                 $('#error_list_edit').empty();
        //                 $('#error_div_edit').hide();
        //                 $.each(data.responseJSON.errors, function(key, value) {
        //                     $('#error_list_edit').append('<li>' + value[0] + '</li>');
        //                     $('#error_div_edit').show();
        //                 });
        //             }
        //         },
        //     });
        // });
        // // // delete product using Ajax
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var currentPage = $('#yajra_table').DataTable().page();
            var title = "{{ __('dashboard.delete_msg') }}";
            var text = "{{ __('dashboard.alert_delete_text') }}";
            var btnDelete = "{{ __('dashboard.delete_text') }}";
            var btnCancel = "{{ __('dashboard.cancel_text') }}";
            var Delete = "{{ __('dashboard.delete') }}";
            var Delete_success = "{{ __('dashboard.delete_success') }}";
            var delete_product_id = $(this).attr('product_id');
            console.log(delete_product_id);
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
                        url: "{{ route('dashboard.products.destroy', 'id') }}".replace('id', delete_product_id),
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
                                $('#yajra_table').DataTable().page(currentPage).draw(false);
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

@extends('layouts.dashboard.app')
@section('title', __('dashboard.show_product') . ': ' . $product->name)
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{{ __('dashboard.show_product') }}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.welcome') }}">{{ __('dashboard.welcome') }}</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.products.index') }}">{{ __('dashboard.products') }}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{ $product->name }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                @include('dashboard.includes.button-header')
            </div>
            <div class="content-body">
                <section id="basic-form-layouts">
                    <div class="row match-height mt-3">
                        <div class="card col-md-11 m-auto mt-3">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-colored-form-control">
                                    {{ $product->name }}
                                </h4>
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
                                    <div class="row mb-5">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner ">
                                                    @foreach ($product->images as $key => $image)
                                                        <div
                                                            class="carousel-item @if ($key === 0) active @endif">
                                                            <img src="{{ asset('assets/img/uploads/products/' . $image->file_name) }}"
                                                                loading="lazy" class="d-block w-100 m-auto"
                                                                style="height: 600px; object-fit: fill;" alt="{{ $product->name }}">
                                                        </div>
                                                    @endforeach

                                                </div>
                                                <a href="#carouselExampleControls" class="carousel-control-prev"
                                                    type="button" data-target="#carouselExampleControls" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a href="#carouselExampleControls" class="carousel-control-next"
                                                    type="button" data-target="#carouselExampleControls" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                                <div class="position-absolute" style="top: 5px; right: 4%;">
                                                    <!-- Fullscreen Button -->
                                                    <button type="button" title="{{ __('dashboard.fullscreen') }}"
                                                        wire:click="openFullscreen({{ $key }})" data-toggle="modal"
                                                        data-target="#fullscreen_" class="btn btn-outline-primary"><i
                                                            class="fa fa-expand"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12"
                                            style="box-shadow: 0px 1px 15px 1px rgba(62, 57, 107, 0.07);">
                                            <h3 class="pt-2 pb-2 font-weight-bold"><i
                                                    class="fa-solid fa-box text-primary"></i>
                                                {{ __('dashboard.product_name') . ': ' . $product->name }}</h3>

                                            <!-- price , discount and quantity -->

                                            @if ($product->has_variants == 1)
                                                <b class="mt-1 mb-1 badge badge-warning"><i class="fa-solid fa-bars"></i> <a
                                                        href="#table_variants">{{ $product->hasVariantstranslated() }}</a></b>
                                            @else
                                                <b class="mt-1 mb-1 alert alert-warning"><i class="fa-solid fa-bars"></i>
                                                    {{ $product->hasVariantstranslated() }}</b>
                                                <h4 class="mt-2 mb-1 font-weight-bold"><i
                                                        class="fa-solid fa-boxes-stacked purple"></i>
                                                    {{ __('dashboard.product_quantity') . ': ' . $product->quantityAttribute() }}</h4>

                                                @if ($product->has_discount == 1)
                                                    
                                                    <h4 class="mt-2 mb-2 font-weight-bold"><i class="fa-solid fa-money-bill-1-wave success darken-4"></i>
                                                        {{ __('dashboard.product_price') }}: <span
                                                            class="success">$</span><b class="mt-1 mb-1 font-weight-bold danger">{{ number_format($product->price - ($product->price * ($product->discount / 100)),2) }}
                                                            </b><small class="text-muted"><del>${{ $product->price }}</del></small></h4>
                                                          
                                                @else
                                                    <h4 class="mt-1 mb-1 font-weight-bold"><i
                                                            class="fa-solid fa-money-bill-1-wave success darken-4"></i>
                                                        {{ __('dashboard.product_price') }}: <span
                                                            class="success">$</span>{{ $product->price }}</h4>

                                                @endif
                                            @endif
                                            {{-- Has Discount --}}
                                            @if ($product->has_discount)
                                                <h4 class="mt-1 mb-1 font-weight-bold"><i class="fa-solid fa-percent"></i> {{ __('dashboard.product_discount') . ': %' . $product->discount }}</h4>
                                                <h4 class="mt-1 mb-1 font-weight-bold"><i
                                                        class="fa-solid fa-hourglass-start"></i>
                                                    {{ __('dashboard.product_start_discount') . ': ' . $product->start_discount }}
                                                </h4> 
                                                <h4 class="mt-1 mb-1 font-weight-bold"><i
                                                        class="fa-solid fa-hourglass-end"></i>
                                                    {{ __('dashboard.product_end_discount') . ': ' . $product->end_discount }}
                                                </h4>
                                            @else
                                                <b class="mt-1 mb-1 alert alert-yellow"><i
                                                    class="fa-solid fa-hourglass yellow darken-4"></i>
                                                {{ __('dashboard.product_no_discount') }}</b>
                                            @endif
                                            <h4 class="mt-1 mb-1 font-weight-bold"><i
                                                    class="fa-solid fa-calendar-days pink"></i>
                                                {{ __('dashboard.product_available_for') . ': ' . $product->available_for ? $product->available_for: 'N/A' }}
                                            </h4>
                                            <h4 class="mt-1 mb-1 font-weight-bold"><i
                                                    class="fa-solid fa-calendar-days pink"></i>
                                                {{ __('dashboard.product_available_in_stock') . ': ' . $product->available_in_stock ? __('dashboard.yes'): __('dashboard.no') }}
                                            </h4>
                                            <h4 class="mt-1 mb-1 font-weight-bold"><i
                                                    class="fa-solid fa-barcode blue-grey"></i>
                                                {{ __('dashboard.product_sku') . ': ' . $product->sku }}</h4>
                                            <h4 class="mt-1 mb-1 font-weight-bold"><i class="fa-solid fa-eye warning"></i>
                                                {{ __('dashboard.product_views') . ': ' . $product->views }}</h4>
                                            <h4 class="mt-1 mb-1 font-weight-bold"><i class="fa-solid fa-tag cyan"></i>
                                                {{ __('dashboard.category') . ': ' . $product->category->name }}</h4>
                                            <h4 class="mt-1 mb-2 font-weight-bold"><i
                                                    class="fa-solid fa-industry teal"></i>
                                                {{ __('dashboard.brand') . ': ' . $product->brand->name }}</h4>
                                            <b class="mt-2 mb-1 d-block"><i class="fa-solid fa-calendar-plus"></i>
                                                    {{ __('dashboard.created') . ': ' . $product->created_at }}</b>

                                            <b class="mt-2 mb-1 d-block"><i
                                                    class="fa fa-align-justify info lighten-4"></i>
                                                {{ __('dashboard.product_small_description') . ': ' . $product->small_desc }}</b>
                                            <b class="mt-1 mb-1 d-block"><i class="la la-align-justify text-info"></i>
                                                {{ __('dashboard.product_description') . ': ' . $product->desc }}</b>
                                        </div>
                                    </div>
                                    
                                    <!-- Has Variant -->
                                    @if ($product->has_variants == 1)
                                        <div class="row pt-3 pb-1  table-responsive m-auto"
                                            style="box-shadow: 0px 1px 15px 1px rgba(62, 57, 107, 0.07);">
                                            <h3 class="font-weight-bold mb-3"><i
                                                    class="fa-solid fa-boxes-stacked purple"></i>
                                                {{ __('dashboard.product_variants') }}</h3>
                                            <table id="table_variants" class="table col">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{ __('dashboard.product_price') }}</th>
                                                        <th>{{ __('dashboard.product_quantity') }}</th>
                                                        <th>{{ __('dashboard.attributes') }}</th>
                                                        <th>{{ __('dashboard.active') }}</th>
                                                    </tr>
                                                </thead>
                                                </thead>
                                                <tbody>
                                                    @foreach ($product->productVariants as $variant)
                                                        <tr id="variant_{{ $variant->id }}">
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                                @if ($product->has_discount == 1)
                                                                    <td><span class="success">$</span>{{ $variant->price - ($variant->price * ($product->discount / 100)) }}
                                                                </b><small class="text-muted"> <del>${{ $variant->price }}</del></small> </td>
                                                                @else
                                                                     <td><span class="success">$</span>{{ $variant->price }}</td>
                                                                 @endif
                                                            <td>{{ $variant->stock }}</td>
                                                            <td>
                                                                @foreach ($variant->variantAttributes as $variantAttribute)
                                                                <span class="badge badge-primary">
                                                                    {{ $variantAttribute->attributeValue->attribute->name }}: 
                                                                    {{ $variantAttribute->attributeValue->value }}
                                                                </span>
                                                                @endforeach
                                                            </td>
                                                            <td> <button href="{{ route('dashboard.products.variants.delete', $variant->id) }}" class="btn btn-outline-danger delete_confirm_btn"
                                                                    variant_id="{{ $variant->id }}" {{ $variant->count() >= 1 ? 'hidden' : '' }} >
                                                                    <i class="ft-trash-2"></i>
                                                                    {{ __('dashboard.delete') }}</button></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    
                                    <!-- button -->
                                    <div class="card-footer text-right">
                                        <a href="{{ route('dashboard.products.index') }}" class="btn btn-secondary mr-1">
                                            <i class="fa fa-arrow-left"></i>
                                            {{ __('dashboard.back_to_products') }}</a>
                                        <a href="{{ route('dashboard.products.edit' , $product->id) }}" class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                            {{ __('dashboard.edit_product') }}</a>
                                            
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Fullscreen Modal -->
    <div class="modal fade" id="fullscreen_" tabindex="-1" aria-labelledby="fullscreenLabel_" aria-hidden="true">
        <div class="modal-dialog mt-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreenLabel_">{{ __('dashboard.fullscreen') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControlsModal" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($product->images as $key => $image)
                                <div class="carousel-item  @if ($key == 0) active @endif">
                                    <img src="{{ asset('assets/img/uploads/products/' . $image->file_name) }}"
                                        loading="lazy" class="d-block w-100" style="height: 600px; object-fit: fill;"
                                        alt="...">
                                </div>
                            @endforeach

                        </div>
                        <a href="#carouselExampleControlsModal" class="carousel-control-prev" type="button"
                            data-target="#carouselExampleControlsModal" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a href="#carouselExampleControlsModal" class="carousel-control-next" type="button"
                            data-target="#carouselExampleControlsModal" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    <script>
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var title = "{{ __('dashboard.delete_msg') }}";
            var text = "{{ __('dashboard.alert_delete_text') }}";
            var btnDelete = "{{ __('dashboard.delete_text') }}";
            var btnCancel = "{{ __('dashboard.cancel_text') }}";
            var Delete = "{{ __('dashboard.delete') }}";
            var Delete_success = "{{ __('dashboard.delete_success') }}";
            var delete_variant_id = $(this).attr('variant_id');
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
                        url: "{{ route('dashboard.products.variants.delete', ':id') }}".replace(':id',delete_variant_id),
                        method: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: Delete,
                                    text: Delete_success,
                                    icon: "success"
                                });
                                $('#variant_' + delete_variant_id).remove();
                                
                                if ($('#table_variants tbody tr').length <= 1) {
                                    $('.delete_confirm_btn').hide();
                                }
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

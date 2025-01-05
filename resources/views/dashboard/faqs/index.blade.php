@extends('layouts.dashboard.app')
@section('title', __('dashboard.faqs'))
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
                                <li class="breadcrumb-item"><a href="#">{{ __('dashboard.faqs') }}</a>
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
                                <h4 class="card-title"><b>{{ __('dashboard.faqs') }}</b></h4>
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
                                        data-target="#faqCreateModer"> <i class="ft-edit"></i>
                                        {{ __('dashboard.create_faq') }}</button>

                                    @include('dashboard.faqs._create')
                                    
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        @include('dashboard.includes.tostar-success')
                                        @include('dashboard.includes.tostar-error')
                                        <!-- Collapsible with Border Color -->
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="mb-1">
                                                <h5 class="mb-0">{{ __('dashboard.faq_dashboard') }}</h5>
                                            </div>
                                            <div class="card faq_row" id="headingCollapse1">
                                                @forelse ($faqs as $faq)
                                               <div id="delete_faq_{{ $faq->id }}">
                                                <div id="question_border_{{ $faq->id }}" role="tabpanel" class="card-header border-success">
                                                    <a id="question_{{ $faq->id }}" data-toggle="collapse" href="#collapse{{ $loop->iteration }}"
                                                        aria-expanded="true"
                                                        aria-controls="collapse{{ $loop->iteration }}"
                                                        class="font-medium-1 success">#{{ $loop->iteration }} {{ $faq->question }} </a>
                                                        <a faq-id="{{ $faq->id }}" id="delete_{{ $faq->id }}" href="" class="delete_confirm_btn float-right"><i class="la la-trash"></i></a>
                                                        <a id="edit_{{ $faq->id }}" class="float-right" href="" data-target="#faqEditModer_{{ $faq->id }}" data-toggle="modal"><i class="la la-edit"></i></a>
                                                        @include('dashboard.faqs._edit')
                                                    </div>
                                                    <div id="collapse{{ $loop->iteration }}" role="tabpanel"
                                                        aria-labelledby="headingCollapse{{ $loop->iteration }}"
                                                        class="card-collapse collapse {{ $loop->iteration == 1 ? 'show' : '' }}"
                                                        aria-expanded="true">
                                                        <div id="answer_{{ $faq->id }}" class="card-body">{{ $faq->answer }} </div>
                                                    </div>
                                               </div>
                                                @empty
                                                    <div class="alert alert-info">
                                                        {{ __('dashboard.no_data') }}
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                        {{-- <table id="yajra_table"
                                            class="table table-striped language-file table-bordered column-rendering dataTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.faq_code') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_discount_percentage') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_start_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_end_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_limit') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_time_used') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{ __('dashboard.faq_code') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_discount_percentage') }}
                                                    </th>
                                                    <th scope="col">{{ __('dashboard.faq_start_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_end_date') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_limit') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_time_used') }}</th>
                                                    <th scope="col">{{ __('dashboard.faq_status') }}</th>
                                                    <th scope="col">{{ __('dashboard.created') }}</th>
                                                    <th scope="col">{{ __('dashboard.operations') }}</th>

                                                </tr>
                                            </tfoot>
                                        </table> --}}
                                        <div class="col-12 float-md-right p-3">
                                            {{-- {{ $faq->links() }} --}}
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
        var local = "{{ app()->getLocale() }}";
        // create faq using Ajax
        $(document).on('submit','#create_faq', function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('dashboard.faqs.store') }}",
                method: "POST",
                data: new FormData($(this)[0]),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'error') {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }else{
                        $('#create_faq')[0].reset();
                        var question = local == 'ar'? data.faq.question.ar : data.faq.question.en;
                        var answer = local == 'ar'? data.faq.answer.ar : data.faq.answer.en;
                        $('.faq_row').prepend(`<div id="delete_faq_${data.faq.id}">
                                                        <div role="tabpanel" class="card-header border-success">
                                                        <a id="question_${data.faq.id}" data-toggle="collapse" href="#collapse"
                                                            aria-expanded="true"
                                                            aria-controls="collapse"
                                                            class="font-medium-1 success"># ${question} </a>
                                                                <a faq-id="${data.faq.id}" id="delete_${data.faq.id}" href="" class="delete_confirm_btn float-right"><i class="la la-trash"></i></a>
                                                                <a href="" id="edit_${data.faq.id}" class=" float-right" data-target="#faqEditModer_${data.faq.id}" data-toggle="modal"><i class="la la-edit"></i></a>
                                                    </div>
                                                    <div id="collapse" role="tabpanel"
                                                        aria-labelledby="headingCollapse"
                                                        class="card-collapse collapse show"
                                                        aria-expanded="true">
                                                        <div id="answer_${data.faq.id}" class="card-body">${answer} </div>
                                                    </div></div>`);
                        $('#faqCreateModer').removeClass('show').css('display', 'none').attr('aria-hidden','true');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#faqCreateModer').modal('hide');
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
        // update faq using Ajax
        $(document).on('submit' , '.update_faq_form', function(e) {
            e.preventDefault();
            var faq_id = $(this).attr('faq-id');
            var url ="{{ route('dashboard.faqs.update', ':id') }}".replace(':id', faq_id); 
            $.ajax({
                url: url,
                type: "POST",
                data: new FormData($(this)[0]),
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 'error') {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }else{
                        var question = local == 'ar'? data.faq.question.ar : data.faq.question.en;
                        var answer = local == 'ar'? data.faq.answer.ar : data.faq.answer.en;
                        $('#question_'+faq_id).empty().text(question);
                        $('#answer_'+faq_id).empty().text(answer);
                        $('#question_'+faq_id).removeClass('success').addClass('warning');
                        $('#question_border_'+faq_id).removeClass('border-success').addClass('border-warning');
                        $('#faqEditModer_'+faq_id).removeClass('show').css('display', 'none').attr('aria-hidden', 'true');
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
                        $('#error_list_edit_'+faq_id).empty();
                        $.each(data.responseJSON.errors, function(key, value) {
                            $('#error_list_edit_'+faq_id).append('<li>' + value[0] + '</li>');
                            $('#error_div_edit_'+faq_id).show();
                        });
                    }
                },
            });
        });
        // delete faq using Ajax
        $(document).on('click', '.delete_confirm_btn', function(e) {
            e.preventDefault();
            var title = "{{ __('dashboard.delete_msg') }}";
            var text = "{{ __('dashboard.alert_delete_text') }}";
            var btnDelete = "{{ __('dashboard.delete_text') }}";
            var btnCancel = "{{ __('dashboard.cancel_text') }}";
            var Delete = "{{ __('dashboard.delete') }}";
            var Delete_success = "{{ __('dashboard.delete_success') }}";
            var delete_faq_id = $(this).attr('faq-id');
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
                        url: "{{ route('dashboard.faqs.destroy', 'id') }}".replace('id', delete_faq_id),
                        type: "DELETE",
                        data:{
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                $('#delete_faq_'+delete_faq_id).remove();
                                Swal.fire({
                                    title: Delete,
                                    text: Delete_success,
                                    icon: "success"
                                });
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

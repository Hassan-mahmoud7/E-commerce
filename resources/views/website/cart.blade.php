@extends('layouts.website.app')
@section('title', __('website.cart'))
@section('content')

 {{-- bradcrum --}}
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)">{{ __('website.cart') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.cart') }}</h1>
            </div>
        </div>
    </section>

    <section class="product-cart product footer-padding">
    @livewire('website.cart.cart-table')

    </section>
@endsection
@push('js')
    <script>
        document.addEventListener('livewire:init', function () {
            Livewire.on('message', (event) => {
                Swal.fire({
                    title: "{{ __('website.success') }}",
                    text: event,
                    icon: "info",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        });
    </script>
    
@endpush

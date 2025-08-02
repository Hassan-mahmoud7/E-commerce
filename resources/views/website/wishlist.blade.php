@extends('layouts.website.app')
@section('title', __('website.wishlist'))
@section('content')
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)">{{ __('website.wishlist') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.wishlist') }}</h1>
            </div>
        </div>
    </section>
    <section class="cart product wishlist footer-padding" data-aos="fade-up">
        @livewire('website.wishlist.wishlist-table')
    </section>

@endsection
@push('js')
    <script>
        document.addEventListener('livewire:init', function() {
            Livewire.on('failded', function(event) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: event,
                    showConfirmButton: false,
                    timer: 1500
                });
            });
             Livewire.on('removedFromWishlist', (event) => {
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

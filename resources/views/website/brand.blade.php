@extends('layouts.website.app')
@section('title', __('website.brands'))

@section('content')

    {{-- bradcrum --}}
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)">{{ __('website.brand') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.brands') }}</h1>
            </div>
        </div>
    </section>

    {{-- brands --}}
    <section class="product brand mb-5 mt-5 pb-5" data-aos="fade-up">
        <div class="container mb-5 mt-5">
            <div class="brand-section mb-5 mt-5">
                @forelse ($brands as $brand)
                    <div class="product-wrapper mb-5 mt-5">
                        <div class="wrapper-img">
                            <a href="{{ route('website.brand.products', $brand->slug) }}">
                                <img loading="lazy" src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}">
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info">
                        <strong>{{ __('website.no_brands_found') }}</strong>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

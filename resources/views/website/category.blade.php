@extends('layouts.website.app')
@section('title', __('website.categories'))

@section('content')

    {{-- bradcrum --}}
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="{{ route('website.home') }}">{{ __('website.home') }}</a></span>
                <span class="devider">/</span>
                <span><a href="javascript:void(0)">{{ __('website.category') }}</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">{{ __('website.categories') }}</h1>
            </div>
        </div>
    </section>

    {{-- categories --}}
    <section class="product-category mb-5 mt-5 pb-5">
        <div class="container mb-5 mt-5">
            <div class="category-section mb-5 mt-5">
                @forelse ($categories as $category)
                <div class="product-wrapper mb-5 mt-5" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <img loading="lazy"
                            src="{{ asset($category->image) }}"
                            alt="{{ asset($category->name) }}">
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('website.category.products', $category->slug) }}" class="wrapper-details">{{ $category->name }}</a>
                    </div>
                </div>
                    
                @empty
                    <div class="alert alert-info">
                        <strong>{{ __('website.no_categories_found') }}</strong>
                    </div>

                @endforelse
  
            </div>
        </div>
    </section>
@endsection

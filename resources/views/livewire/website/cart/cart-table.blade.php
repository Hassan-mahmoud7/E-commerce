<div>
    @if ($cartItems->count() > 0)
        <div class="container">
            <div class="cart-section">
                <table>
                    <tbody>
                        {{-- table head --}}
                        <tr class="table-row table-top-row">
                            <td class="table-wrapper wrapper-product">
                                <h5 class="table-heading">{{ __('website.product') }}</h5>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ __('website.price') }}</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ __('website.quantity') }}</h5>
                                </div>
                            </td>
                            <td class="table-wrapper wrapper-total">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ __('website.total') }}</h5>
                                </div>
                            </td>
                            <td class="table-wrapper wrapper-total">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ __('website.attributes') }}</h5>
                                </div>
                            </td>
                            <td class="table-wrapper">
                                <div class="table-wrapper-center">
                                    <h5 class="table-heading">{{ __('website.action') }}</h5>
                                </div>
                            </td>
                        </tr>
                        {{-- table body --}}
                        @foreach ($cartItems as $item)
                            <tr class="table-row ticket-row">
                                <td class="table-wrapper wrapper-product">
                                    <div class="wrapper">
                                        <div class="wrapper-img">
                                            <img src="{{ asset('assets/img/uploads/products/' . $item->product->images->first()->file_name) }}"
                                                alt="{{ $item->product->name }}">
                                        </div>
                                        <div class="wrapper-content">
                                            <h5 class="heading">{{ $item->product->name }}</h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <h5 class="heading">{{ $item->price }} {{ __('website.egp') }}</h5>
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <div class="quantity">
                                            <span  wire:click="minusQuantity({{ $item->id }})" class="minus">
                                                -
                                            </span>

                                            <span class="number">{{ $item->quantity }}</span>

                                            <span wire:click="plusQuantity({{ $item->id }})" class="plus">
                                                +
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="table-wrapper wrapper-total">
                                    <div class="table-wrapper-center">
                                        <h5 class="heading">{{ number_format($item->price * $item->quantity, 2) }}
                                            {{ __('website.egp') }}</h5>
                                    </div>
                                </td>
                                <td class="table-wrapper wrapper-total">
                                    <div class="table-wrapper-center">
                                            {{-- <h5 class="heading">{{ $item->attributes }}</h5>
                                        @else --}}
                                    @if ($item->attributes != null)
                                        @forelse ($item->attributes as $attribute => $value)
                                            <h5 class="heading ms-2">{{ $attribute .':'. $value  }} </h5>
                                        @endforeach
                                        @else
                                            <h5 class="heading">{{ __('website.no_attributes') }}</h5>
                                        @endif 
                                    </div>
                                </td>
                                <td class="table-wrapper">
                                    <div class="table-wrapper-center">
                                        <span wire:click="removeProductFromCart({{ $item->id }})">
                                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M9.7 0.3C9.3 -0.1 8.7 -0.1 8.3 0.3L5 3.6L1.7 0.3C1.3 -0.1 0.7 -0.1 0.3 0.3C-0.1 0.7 -0.1 1.3 0.3 1.7L3.6 5L0.3 8.3C-0.1 8.7 -0.1 9.3 0.3 9.7C0.7 10.1 1.3 10.1 1.7 9.7L5 6.4L8.3 9.7C8.7 10.1 9.3 10.1 9.7 9.7C10.1 9.3 10.1 8.7 9.7 8.3L6.4 5L9.7 1.7C10.1 1.3 10.1 0.7 9.7 0.3Z"
                                                    fill="#AAAAAA"></path>
                                            </svg>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="wishlist-btn cart-btn">
                <a wire:click.prevent="cleanAllProduct" href=""
                    class="clean-btn">{{ __('website.clear_cart') }}</a>
                <a href="javascript:void(0)" @click="$dispatch('refreshCart')" class="shop-btn update-btn">{{ __('website.update_cart') }}</a>
                <a href="checkout.html" class="shop-btn">{{ __('website.proceed_to_checkout') }}</a>
            </div>
        </div>
    @else
        <section class="blog about-blog footer-padding">
            <div class="container">
                <div class="blog-item">
                    <div class="cart-img">
                        <img src="{{ asset('assets/website/assets/images/homepage-one/empty-wishlist.webp') }}" alt>
                    </div>
                    <div class="cart-content">
                        <p class="content-title">{{ __('website.empty_product') }}</p>
                        <a href="{{ route('website.products.shop') }}"
                            class="shop-btn">{{ __('website.back_to_shop') }}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>

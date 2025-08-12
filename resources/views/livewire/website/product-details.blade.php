<div>
    {{-- price --}}
    <div class="price">
        @if ($product->has_variants == 0)
            @if ($product->has_discount == 0)
                <span class="new-price">{{ number_format($product->price, 2) . ' ' . __('website.egp') }}</span>
            @else
                <span class="price-cut">{{ number_format($product->price, 2) . ' ' . __('website.egp') }}</span>
                <span class="new-price">{{ $product->getPriceAfterDiscount() . ' ' . __('website.egp') }}</span>
            @endif
        @else
            @if ($product->has_discount == 0)
                <span class="new-price">{{ number_format($price, 2) . ' ' . __('website.egp') }}</span>
            @else
                <span class="price-cut">{{ number_format($price, 2) . ' ' . __('website.egp') }}</span>
                <span class="new-price">{{ $priceAfterDiscount . ' ' . __('website.egp') }}</span>
            @endif
        @endif
    </div>
    <p class="content-paragraph">{{ $product->small_desc }}</p>
    <hr>
    {{-- Product availability --}}
    <div class="product-availability">
        @if ($product->has_variants == 1)
            <span>{{ __('website.availabillity') }} : </span>
            <span class="inner-text ">{{ $quantity }} {{ __('website.in_stock') }}</span>
        @else
            @if ($product->manage_stock == 1)
                @if ($product->quantity > 0)
                    <span>{{ __('website.availabillity') }} : </span>
                    <span class="inner-text">{{ $product->quantity }}
                        {{ __('website.in_stock') }}</span>
                @else
                    <span class="inner-text ">{{ __('website.out_of_stock') }}</span>
                @endif
            @else
                <span class="inner-text ">{{ __('website.products_available') }}</span>
            @endif
        @endif
    </div>
    {{-- Product Variants --}}
    @if ($product->has_variants == 1)
        <div class="product-size">
            <P class="size-title">{{ __('website.variants') }}</P>

            {{-- Show selected variant attributes --}}
            <div class="selected-attributes">
                @foreach ($variants as $item)
                    @if ($item->id == $variantId)
                        @foreach ($item->VariantAttributes as $itemAttr)
                            <p class="size-title">
                                {{ $itemAttr->attributeValue->attribute->name }}:
                                {{ $itemAttr->attributeValue->value }}
                            </p>
                        @endforeach
                    @endif
                @endforeach
            </div><br>

            <div class="size-section">
                <span class="size-text">{{ __('website.select_variants') }}</span>
                <div class="toggle-btn">
                    <span class="toggle-btn2"></span>
                    <span class="chevron">
                        <svg width="11" height="7" viewBox="0 0 11 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.4 6.8L0 1.4L1.4 0L5.4 4L9.4 0L10.8 1.4L5.4 6.8Z" fill="#222222" />
                        </svg>
                    </span>
                </div>
            </div>
            <ul class="size-option">
                @foreach ($variants as $item)
                    <li class="option" wire:click="changeVariant({{ $item->id }})">
                        @foreach ($item->variantAttributes as $itemAttribute)
                            <span class="option-text">{{ $itemAttribute->attributeValue->attribute->name }}
                                :{{ $itemAttribute->attributeValue->value }}</span>
                        @endforeach
                    </li>
                @endforeach

            </ul>
        </div>
    @endif
    {{-- Add to cart button --}}
    <div class="product-quantity">
        <div class="quantity-wrapper">
            <div class="quantity">
                <span  class="minus">
                    <a wire:click.prevent="removeFromCartQuantity()" href="">
                        -
                    </a>
                </span>
                <span class="number">{{ $cartQuantity }}</span>
                <span class="plus">
                    <a wire:click.prevent="addToCartQuantity()" href="">
                        +
                    </a>
                </span>
            </div>
        </div>
        <a wire:click.prevent="addToCart()" href="" class="shop-btn">
            <span>
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.25357 3.32575C8.25357 4.00929 8.25193 4.69283 8.25467 5.37583C8.25576 5.68424 8.31536 5.74439 8.62431 5.74439C9.964 5.74603 11.3031 5.74275 12.6428 5.74603C13.2728 5.74767 13.7397 6.05663 13.9246 6.58104C14.2209 7.42098 13.614 8.24232 12.6762 8.25052C11.5919 8.25982 10.5075 8.25271 9.4232 8.25271C9.17714 8.25271 8.93107 8.25216 8.68501 8.25271C8.2913 8.2538 8.25412 8.29154 8.25412 8.69838C8.25357 10.0195 8.25686 11.3412 8.25248 12.6624C8.25029 13.2836 7.92603 13.7544 7.39891 13.9305C6.56448 14.2088 5.75848 13.6062 5.74863 12.6821C5.73824 11.7251 5.74645 10.7687 5.7459 9.81173C5.7459 9.41965 5.74754 9.02812 5.74535 8.63604C5.74371 8.30849 5.69012 8.2538 5.36204 8.25326C4.02235 8.25162 2.68321 8.25545 1.34352 8.25107C0.719613 8.24943 0.249902 7.93008 0.0710952 7.40348C-0.212153 6.57065 0.388245 5.75916 1.31017 5.74658C2.14843 5.73564 2.98669 5.74384 3.82495 5.74384C4.30779 5.74384 4.79062 5.74384 5.274 5.74384C5.72184 5.7433 5.7459 5.71869 5.7459 5.25716C5.7459 3.95406 5.74317 2.65096 5.74699 1.34786C5.74863 0.720643 6.0625 0.253102 6.58799 0.0704598C7.40875 -0.213893 8.21803 0.370671 8.25248 1.27349C8.25303 1.29154 8.25303 1.31013 8.25303 1.32817C8.25357 1.99531 8.25357 2.66026 8.25357 3.32575Z"
                        fill="white" />
                </svg>
            </span>
            <span>{{ __('website.add_to_cart') }}</span>
        </a>
    </div>
</div>

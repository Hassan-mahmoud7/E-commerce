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
            <P class="size-title">{{ __('website.variants') }}</P>
            <P class="size-title">{{ __('website.variants') }}</P>
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
</div>

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            {{-- <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title"
                        data-i18n="nav.dash.main">Dashboard</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li ><a class="menu-item" href="dashboard-ecommerce.html"
                            data-i18n="nav.dash.ecommerce">eCommerce</a>
                    </li>
                    <li><a class="menu-item" href="dashboard-crypto.html" data-i18n="nav.dash.crypto">Crypto</a>
                    </li>
                    <li><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Sales</a>
                    </li>
                </ul>
            </li> --}}

            @can('categories')
                <li class=" nav-item"><a href="#"><i class="la la-bars"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.categories') }}</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">{{ $categories_count }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.categories.index') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="la la-bars"></i>
                                {{ __('dashboard.category_dashboard') }}</a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('brands')
                <li class=" nav-item"><a href="#"><i class="la la-copyright"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.brands') }}</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">{{ $brands_count }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.brands.index') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="la la-copyright"></i>
                                {{ __('dashboard.brand_dashboard') }}</a>
                        </li>

                    </ul>
                </li>
            @endcan
            @can('coupons')
                <li class=" nav-item"><a href="#"><i class="la la-ticket"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.coupons') }}</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">{{ $coupons_count }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.coupons.index') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="la la-ticket"></i>
                                {{ __('dashboard.coupon_dashboard') }}</a>
                        </li>

                    </ul>
                </li>
            @endcan
            <li class=" nav-item"><a href="#"><i class="fa-solid fa-cart-flatbed"></i><span class="menu-title"
                data-i18n="nav.templates.main">{{ __('dashboard.products') }}</span><span
                class="badge badge badge-info badge-pill float-right mr-2">{{ $products_count }}</span></a>
                <ul class="menu-content">
                            @can('products')
                                <li><a class="menu-item" href="{{ route('dashboard.products.index') }}"
                                        data-i18n="nav.templates.vert.classic_menu"><i class="fa-solid fa-boxes-stacked"></i>
                                        {{ __('dashboard.product_dashboard') }}</a>
                                </li>
                                <li><a class="menu-item" href="{{ route('dashboard.products.create') }}"
                                        data-i18n="nav.templates.vert.classic_menu"><i class="la la-edit"></i>
                                        {{ __('dashboard.create_product') }}</a>
                                </li>
                            @endcan
                            @can('attributes')
                                <li><a class="menu-item" href="{{ route('dashboard.attributes.index') }}"
                                        data-i18n="nav.templates.vert.classic_menu"><i class="fa-solid fa-box-open"></i>`
                                        {{ __('dashboard.attribute_dashboard') }}</a>
                                </li>
                            @endcan

                    </ul>
                </li>
            <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">{{ __('dashboard.systems') }}</span><i
                    class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
                    data-original-title="Layouts"></i>
            </li>
            @can('faqs')
                <li class=" nav-item"><a href="#"><i class="la la-question"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.faqs') }}</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">{{ $faqs_count }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.faqs.index') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="la la-question"></i>
                                {{ __('dashboard.faq_dashboard') }}</a>
                        </li>

                    </ul>
                </li>
            @endcan
            @can('settings')
                <li data-i18n="nav.templates.main"><a class="menu-title" href="{{ route('dashboard.settings') }}">
                        <i class="ft ft-settings"></i> {{ __('dashboard.setting_dashboard') }}</a>
                </li>
            @endcan
            @can('roles')
                <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.role') }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.roles.index') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="ft-eye"></i>
                                {{ __('dashboard.role_dashboard') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.roles.create') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="ft-edit"></i>
                                {{ __('dashboard.create_role') }}</a>
                        </li>

                    </ul>
                </li>
            @endcan


            @can('admins')
                <li class=" nav-item"><a href="#"><i class="la la-user-tie"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.admins') }}</span><span
                            class="badge badge badge-info badge-pill float-right mr-2">{{ $admins_count }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.admins.index') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="ft-eye"></i>
                                {{ __('dashboard.admin_dashboard') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.admins.create') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="ft-edit"></i>
                                {{ __('dashboard.create_admin') }}</a>
                        </li>

                    </ul>
                </li>
            @endcan
            @can('users')
            <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title"
                        data-i18n="nav.templates.main">{{ __('dashboard.users') }}</span><span
                        class="badge badge badge-info badge-pill float-right mr-2">{{ $users_count }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ route('dashboard.users.index') }}"
                            data-i18n="nav.templates.vert.classic_menu"><i class="fa-solid fa-users"></i>
                            {{ __('dashboard.user_dashboard') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{ route('dashboard.users.create') }}"
                        data-i18n="nav.templates.vert.classic_menu"><i class="ft ft-user-plus"></i>
                        {{ __('dashboard.create_user') }}</a>
                    </li>
                </ul>
            </li>
            @endcan
            @can('global_shipping')
                <li class=" nav-item"><a href="#"><i class="la la-globe"></i><span class="menu-title"
                            data-i18n="nav.templates.main">{{ __('dashboard.shipping_management') }}</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="{{ route('dashboard.countries') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="la la-flag"></i>
                                {{ __('dashboard.country_dashboard') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.governorates') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="la la-flag-o"></i>
                                {{ __('dashboard.governorate_dashboard') }}</a>
                        </li>
                        <li><a class="menu-item" href="{{ route('dashboard.cities') }}"
                                data-i18n="nav.templates.vert.classic_menu"><i class="fa-solid fa-city"></i>
                                {{ __('dashboard.city_dashboard') }}</a>
                        </li>

                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>

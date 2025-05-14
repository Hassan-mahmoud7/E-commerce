<section id="icon-tabs">
    @if (!empty($successMessage))
        @if ($currentStep == 1)
            <div class="alert round bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2" role="alert">
                <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                <strong>{{ __('dashboard.well_done') }}!</strong> {{ $successMessage }}
            </div>       
        @endif
    @endif
    <ul class="wizard-timeline center-align">
        <li class="{{ $currentStep > 1 ? 'completed' : '' }}">
            <span class="step-num">1</span>
            <label>{{ __('dashboard.basic_information') }}</label>
        </li>
        <li class="{{ $currentStep > 2 ? 'completed' : '' }}">
            <span class="step-num">2</span>
            <label>{{ __('dashboard.product_variants') }}</label>
        </li>
        <li class="active {{ $currentStep > 3 ? 'completed' : '' }}">
            <span class="step-num">3</span>
            <label>{{ __('dashboard.product_images') }}</label>
        </li>
        <li class="{{ $currentStep == 4 ? 'completed' : '' }}">
            <span class="step-num">4</span>
            <label>{{ __('dashboard.confirmation') }}</label>
        </li>
    </ul>

    <form action="{{ route('dashboard.products.store') }}" enctype="multipart/form-data" method="POST" class="form">
        @csrf
        <div class="form-body">
            {{-- first step --}}
            <div class="{{ $currentStep != 1 ? 'd-none' : '' }}">
                <h3> {{ __('dashboard.step') }} 1</h3>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="name_en">{{ __('dashboard.product_name_en') }}</label>
                            <input type="text" wire:model.live="name_en" id="name_en"
                                class="form-control @error('name_en') is-invalid  @enderror"
                                placeholder="{{ __('dashboard.product_name_en') }}">
                            @error('name_en')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="name_ar">{{ __('dashboard.product_name_ar') }}</label>
                            <input type="text" wire:model.live="name_ar" id="name_ar"
                                class="form-control @error('name_ar') is-invalid  @enderror"
                                placeholder="{{ __('dashboard.product_name_ar') }}">
                            @error('name_ar')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="descdescription_en">{{ __('dashboard.product_description_en') }}</label>
                            <textarea wire:model="desc_en" id="description_en" class="form-control @error('desc_en') is-invalid  @enderror"
                                rows="5"></textarea>
                            @error('desc_en')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="descdescription_ar">{{ __('dashboard.product_description_ar') }}</label>
                            <textarea wire:model="desc_ar" id="descdescription_ar" class="form-control @error('desc_ar') is-invalid  @enderror"
                                rows="5"></textarea>
                            @error('desc_ar')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="small_desc_en">{{ __('dashboard.product_small_description_en') }}</label>
                            <textarea wire:model.live="small_desc_en" id="small_desc_en"
                                class="form-control @error('small_desc_en') is-invalid  @enderror" rows="2"></textarea>
                            @error('small_desc_en')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="small_desc_ar">{{ __('dashboard.product_small_description_ar') }}</label>
                            <textarea wire:model.live="small_desc_ar" id="small_desc_ar"
                                class="form-control @error('small_desc_ar') is-invalid  @enderror" rows="2"></textarea>
                            @error('small_desc_ar')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="">{{ __('dashboard.product_tags') }}</label>
                            <input type="text" wire:model="product_tags" id="tagInput"
                                class="form-control @error('product_tags') is-invalid  @enderror"
                                placeholder="{{ __('dashboard.product_tags') }}">
                            @error('product_tags')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="date">{{ __('dashboard.product_available_for') }}</label>
                            <input type="date" wire:model.live="available_for" id="date"
                                class="form-control @error('available_for') is-invalid  @enderror"
                                placeholder="{{ __('dashboard.product_available_for') }}">
                            @error('available_for')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="Category">{{ __('dashboard.category') }}</label>
                            <select wire:model.live="category_id" id="Category"
                                class="form-control custom-select @error('category_id') is-invalid  @enderror">
                                <option selected disabled>{{ __('dashboard.select_category') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="brand">{{ __('dashboard.brand') }}</label>
                            <select wire:model.live="brand_id" id="brand_id"
                                class="form-control custom-select @error('brand_id') is-invalid  @enderror">
                                <option selected disabled>{{ __('dashboard.select_brand') }}</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="sku">{{ __('dashboard.product_sku') }}</label>
                            <input type="text" wire:model.live="sku" id="sku"
                                class="form-control @error('sku') is-invalid  @enderror"
                                placeholder="{{ __('dashboard.product_sku') }}">
                            @error('sku')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-actions right">
                    <button type="button" wire:click="firstStepSubmit" class="btn btn-blue"><i
                            class="la la-arrow-circle-left"></i>
                        {{ __('dashboard.next') }}
                    </button>
                </div>
            </div>
            {{-- second step Product Variants --}}
            <div class="{{ $currentStep != 2 ? 'd-none' : '' }}">
                <h3> {{ __('dashboard.step') }} 2</h3>
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="has_variants">{{ __('dashboard.product_has_variants') }}</label>
                            <select wire:model.live="has_variants" id="has_variants"
                                class="form-control custom-select @error('has_variants') is-invalid  @enderror">
                                <option value="0" selected>{{ __('dashboard.no') }}</option>
                                <option value="1">{{ __('dashboard.yes') }}</option>
                            </select>
                            @error('has_variants')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    @if ($has_variants == 0)
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="price">{{ __('dashboard.product_price') }}</label>
                                <input type="number" wire:model.live="price" id="price"
                                    class="form-control @error('price') is-invalid  @enderror"
                                    placeholder="{{ __('dashboard.product_price') }}">
                                @error('price')
                                    <strong class="invalid-feedback"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if ($has_variants == 0)
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="manage_stock">{{ __('dashboard.product_manage_stock') }}</label>
                                <select wire:model.live="manage_stock" id="manage_stock"
                                    class="form-control custom-select @error('manage_stock') is-invalid  @enderror">
                                    <option value="0" selected>{{ __('dashboard.no') }}</option>
                                    <option value="1">{{ __('dashboard.yes') }}</option>
                                </select>
                                @error('manage_stock')
                                    <strong class="invalid-feedback"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        @if ($manage_stock == 1)
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="quantity">{{ __('dashboard.product_quantity') }}</label>
                                    <input type="number" wire:model.live="quantity" id="quantity"
                                        class="form-control @error('quantity') is-invalid  @enderror"
                                        placeholder="{{ __('dashboard.product_quantity') }}">
                                    @error('quantity')
                                        <strong class="invalid-feedback"> {{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    @endif
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="has_discount">{{ __('dashboard.product_has_discount') }}</label>
                            <select wire:model.live="has_discount" id="has_discount"
                                class="form-control custom-select @error('has_discount') is-invalid  @enderror">
                                <option value="0">{{ __('dashboard.no') }}
                                    {{ __('dashboard.product_discount') }}</option>
                                <option value="1" >{{ __('dashboard.yes') }}
                                    {{ __('dashboard.product_discount') }}</option>
                            </select>
                            @error('has_discount')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    @if ($has_discount == 1)
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="discount">{{ __('dashboard.product_discount') }}</label>
                                <input type="number" wire:model.live="discount" id="discount"
                                    class="form-control @error('discount') is-invalid  @enderror"
                                    placeholder="{{ __('dashboard.product_discount') }}">
                                @error('discount')
                                    <strong class="invalid-feedback"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="start_discount">{{ __('dashboard.product_start_discount') }}</label>
                                <input type="date" wire:model.live="start_discount" id="start_discount"
                                    class="form-control @error('start_discount') is-invalid  @enderror"
                                    placeholder="{{ __('dashboard.product_start_discount') }}">
                                @error('start_discount')
                                    <strong class="invalid-feedback"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="end_discount">{{ __('dashboard.product_end_discount') }}</label>
                                <input type="date" wire:model.live="end_discount" id="end_discount"
                                    class="form-control @error('end_discount') is-invalid  @enderror"
                                    placeholder="{{ __('dashboard.product_end_discount') }}">
                                @error('end_discount')
                                    <strong class="invalid-feedback"> {{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    @endif
                    @if ($has_variants == 1)
                        @for ($i = 0 ; $i < $valueRowCount; $i++)
                            <div class="col-12 row">
                                <hr class="col-11 bg-black mb-3 mt-3">
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="prices">{{ __('dashboard.product_price') }}</label>
                                        <input type="number" wire:model.live="prices.{{ $i }}" id="prices"
                                            class="form-control @error('prices.' . $i) is-invalid  @enderror"
                                            placeholder="{{ __('dashboard.product_price') }}">
                                        @error('prices.' . $i)
                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="quantities">{{ __('dashboard.product_quantity') }}</label>
                                        <input type="number" wire:model.live="quantities.{{ $i }}" id="quantities"
                                            class="form-control @error('quantities.' . $i) is-invalid  @enderror"
                                            placeholder="{{ __('dashboard.product_quantity') }}">
                                        @error('quantities.'. $i)
                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                @forelse ($attributes as $attribute)
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="attribute">{{ __('dashboard.product') }} {{ $attribute->name }}</label>
                                        <select wire:model.live="attributeValues.{{ $i }}.{{ $attribute->id }}" id="attribute"
                                            class="form-control custom-select @error('attributeValues.' . $i . '.' . $attribute->id) is-invalid  @enderror">
                                            <option selected>{{ __('dashboard.select') }}</option>
                                            @foreach ($attribute->attributeValues as $item)
                                                 <option value="{{ $item->id }}">{{ $item->value }}</option>
                                            @endforeach
                                        </select>
                                        @error('attributeValues.' . $i . '.' . $attribute->id)
                                            <strong class="invalid-feedback"> {{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                @empty
                                  <div class="col-md-6 col-12 alert alert-warning m-auto text-center">
                                    {{ __('dashboard.no_attribute') }}
                                  </div>  
                                @endforelse
                                
                            </div>
                        @endfor
                    @endif
                </div>

                <hr class="w-100 bg-black mb-1 mt-3">
                    @if ($has_variants == 1)
                        <button type="button" wire:click="addNewVariant" class="btn btn-success m-1 pull-lift"><i
                            class="ft ft-plus"></i>
                        {{ __('dashboard.add_new_variant') }}
                    </button>
                        @if ($valueRowCount > 1)
                            <button type="button" wire:click="removeVariant" class="btn btn-danger m-1 pull-lift"><i
                                    class="ft ft-minus"></i>
                                {{ __('dashboard.remove_variant') }}
                            </button>
                        @endif
                        
                    @endif
                    <button type="button" wire:click="secondStepSubmit" class="btn btn-blue m-1 pull-right "><i
                        class="la la-arrow-circle-left"></i>
                        {{ __('dashboard.next') }}
                    </button>
                    <button type="button" wire:click="backStep(1)" class="btn btn-warning m-1 pull-right "><i
                            class="la la-arrow-circle-right"></i>
                        {{ __('dashboard.back') }}
                    </button>
            </div>
            {{-- third step Product Images --}}
            <div class="{{ $currentStep != 3 ? 'd-none' : '' }}">
                <h3> {{ __('dashboard.step') }} 3</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="images">{{ __('dashboard.product_images') }}</label>
                            <input type="file" wire:model.live="images" id="images" multiple
                                class="form-control @error('images') is-invalid  @enderror">
                            @error('images')
                                <strong class="invalid-feedback"> {{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    @if ($images)
                        <div class="row justify-content-center m-auto">
                            @foreach ($images as $key => $image)
                                <div class="position-relative col-lg-4 col-md-6  col-12 w-100 mb-2"
                                    style="height: 300px;">
                                    <!-- Image -->
                                    <img class="img-thumbnail img-fluid rounded-md"
                                        src="{{ $image->temporaryUrl() }}"
                                        style="object-fit: fill; height: 100%; width: 100%;">
                                    <!-- Buttons -->
                                    <div class="position-absolute" style="top: 10px; right: 8%;">
                                        <!-- Fullscreen Button -->
                                        <button type="button" title="{{ __('dashboard.fullscreen') }}"
                                            wire:click="openFullscreen({{ $key }})"
                                            class="btn btn-primary"><i class="fa fa-expand"></i></button>
                                        <!-- Delete Button -->
                                        <button type="button" title="{{ __('dashboard.delete') }}"
                                            wire:click="deleteImage({{ $key }})" class="btn btn-danger"><i
                                                class="la la-trash"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif


                </div>
                <!-- Fullscreen Modal (Optional) -->
                <div wire:ignore.self class="modal fade" id="fullscreenModal" tabindex="-1"
                    aria-labelledby="fullscreenModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="{{ $fullscreenImage }}" class="img-fluid w-100" id="fullscreenImage"
                                    alt="Full Screen Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions right">
                    <button type="button" wire:click="backStep(2)" class="btn btn-warning mr-1"><i
                            class="la la-arrow-circle-right"></i>
                        {{ __('dashboard.back') }}
                    </button>
                    <button type="button" wire:click="ThirdStepSubmit" class="btn btn-blue"><i
                            class="la la-arrow-circle-left"></i>
                        {{ __('dashboard.next') }}
                    </button>
                </div>
            </div>
            {{-- Confirm Step Display Data --}}
            <div class="{{ $currentStep != 4 ? 'd-none' : '' }}">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('dashboard.product_name') }}</th>
                                <th>{{ __('dashboard.product_name_ar') }}</th>
                                <th>{{ __('dashboard.product_description') }}</th>
                                <th>{{ __('dashboard.product_description_ar') }}</th>
                                <th>{{ __('dashboard.product_small_description') }}</th>
                                <th>{{ __('dashboard.product_small_description_ar') }}</th>
                                <th>{{ __('dashboard.product_price') }}</th>
                                <th>{{ __('dashboard.product_quantity') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $name_en }}</td>
                                <td>{{ $name_ar }}</td>
                                <td>{{ $desc_en }}</td>
                                <td>{{ $desc_ar }}</td>
                                <td>{{ $small_desc_en }}</td>
                                <td>{{ $small_desc_ar }}</td>
                                <td>{{ $price }}</td>
                                <td>{{ $quantity }}</td>
                            </tr>
                        </tbody>

                    </table>

                </div>

                <div class="form-actions right">
                    <button type="button" wire:click="backStep(3)" class="btn btn-warning mr-1"><i
                            class="la la-arrow-circle-right"></i>
                        {{ __('dashboard.back') }}
                    </button>
                    <button type="button" wire:click="submitForm" class="btn btn-primary"><i
                            class="la la-check-square-o"></i>
                        {{ __('dashboard.save') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>

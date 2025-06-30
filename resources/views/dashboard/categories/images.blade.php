<div id="carouselExampleControls_{{ $category->id }}" class="carousel slide">
                <img src="{{ asset($category->image) }}" loading="lazy"
                    class="d-block w-100 m-auto" alt="...">
    <div class="position-absolute" style="top: 5px; right: 4%;">
        <!-- Fullscreen Button -->
        <button type="button" title="{{ __('dashboard.fullscreen') }}" wire:click="openFullscreen({{ $category->id }})"
            data-toggle="modal" data-target="#fullscreen__{{ $category->id }}" class="btn btn-outline-primary"><i
                class="fa fa-expand"></i></button>
    </div>
</div>

<!-- Fullscreen Modal -->
<div class="modal fade" id="fullscreen__{{ $category->id }}" tabindex="-1" aria-labelledby="fullscreenLabel__{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content w-100">
            <div class="modal-header">
                <h5 class="modal-title" id="fullscreenLabel__{{ $category->id }}">{{ __('dashboard.fullscreen') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
           
                    
                                <img src="{{ asset($category->image) }}" loading="lazy"
                                    class="d-block w-100" alt="...">
                          
           
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
            </div>
        </div>
    </div>
</div>

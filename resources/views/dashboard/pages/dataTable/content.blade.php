<div id="carouselExampleControls_{{ $item->id }}" class="carousel slide">
    <div class="position-absolute" style="top: 5px; right: 4%;">
        <!-- Fullscreen Button -->
        <button type="button" title="{{ __('dashboard.fullscreen') }}" wire:click="openFullscreen({{ $item->id }})"
            data-toggle="modal" data-target="#fullscreen_content__{{ $item->id }}" class="btn btn-outline-primary">{{ __('dashboard.show_content') }} <i
                class="fa fa-expand"></i></button>
    </div>
</div>

<!-- Fullscreen Modal -->
<div class="modal fade" id="fullscreen_content__{{ $item->id }}" tabindex="-1"
    aria-labelledby="fullscreenLabel__{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 90%; width: 90%;">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="fullscreenLabel__{{ $item->id }}">{{ __('dashboard.fullscreen') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <p class="d-block w-100 m-auto">{!! $item->content !!}</p>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
            </div>
        </div>
    </div>
</div>

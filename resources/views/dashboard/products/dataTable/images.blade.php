<div id="carouselExampleControls_{{ $item->id }}" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($item->images as $key => $image)
            <div class="carousel-item @if($key === 0) active @endif">
                <img src="{{ asset('assets/img/uploads/products/' . $image->file_name) }}" loading="lazy"
                    class="d-block w-100 m-auto" alt="...">
            </div>
        @endforeach

    </div>
    <a href="#carouselExampleControls_{{ $item->id }}" class="carousel-control-prev" type="button"
        data-target="#carouselExampleControls_{{ $item->id }}" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a href="#carouselExampleControls_{{ $item->id }}" class="carousel-control-next" type="button"
        data-target="#carouselExampleControls_{{ $item->id }}" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <div class="position-absolute" style="top: 5px; right: 4%;">
        <!-- Fullscreen Button -->
        <button type="button" title="{{ __('dashboard.fullscreen') }}" wire:click="openFullscreen({{ $key }})"
            data-toggle="modal" data-target="#fullscreen__{{ $item->id }}" class="btn btn-outline-primary"><i
                class="fa fa-expand"></i></button>
    </div>
</div>

<!-- Fullscreen Modal -->
<div class="modal fade" id="fullscreen__{{ $item->id }}" tabindex="-1" aria-labelledby="fullscreenLabel__{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fullscreenLabel__{{ $item->id }}">{{ __('dashboard.fullscreen') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="carouselExampleControlsModal_{{ $item->id }}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($item->images as $key => $image)
                            <div class="carousel-item  @if($key === 0) active @endif">
                                <img src="{{ asset('assets/img/uploads/products/' . $image->file_name) }}" loading="lazy"
                                    class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                
                    </div>
                    <a href="#carouselExampleControlsModal_{{ $item->id }}" class="carousel-control-prev" type="button"
                        data-target="#carouselExampleControlsModal_{{ $item->id }}" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a href="#carouselExampleControlsModal_{{ $item->id }}" class="carousel-control-next" type="button"
                        data-target="#carouselExampleControlsModal_{{ $item->id }}" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
            </div>
        </div>
    </div>
</div>

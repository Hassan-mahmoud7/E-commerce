<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard.create_slider') }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="createSlider" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @include('dashboard.includes.validations-errors')
                    <fieldset class="form-group floating-label-form-group">
                        <label for="note_en">{{ __('dashboard.slider_note_en') }}</label>
                        <input type="text" name="note[en]" class="form-control" id="note_en" placeholder="{{ __('dashboard.slider_note_en') }}">
                    </fieldset>
                    <fieldset class="form-group floating-label-form-group">
                        <label for="note_ar">{{ __('dashboard.slider_note_ar') }}</label>
                        <input type="text" name="note[ar]" class="form-control" id="note_ar" placeholder="{{ __('dashboard.slider_note_ar') }}">
                    </fieldset>
                   
                    <fieldset class="form-group floating-label-form-group">
                        <label for="singleImage">{{ __('dashboard.slider_image') }}</label>
                        <input type="file" name="file_name" class="form-control" id="singleImage" placeholder="Password">
                    </fieldset>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                    <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('dashboard.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

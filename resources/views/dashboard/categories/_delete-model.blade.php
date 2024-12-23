<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">
        <div class="modal fade text-left" id="Delete-{{ $category->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" category="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-warning" id="myModalLabel1">
                            {{ __('dashboard.warning') . ' ' . __('dashboard.category') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5><b>{{ __('dashboard.delete_msg') }}</b></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary"
                            data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">{{ __('dashboard.delete') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

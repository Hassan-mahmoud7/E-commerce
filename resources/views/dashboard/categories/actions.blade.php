<form class="m-auto" action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST">
    @csrf
    @method('DELETE')
<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
       {{-- edit --}}
       <a class="btn btn-outline-info" href="{{ route('dashboard.categories.edit', $category->id) }}"><i
        class="ft-edit-3"> {{ __('dashboard.edit') }}</i> </a>
       {{-- status --}}
       <a class="btn {{ $category->status == 0 ? 'btn-outline-success' : 'btn-outline-black' }}"
        href="{{ route('dashboard.categories.status', $category->id) }}">
        <i class="{{ $category->status == 0 ? 'la la-toggle-on' : 'la la-toggle-off' }}"></i>
        {{ $category->status == 0 ? __('dashboard.active') : __('dashboard.not_active') }}</a>
        {{-- DELETE --}}
            <button class="btn btn-outline-danger delete_confirm" data-toggle="modal" data-target="#Delete-{{ $category->id }}">
                <i class="ft-trash-2"></i> {{ __('dashboard.delete') }}</button>
            </div>
        </div>
        {{-- @include('dashboard.categories._delete-model') --}}
    </form>

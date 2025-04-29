<div>
    <!-- Contact Messages Page -->
    <div class="email-app-list">
        <div class="card-body">
            <fieldset class="form-group position-relative has-icon-left m-0 pb-1">
                <input type="text" wire:model.live="itemSearch" class="form-control" placeholder="Search email">
                <div class="form-control-position">
                    <i class="ft-search"></i>
                </div>
            </fieldset>
        </div>
        <!-- إضافة شريط تمرير -->
        <div class="list-group overflow-auto" style="max-height: 600px;">
            @forelse ($messages as $message)
                <a wire:click.prevent="showMessage({{ $message->id }})" href="#"
                    class="@if ($message->id == $openMessageId) bg-info @endif media border-0">
                    <div class="media-left pr-1 m-auto h-100">
                        <span class="avatar avatar-md ">
                            <span class="media-object rounded-circle"><img
                                    src="{{ asset('assets/img/uploads/users/user_profile.jpg') }}"
                                    alt=""></span>
                        </span>
                    </div>
                    <div class="media-body w-100 @if ($message->id == $openMessageId) text-white @endif">
                        <h6
                            class="list-group-item-heading text-bold-500 @if ($message->id == $openMessageId) text-white @endif">
                            {{ $message->name }}
                            <span class="float-right">
                                <span class="font-small-2 primary">{{ $message->created_at->diffForHumans() }}</span>
                            </span>
                        </h6>
                        <p class="list-group-item-text text-truncate text-bold-600 mb-0">{{ $message->subject }}</p>
                        <p class="list-group-item-text mb-0">{{ Str::limit($message->message, 30) }}<span
                                class="float-right primary">
                                <span
                                    class="badge {{ $message->is_read == false ? 'badge-danger' : 'badge-success' }} mr-1">
                                    {{ $message->is_read == false ? __('dashboard.contact_new') . $message->is_read : __('dashboard.contact_readed') }}</span>
                                <i
                                    class="font-medium-1 ft-star lighten-3 @if ($message->is_starred == 1) warning @else blue-grey @endif"></i></span>
                        </p>
                    </div>
                </a>
            @empty
                <div class="text-center p-3">{{ __('dashboard.no_message_found') }}</div>
            @endforelse
            {{-- {{ $messages->links('vendor.pagination.bootstrap-4') }} --}}
        </div>
    </div>
</div>

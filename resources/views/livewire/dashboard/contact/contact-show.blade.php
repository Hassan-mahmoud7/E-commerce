<div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="card email-app-details d-none d-block">
                <div class="card-content">
                    @if ($msg)
                        <!-- Email Options (Buttons) -->
                        <div class="email-app-options card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button wire:click.prevent="replayMsg({{ $msg->id }})" type="button"
                                            class="btn btn-sm btn-outline-primary" data-toggle="tooltip"
                                            data-placement="top" title="{{ __('dashboard.contact_replay') }}"
                                            data-original-title="Replay"><i class="la la-reply"></i></button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary"
                                            data-toggle="tooltip" data-placement="top"
                                            data-original-title="Report SPAM"><i class="ft-alert-octagon"></i></button>
                                        <button type="button"
                                            wire:click.prevent="@if ($msg->deleted_at != null) foreceDelete({{ $msg->id }}) @else deleteMessage({{ $msg->id }}) @endif"
                                            class="btn btn-sm btn-outline-danger" data-toggle="tooltip"
                                            title="@if ($msg->deleted_at != null) {{ __('dashboard.forece_delete') }} @else {{ __('dashboard.delete') }} @endif"
                                            data-placement="top" data-original-title="Delete"><i
                                                class="ft-trash-2"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 text-right">
                                    <div class="btn-group ml-1">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">{{ __('dashboard.more') }}</button>
                                        <div class="dropdown-menu">
                                            <a wire:click.prevent="markAsUnread({{ $msg->id }})"
                                                class="dropdown-item"
                                                href="#">{{ __('dashboard.mark_unreaded') }}</a>
                                            @if ($msg->deleted_at != null)
                                                <a wire:click.prevent="restoreMessage({{ $msg->id }})"
                                                    class="dropdown-item"
                                                    href="#">{{ __('dashboard.restore_message') }}</a>
                                            @endif
                                            <a wire:click.prevent="foreceDelete({{ $msg->id }})"
                                                class="dropdown-item"
                                                href="#">{{ __('dashboard.forece_delete') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="email-app-title card-body">
                            <p class="list-group-item-text">
                                <span class="primary">
                                    <span
                                        class="badge badge-primary">{{ __('dashboard.contact_show_messages') }}</span>
                                    <a wire:click.prevent="markIsStarred({{ $msg->id }})" href="#"><i
                                            class="float-right font-medium-3 ft-star @if ($msg->is_starred == 1 || $is_starred == 1) warning @endif"></i></a></span>
                            </p>
                        </div>
                        <div class="media-list">
                            <div id="headingCollapse1" class="card-header p-0">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true"
                                    aria-controls="collapse1"
                                    class="collapsed email-app-sender media border-0 bg-blue-grey bg-lighten-5">
                                    <div class="media-left pr-1">
                                        <span class="avatar avatar-md">
                                            <img class="media-object rounded-circle"
                                                src="{{ asset('assets/img/uploads/users/user_profile.jpg') }}"
                                                alt="Generic placeholder image">
                                        </span>
                                    </div>
                                    <div class="media-body w-100">
                                        <h6 class="list-group-item-heading">{{ $msg->name }}</h6>
                                        <p class="list-group-item-text">{{ $msg->subject }}
                                            <span
                                                class="float-right text muted">{{ $msg->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1"
                                class="card-collapse collapse" aria-expanded="true">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p>{{ $msg->email }}</p>
                                        <p>{{ $msg->phone }}</p>
                                        <p>{{ $msg->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center p-3">
                            <h5>{{ __('dashboard.no_message_found') }}</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

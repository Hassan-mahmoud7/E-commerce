  <div>
      <div class="form-group text-center">
          <!-- Dropup Button -->
          <div class="btn-group dropup w-100 mt-2">
              <button class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="ft-mail"></i> {{ __('dashboard.actions') }}
              </button>
              <div class="dropdown-menu w-100 text-center">
                  <a wire:click.prevent="markAllAsRead" href="#" class="dropdown-item">
                      <i class="ft-trash-2"></i> {{ __('dashboard.mark_all_as_read') }}
                  </a>
                  <a wire:click.prevent="deleteMarkAllAsReaded" href="#" class="dropdown-item">
                      <i class="ft-trash-2"></i> {{ __('dashboard.delete_all_read_contacts') }}
                  </a>
                  <a wire:click.prevent="deleteMarkAllAnswered" href="#" class="dropdown-item">
                      <i class="ft-trash-2"></i> {{ __('dashboard.delete_all_answered_contacts') }}
                  </a>
              </div>
          </div>
      </div>

      <h6 class="text-muted text-bold-500 mb-1">{{ __('dashboard.contact_message') }}</h6>
      <div class="list-group list-group-messages">
          <a wire:click.prevent="selectScreen('inbox')" href="#"
              class="list-group-item @if ($screen == 'inbox') active @else list-group-item-action @endif border-0">
              <i class="ft-inbox mr-1"></i> {{ __('dashboard.inbox') }}
              <span class="badge badge-secondary  float-right">{{ $inboxCount }}</span>
          </a>
          <a wire:click.prevent="selectScreen('readed')" href="#"
              class="list-group-item list-group-item-action border-0 @if ($screen == 'readed') active @endif"><i
                  class="la la-paper-plane-o mr-1"></i> {{ __('dashboard.readed') }}
              <span class="badge badge-secondary  float-right">{{ $readedCount }}</span></a>
          <a wire:click.prevent="selectScreen('answered')" href="#"
              class="list-group-item list-group-item-action border-0 @if ($screen == 'answered') active @endif"><i
                  class="ft-file mr-1"></i>{{ __('dashboard.answered') }}
              <span class="badge badge-secondary  float-right">{{ $answeredCount }}</span></a>
          <a wire:click.prevent="selectScreen('starred')" href="#"
              class="list-group-item list-group-item-action border-0 @if ($screen == 'starred') active @endif"><i
                  class="ft-star mr-1"></i>
              {{ __('dashboard.starred') }}<span class="badge badge-secondary  float-right">{{ $starredCount }}</span>
          </a>
          <a wire:click.prevent="selectScreen('treshed')" href="#"
              class="list-group-item list-group-item-action border-0 @if ($screen == 'treshed') active @endif"><i
                  class="ft-trash-2 mr-1"></i>
              {{ __('dashboard.trash') }}<span
                  class="badge badge-secondary  float-right">{{ $trashedCount }}</span></a>
      </div>
  </div>

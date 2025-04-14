 <div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard.create_user') }}</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="" method="POST" id="createUser" class="form">
                 @csrf
                 <div class="modal-body"> 
                    {{-- validations errors --}}
                     <div class="alert alert-danger" id="error_div" style="display: none;">
                        <ul id="error_list"></ul>
                    </div> 
                     <fieldset class="form-group floating-label-form-group">
                         <label for="name">{{ __('dashboard.user_name') }}</label>
                         <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                             placeholder="{{ __('dashboard.enter') }} {{ __('dashboard.user_name') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="email">{{ __('dashboard.user_email') }}</label>
                         <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}"
                             placeholder="{{ __('dashboard.enter') }} {{ __('dashboard.user_email') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="user_phone">{{ __('dashboard.user_phone') }}</label>
                         <input type="tel" name="phone" class="form-control" id="user_phone"
                             placeholder="{{ __('dashboard.enter') }} {{ __('dashboard.user_phone') }}" value="{{ old('phone') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="password">{{ __('dashboard.user_password') }}</label>
                         <input type="password" name="password" class="form-control" id="user_password"
                             placeholder="{{ __('dashboard.enter') }} {{ __('dashboard.user_password') }}" value="{{ old('password') }}">
                     </fieldset>
                        <fieldset class="form-group floating-label-form-group">
                            <label for="password_confirmation">{{ __('dashboard.user_confirm_password') }}</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="password_confirmation"
                                placeholder="{{ __('dashboard.enter') }} {{ __('dashboard.user_confirm_password') }}"
                                value="{{ old('password_confirmation') }}">
                        </fieldset>

                        @livewire('general.address-drop-down-debpendent')

                     <fieldset class="form-group floating-label-form-group mt-2">
                         <label>{{ __('dashboard.user_status') }}</label>
                         <div class="input-group">
                             <div class="d-inline-block custom-control custom-radio mr-1">
                                 <input type="radio" name="status" checked class="custom-control-input"
                                     id="yes" value="1">
                                 <label class="custom-control-label" for="yes">{{ __('dashboard.active') }}</label>
                             </div>
                             <div class="d-inline-block custom-control custom-radio">
                                 <input type="radio" name="status" class="custom-control-input" id="no"
                                     value="0">
                                 <label class="custom-control-label"
                                     for="no">{{ __('dashboard.not_active') }}</label>
                             </div>
                         </div>
                     </fieldset>
                 </div>
                 <div class="modal-footer">
                     <button type="reset" class="btn btn-outline-secondary btn-lg"
                         data-dismiss="modal">{{ __('dashboard.cancel') }}</button>
                     <button type="submit" class="btn btn-outline-primary btn-lg">{{ __('dashboard.save') }}</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

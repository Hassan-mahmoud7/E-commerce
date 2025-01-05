 <div class="modal fade text-left" id="faqCreateModer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h3 class="modal-title" id="myModalLabel35"> {{ __('dashboard.create_faq') }}</h3>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="" method="POST" id="create_faq" class="form">
                 @csrf
                 <div class="modal-body">
                    {{-- validations errors --}}
                    <div class="alert alert-danger" id="error_div" style="display: none;">
                        <ul id="error_list"></ul>
                    </div> 
                     <fieldset class="form-group floating-label-form-group">
                         <label for="question_ar">{{ __('dashboard.faq_question_ar') }}</label>
                         <input type="text" name="question[ar]" class="form-control" id="question_ar" value="{{ old('question.ar') }}"
                             placeholder="{{ __('dashboard.enter') . " " . __('dashboard.faq_question_ar') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="question_en">{{ __('dashboard.faq_question_en') }}</label>
                         <input type="text" name="question[en]" class="form-control" id="question_en" value="{{ old('question.en') }}"
                             placeholder="{{ __('dashboard.enter') . " " . __('dashboard.faq_question_en') }}">
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="answer_ar">{{ __('dashboard.faq_answer_ar') }}</label>
                         <textarea name="answer[ar]" class="form-control" id="answer_ar"></textarea>
                     </fieldset>
                     <fieldset class="form-group floating-label-form-group">
                         <label for="answer_en">{{ __('dashboard.faq_answer_en') }}</label>
                         <textarea name="answer[en]" class="form-control" id="answer_en"> </textarea>
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

<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب قبول الحقل :attribute.',
    'accepted_if' => 'يجب قبول الحقل :attribute عندما يكون :other هو :value.',
    'active_url' => 'الحقل :attribute يجب أن يكون رابطًا صالحًا.',
    'after' => 'الحقل :attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => 'الحقل :attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => 'الحقل :attribute يجب أن يحتوي على حروف فقط.',
    'alpha_dash' => 'الحقل :attribute يجب أن يحتوي على حروف، أرقام، شرطات، وشرطات سفلية فقط.',
    'alpha_num' => 'الحقل :attribute يجب أن يحتوي على حروف وأرقام فقط.',
    'array' => 'الحقل :attribute يجب أن يكون مصفوفة.',
    'ascii' => 'الحقل :attribute يجب أن يحتوي على أحرف وأرقام أحادية البايت فقط.',
    'before' => 'الحقل :attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => 'الحقل :attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على عناصر بين :min و :max.',
        'file' => 'الحقل :attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون بين :min و :max.',
        'string' => 'الحقل :attribute يجب أن يحتوي على بين :min و :max حروف.',
    ],
    'boolean' => 'الحقل :attribute يجب أن يكون صحيحًا أو خطأ.',
    'can' => 'الحقل :attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => 'تأكيد الحقل :attribute غير متطابق.',
    'contains' => 'الحقل :attribute يفتقد قيمة مطلوبة.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'الحقل :attribute يجب أن يكون تاريخًا صالحًا.',
    'date_equals' => 'الحقل :attribute يجب أن يكون تاريخًا مساويًا لـ :date.',
    'date_format' => 'الحقل :attribute يجب أن يتطابق مع التنسيق :format.',
    'decimal' => 'الحقل :attribute يجب أن يحتوي على :decimal منازل عشرية.',
    'declined' => 'يجب رفض الحقل :attribute.',
    'declined_if' => 'يجب رفض الحقل :attribute عندما يكون :other هو :value.',
    'different' => 'الحقل :attribute و :other يجب أن يكونا مختلفين.',
    'digits' => 'الحقل :attribute يجب أن يكون :digits أرقام.',
    'digits_between' => 'الحقل :attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => 'الحقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'الحقل :attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => 'الحقل :attribute يجب ألا ينتهي بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'الحقل :attribute يجب ألا يبدأ بأحد القيم التالية: :values.',
    'email' => 'الحقل :attribute يجب أن يكون بريدًا إلكترونيًا صالحًا.',
    'ends_with' => 'الحقل :attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'exists' => 'القيمة المحددة للحقل :attribute غير صالحة.',
    'extensions' => 'الحقل :attribute يجب أن يكون ملفًا بواحدة من الامتدادات التالية: :values.',
    'file' => 'الحقل :attribute يجب أن يكون ملفًا.',
    'filled' => 'الحقل :attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على أكثر من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أكبر من :value.',
        'string' => 'الحقل :attribute يجب أن يكون أكبر من :value حروف.',
    ],
    'gte' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :value عنصر أو أكثر.',
        'file' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'string' => 'الحقل :attribute يجب أن يكون أكبر من أو يساوي :value حروف.',
    ],
    'hex_color' => 'الحقل :attribute يجب أن يكون لونًا سداسيًا صالحًا.',
    'image' => 'الحقل :attribute يجب أن يكون صورة.',
    'in' => 'الحقل :attribute المحدد غير صالح.',
    'in_array' => 'الحقل :attribute يجب أن يكون موجودًا في :other.',
    'integer' => 'الحقل :attribute يجب أن يكون عددًا صحيحًا.',
    'ip' => 'الحقل :attribute يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => 'الحقل :attribute يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => 'الحقل :attribute يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => 'الحقل :attribute يجب أن يكون نصًا JSON صالحًا.',
    'list' => 'الحقل :attribute يجب أن يكون قائمة.',
    'lowercase' => 'الحقل :attribute يجب أن يكون بحروف صغيرة.',
    'lt' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على أقل من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أقل من :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أقل من :value.',
        'string' => 'الحقل :attribute يجب أن يكون أقل من :value حروف.',
    ],
    'lte' => [
        'array' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :value عنصر.',
        'file' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value.',
        'string' => 'الحقل :attribute يجب أن يكون أقل من أو يساوي :value حروف.',
    ],
    'mac_address' => 'الحقل :attribute يجب أن يكون عنوان MAC صالحًا.',
    'max' => [
        'array' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :max عنصر.',
        'file' => 'الحقل :attribute يجب ألا يكون أكبر من :max كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب ألا يكون أكبر من :max.',
        'string' => 'الحقل :attribute يجب ألا يكون أكبر من :max حروف.',
    ],
    'max_digits' => 'الحقل :attribute يجب ألا يحتوي على أكثر من :max أرقام.',
    'mimes' => 'الحقل :attribute يجب أن يكون ملفًا من النوع: :values.',
    'mimetypes' => 'الحقل :attribute يجب أن يكون ملفًا من النوع: :values.',
    'min' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على الأقل على :min عنصر.',
        'file' => 'الحقل :attribute يجب ألا يقل عن :min كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب ألا يقل عن :min.',
        'string' => 'الحقل :attribute يجب ألا يقل عن :min حروف.',
    ],
    'min_digits' => 'الحقل :attribute يجب أن يحتوي على الأقل على :min أرقام.',
    'missing' => 'الحقل :attribute يجب أن يكون مفقودًا.',
    'missing_if' => 'الحقل :attribute يجب أن يكون مفقودًا عندما يكون :other هو :value.',
    'missing_unless' => 'الحقل :attribute يجب أن يكون مفقودًا إلا إذا كان :other هو :value.',
    'missing_with' => 'الحقل :attribute يجب أن يكون مفقودًا عندما يكون :values موجودًا.',
    'missing_with_all' => 'الحقل :attribute يجب أن يكون مفقودًا عندما تكون :values موجودة.',
    'multiple_of' => 'الحقل :attribute يجب أن يكون من مضاعفات :value.',
    'not_in' => 'الحقل :attribute المحدد غير صالح.',
    'not_regex' => 'صيغة الحقل :attribute غير صالحة.',
    'numeric' => 'الحقل :attribute يجب أن يكون رقمًا.',
    'password' => [
        'letters' => 'الحقل :attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => 'الحقل :attribute يجب أن يحتوي على حرف كبير وحرف صغير على الأقل.',
        'numbers' => 'الحقل :attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => 'الحقل :attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => 'القيمة المحددة للحقل :attribute ظهرت في تسريب بيانات. الرجاء اختيار قيمة مختلفة.',
    ],
    'present' => 'الحقل :attribute يجب أن يكون موجودًا.',
    'present_if' => 'الحقل :attribute يجب أن يكون موجودًا عندما يكون :other هو :value.',
    'present_unless' => 'الحقل :attribute يجب أن يكون موجودًا إلا إذا كان :other هو :value.',
    'present_with' => 'الحقل :attribute يجب أن يكون موجودًا عندما يكون :values موجودًا.',
    'present_with_all' => 'الحقل :attribute يجب أن يكون موجودًا عندما تكون القيم :values موجودة.',

    'prohibited' => 'الحقل :attribute محظور.',
    'prohibited_if' => 'الحقل :attribute محظور عندما يكون :other هو :value.',
    'prohibited_unless' => 'الحقل :attribute محظور إلا إذا كان :other في :values.',
    'regex' => 'صيغة الحقل :attribute غير صالحة.',
    'required' => 'الحقل :attribute مطلوب.',
    'required_if' => 'الحقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_unless' => 'الحقل :attribute مطلوب إلا إذا كان :other في :values.',
    'required_with' => 'الحقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_with_all' => 'الحقل :attribute مطلوب عندما تكون جميع :values موجودة.',
    'required_without' => 'الحقل :attribute مطلوب عندما تكون :values غير موجودة.',
    'required_without_all' => 'الحقل :attribute مطلوب عندما لا تكون أي من :values موجودة.',
    'same' => 'الحقل :attribute يجب أن يطابق :other.',
    'size' => [
        'array' => 'الحقل :attribute يجب أن يحتوي على :size عناصر.',
        'file' => 'الحقل :attribute يجب أن يكون :size كيلوبايت.',
        'numeric' => 'الحقل :attribute يجب أن يكون :size.',
        'string' => 'الحقل :attribute يجب أن يكون :size حروف.',
    ],
    'starts_with' => 'الحقل :attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => 'الحقل :attribute يجب أن يكون نصًا.',
    'timezone' => 'الحقل :attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => 'الحقل :attribute تم استخدامه بالفعل.',
    'uploaded' => 'فشل تحميل الحقل :attribute.',
    'uppercase' => 'الحقل :attribute يجب أن يكون بحروف كبيرة.',
    'url' => 'الحقل :attribute يجب أن يكون رابطًا صالحًا.',
    'ulid' => 'الحقل :attribute يجب أن يكون ULID صالحًا.',
    'uuid' => 'الحقل :attribute يجب أن يكون UUID صالحًا.',
    'required_array_keys' => 'الحقل :attribute يجب أن يحتوي على مدخلات لـ: :values.',
    'prohibits' => 'الحقل :attribute يمنع وجود :other.',
    'Invalid' => '!بيانات الاعتماد غير صالحة. يرجى المحاولة فى وقت لاحق',
    'error' => '!يرجى المحاولة فى وقت لاحق',
    
    

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
        'g-recaptcha-response' => [
            'required' => 'يرجى التأكد من أنك لست روبوتًا.',
            'captcha' => 'خطأ في الكابتشا! حاول مرة أخرى لاحقًا أو اتصل بمسؤول الموقع.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'fu_name'               => 'الاسم كامل',
        'name'                  => 'الاسم',
        'username'              => 'اسم المُستخدم',
        'email'                 => 'البريد الالكتروني',
        'first_name'            => 'الاسم الأول',
        'last_name'             => 'اسم العائلة',
        'old_password'          => 'كلمة المرور القديمة',
        'password'              => 'كلمة المرور',
        'password_confirmation' => 'تأكيد كلمة المرور',
        'city'                  => 'المدينة',
        'country'               => 'الدولة',
        'address'               => 'عنوان السكن',
        'phone'                 => 'الهاتف',
        'mobile'                => 'الجوال',
        'age'                   => 'العمر',
        'sex'                   => 'الجنس',
        'gender'                => 'النوع',
        'day'                   => 'اليوم',
        'month'                 => 'الشهر',
        'year'                  => 'السنة',
        'hour'                  => 'ساعة',
        'minute'                => 'دقيقة',
        'second'                => 'ثانية',
        'title'                 => 'العنوان',
        'content'               => 'المُحتوى',
        'description'           => 'الوصف',
        'excerpt'               => 'المُلخص',
        'date'                  => 'التاريخ',
        'time'                  => 'الوقت',
        'available'             => 'مُتاح',
        'size'                  => 'الحجم',
        'image'                 => 'الصورة',
        'rate'                  => 'التقيم',
        'id'                    => 'العنصر',
        'code'                  => 'الكود',
        'token'                 => 'الكود',
        'STC'                   => 'بسنت',
        'name.ar'               => 'الاسم باللغة العربية',
        'name.en'               => 'الاسم باللغة الانجليزية',
        'role.ar'               => 'الاسم باللغة العربية',
        'role.en'               => 'الاسم باللغة الانجليزية',
        'subcategory_id'        => 'الفئة الفرعية',
        'Code'                  => 'كود',
        'SubCat_ID'             => 'الفئة الفرعية ',
        'edit'                  => 'تعديل',
        'permission'            => 'إذن',
        'status'                => 'حالة',
        'price'                 => 'السعر',
        'logo'                  => 'شعار',
        'start_date'            => 'تاريخ البدء',
        'end_date'              => 'تاريخ الانتهاء',
        'limit'                 => 'الحد',
        'discount_percentage'   => 'نسبة الخصم',
        'answer.ar'             => 'السؤال باللغة العربية',
        'answer.en'             => 'السؤال باللغة بالأنجليزى',
        'question.ar'           => 'الجواب باللغة العربية',
        'question.en'           => 'الجواب باللغة الانجليزية',
        'answer.ar'             => 'الإجابة باللغة العربية',
        'answer.en'             => 'الإجابة باللغة الإنجليزية',
        'question.ar'           => 'سؤال باللغة العربية',
        'question.en'           => 'سؤال باللغة الانجليزية', 
        'site_name.ar'          => 'اسم الموقع باللغة العربية',
        'site_name.en'          => 'اسم الموقع باللغة الانجليزية',
        'small_desc.ar'         => 'وصف صغير باللغة العربية',
        'small_desc.en'         => 'وصف صغير باللغة الانجليزية',
        'meta_desc.ar'          => 'الوصف التعريفي باللغة العربية',
        'meta_desc.en'          => 'الوصف التعريفي باللغة الانجليزية',
        'address.ar'            => 'العنوان باللغة العربية',
        'address.en'            => 'العنوان باللغة الانجليزية',
        'email_support'         => 'دعم البريد الإلكتروني',
        'favicon'               => 'الرمز المفضل',
        'facebook'              => 'فيسبوك',
        'twitter'               => 'تويتر',
        'instagram'             => 'انستجرام',
        'youtube'               => 'يوتيوب',
        'site_copyright'        => 'حقوق الطبع والنشر للموقع',
        'promotion_video_url'   => 'رابط فيديو الترويج',
        'value.*.en'              => 'قيمة السمة بالانجليزى',
        'value.*.ar'              => 'قيمة السمة بالعربى',

    ],
];

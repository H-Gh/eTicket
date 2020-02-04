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

    'accepted' => ':attribute باید قبول شود.',
    'active_url' => ':attribute باید یک آدرس صحیح باشد.',
    'after' => ':attribute باید تاریخی بعد از :date باشد.',
    'after_or_equal' => ':attribute باید مساوی و یا بعد از :date باشد.',
    'alpha' => ':attribute می تواند شامل حروف باشد/',
    'alpha_dash' => ':attribute می تواند شامل حروف، اعداد، خطوط تیره و زیرخط باشد.',
    'alpha_num' => ':attribute میتواند شامل حروف و اعداد باشد.',
    'array' => ':attribute باید بک آرایه باشد/',
    'before' => ':attribute باید یک تاریخ قبل از :date باشد.',
    'before_or_equal' => ':attribute باید یک تاریخ مساوی و یا قبل از :date باشد.',
    'between' => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file' => ':attribute باید بین :min و :max کیلوبایت باشد.',
        'string' => ':attribute باید بین :min و :max کاراکتر باشد.',
        'array' => ':attribute باید بین :min و :max مورد باشد.',
    ],
    'boolean' => ':attribute باید true و یا false باشد.',
    'confirmed' => 'تصدیق :attribute همخوانی ندارد.',
    'date' => ':attribute یک تاریخ صحیح نیست.',
    'date_equals' => ':attribute باید یک تاریخ مساوی با :date باشد.',
    'date_format' => ':attribute با فرمت :format همخوانی ندارد.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم داشته باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم داشته باشد.',
    'dimensions' => ':attribute نسبت تصویر مانعتبر دارد.',
    'distinct' => 'فیلد :attribute مقدار تکراری دارد.',
    'email' => ':attribute باید یک آدرس ایمیل صحیح باشد.',
    'ends_with' => ':attribute باید با یکی از :values خاتمه یابد.',
    'exists' => ':attribute انتخاب شده نامعتبر است.',
    'file' => ':attribute باید یک فایل باشد.',
    'filled' => 'فیلد :attribute باید یک مقدار داشته باشد.',
    'gt' => [
        'numeric' => ':attribute باید بزرگتر از :value باشد.',
        'file' => ':attribute باید بیشتر از :value کیلوبایت باشد.',
        'string' => ':attribute باید کاراکترهایی بیشتر از :value داشته باشد.',
        'array' => ':attribute باید مواردی بیشتر از :value داشته باشد.',
    ],
    'gte' => [
        'numeric' => ':attribute باید بیشتر از یا مساوی با :value باشد.',
        'file' => ':attribute باید بیشتر از یا مساوی با :value کیلوبایت باشد.',
        'string' =>
            ':attribute باید کاراکترهایی بیشتر از یا مساوی با :value داشته باشد.',
        'array' => ':attribute باید مواردی بیشتر از یا مساوی با :value داشته باشد.',
    ],
    'image' => ':attribute باید تصویر باشد.',
    'in' => ':attribute انتخاب شده نامعتبر است.',
    'in_array' => 'فیلد :attribute در ترتیب :other وجود ندارد.',
    'integer' => ':attribute باید یک عدد صحیح باشد.',
    'ip' => ':attribute باید یک آدرس صحیح IP باشد.',
    'ipv4' => ':attribute باید یک آدرس صحیح IP4 باشد.',
    'ipv6' => ':attribute باید یک آدرس صحیح IP6 باشد.',
    'json' => ':attribute باید یک رشته JSON معتبر باشد.',
    'lt' => [
        'numeric' => ':attribute باید کمتر از :value باشد.',
        'file' => ':attribute باید کمتر از :value کیلوبایت باشد.',
        'string' => ':attribute باید کاراکتر هایی کمتر از :value داشته باشد.',
        'array' => ':attribute باید مواردی کمتر از :value داشته باشد.',
    ],
    'lte' => [
        'numeric' => ':attribute باید کمتر از یا مساوی با :value باشد.',
        'file' => ':attribute باید کمتر از یا مساوی با :value کیلوبایت باشد.',
        'string' =>
            ':attribute باید کاراکتر هایی کمتر از یا مساوی با :value داشته باشد.',
        'array' => ':attribute باید مواردی کمتر از یا مساوی با :value داشته باشد.',
    ],
    'max' => [
        'numeric' => ':attribute باید بیشتر از یا مساوی با :value باشد.',
        'file' => ':attribute باید بیشتر از یا مساوی با :value کیلوبایت باشد.',
        'string' =>
            ':attribute باید کاراکتر هایی بیشتر از یا مساوی با :value داشته باشد.',
        'array' => ':attribute باید مواردی بیشتر از یا مساوی با :value داشته باشد.',
    ],
    'mimes' => ':attribute باید فایلی در یکی از انواع :values باشد.',
    'mimetypes' => ':attribute باید فایلی در یکی از انواع :values باشد.',
    'min' => [
        'numeric' => ':attribute باید حداقل :min باشد.',
        'file' => ':attribute باید حداقل :min کیلوبایت باشد.',
        'string' => ':attribute باید حداقل :min کاراکتر باشد.',
        'array' => ':attribute باید حداقل :min مورد داشته باشد.',
    ],
    'not_in' => ':attribute انتخاب شده معتبر نست.',
    'not_regex' => 'فرمت :attribute نامعتبر است.',
    'numeric' => ':attribute باید یک عدد باشد.',
    'password' => 'کلمه عبور صحیح نیست.',
    'present' => 'فیلد :attribute باید پر شود.',
    'regex' => 'فرمت :attribute صحیح نیست.',
    'required' => 'فیلد :attribute ضروری است.',
    'required_if' =>
        'فیلد :attribute زمانی که مقدار :other برابر با :value است، ضروری است.',
    'required_unless' =>
        'فیلد :attribute تا زمانی که مقدار :other درا :values است، ضروری است.',
    'required_with' =>
        'فیلد :attribute زمانی که :values ارائه شده است، ضروری است.',
    'required_with_all' =>
        'فیلد :attribute زمانی که :values ارائه شده است، ضروری است.',
    'required_without' =>
        'فیلد :attribute زمانی که :values ارائه نشده است، ضروری است.',
    'required_without_all' =>
        'فیلد :attribute زمانی که هیچ کدام از :values ارائه نشده است، ضروری است.',
    'same' => ':attribute و :other باید همخوانی داشته باشند.',
    'size' => [
        'numeric' => ':attribute باید به اندازه :size باشد.',
        'file' => ':attribute باید :size کیلوبایت باشد.',
        'string' => ':attribute باید :size کاراکتر داشته باشد.',
        'array' => ':attribute باید :size مورد داشته باشد.',
    ],
    'starts_with' => ':attribute باید با یکی از :values شروع شود.',
    'string' => ':attribute باید یک رشته از حروف باشد.',
    'timezone' => ':attribute باید یک zone معتبر باشد.',
    'unique' => ':attribute قبلاً استفاده شده است.',
    'uploaded' => 'عمل آپلود :attribute ناموفق بود.',
    'url' => 'فرمت :attribute صحیح نیست.',
    'uuid' => ':attribute باید یک UUID معتبر باشد.',

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
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];

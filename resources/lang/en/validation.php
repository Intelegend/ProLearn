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

    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute недействительный URL.',
    'after'                => ':attribute должна быть дата после :date.',
    'after_or_equal'       => ':attribute должна быть дата после или равна :date.',
    'alpha'                => ':attribute может содержать только буквы.',
    'alpha_dash'           => ':attribute может содержать только буквы, цифры и тире.',
    'alpha_num'            => ':attribute может содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должно быть дата до:date.',
    'before_or_equal'      => ':attribute должна быть дата до или равна :date.',
    'between'              => [
        'numeric' => ':attribute должно быть между :min и :max.',
        'file'    => ':attribute должно быть между :min и :max килобайт.',
        'string'  => ':attribute должно быть между :min и :max персонажей.',
        'array'   => ':attribute должно быть между :min и :max предметы.',
    ],
    'boolean'              => ':attribute поле должно быть истинным или ложным.',
    'confirmed'            => ':attribute подтверждение не совпадает.',
    'date'                 => ':attribute недействительная дата.',
    'date_format'          => ':attribute не соответствует формату :format.',
    'different'            => ':attribute и :other должен быть другим.',
    'digits'               => ':attribute должен быть :digits цифрой.',
    'digits_between'       => ':attribute должно быть между :min и :max цифрой.',
    'dimensions'           => ':attribute имеет неверные размеры изображения.',
    'distinct'             => ':attribute поле имеет повторяющееся значение.',
    'email'                => ':attribute адрес эл. почты должен быть действительным.',
    'exists'               => 'Выбранный :attribute является недействительным.',
    'file'                 => ':attribute должен быть файл.',
    'filled'               => ':attribute поле должно иметь значение.',
    'image'                => ':attribute должно быть изображение.',
    'in'                   => 'Выбранный :attribute является недействительным.',
    'in_array'             => ':attribute поле не существует в :other.',
    'integer'              => ':attribute должно быть целым числом.',
    'ip'                   => ':attribute должен быть действительный IP-адрес.',
    'json'                 => ':attribute должна быть допустимой строкой JSON.',
    'max'                  => [
        'numeric' => ':attribute не может быть больше чем :max.',
        'file'    => ':attribute не может быть больше чем :max килобайт.',
        'string'  => ':attribute не может быть больше чем :max персонажи.',
        'array'   => ':attribute не может быть больше чем :max предметы.',
    ],
    'mimes'                => ':attribute должен быть файл типа: :values.',
    'mimetypes'            => ':attribute должен быть файл типа: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file'    => ':attribute должен быть не менее :min килобайт.',
        'string'  => ':attribute должен быть не менее :min персонажи.',
        'array'   => ':attribute должен быть не менее :min предметы.',
    ],
    'not_in'               => 'Выбранный :attribute является недействительным.',
    'numeric'              => ':attribute должны быть числом.',
    'present'              => ':attribute поле должно присутствовать.',
    'regex'                => ':attribute неверный формат.',
    'required'             => ':attribute поле, обязательное для заполнения.',
    'required_if'          => ':attribute Поле, обязательное для заполнения :other является :value.',
    'required_unless'      => ':attribute поле обязательно для заполнения, если :other в :values.',
    'required_with'        => ':attribute поле обязательно для заполнения, когда :values настоящее.',
    'required_with_all'    => ':attribute поле обязательно для заполнения, когда :values настоящее.',
    'required_without'     => ':attribute поле обязательно для заполнения, когда :values нет.',
    'required_without_all' => ':attribute поле обязательно для заполнения, когда ни один из :values настоящее.',
    'same'                 => ':attribute и :other должен соответствовать.',
    'size'                 => [
        'numeric' => ':attribute должно быть :size.',
        'file'    => ':attribute должно быть :size килобайт.',
        'string'  => ':attribute должно быть :size персонажи.',
        'array'   => ':attribute должен содержать :size предметы.',
    ],
    'string'               => ':attribute должен быть строкой.',
    'timezone'             => ':attribute должна быть действительной зоной.',
    'unique'               => ':attribute уже использовано.',
    'uploaded'             => ':attribute не удалось загрузить.',
    'url'                  => ':attribute неверный формат.',

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
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

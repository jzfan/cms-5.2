<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | 这个 following language lines contain 这个 default error messages used by
    | 这个 validator class. Some of 这个se rules have multiple versions such
    | as 这个 size rules. Feel free to tweak each of 这个se messages here.
    |
    */

    'accepted'             => '这个 :attribute 必须是 accepted.',
    'active_url'           => '这个 :attribute 不是 一个合法的 URL.',
    'after'                => '这个 :attribute 必须是 a date after :date.',
    'alpha'                => '这个 :attribute 只能保护英文字母.',
    'alpha_dash'           => '这个 :attribute 只能保护英文字母, numbers, and dashes.',
    'alpha_num'            => '这个 :attribute 只能保护英文字母 and numbers.',
    'array'                => '这个 :attribute 必须是 一个数组.',
    'before'               => '这个 :attribute 必须是 a date before :date.',
    'between'              => [
        'numeric' => '这个 :attribute 必须是 between :min and :max.',
        'file'    => '这个 :attribute 必须是 between :min and :max kilobytes.',
        'string'  => '这个 :attribute 必须是 between :min and :max characters.',
        'array'   => '这个 :attribute must have between :min and :max items.',
    ],
    'boolean'              => '这个 :attribute 字段 必须是 真 或 假.',
    'confirmed'            => '这个 :attribute 确认不匹配.',
    'date'                 => '这个 :attribute 不是 一个合法的 date.',
    'date_format'          => '这个 :attribute does not match 这个 format :format.',
    'different'            => '这个 :attribute and :o这个r 必须是 different.',
    'digits'               => '这个 :attribute 必须是 :digits digits.',
    'digits_between'       => '这个 :attribute 必须是 between :min and :max digits.',
    'distinct'             => '这个 :attribute 字段 has a duplicate value.',
    'email'                => '这个 :attribute 必须是 一个合法的 邮箱地址.',
    'exists'               => '这个 selected :attribute is invalid.',
    'filled'               => '这个 :attribute 字段 是 必填项.',
    'image'                => '这个 :attribute 必须是 an image.',
    'in'                   => '这个 selected :attribute is invalid.',
    'in_array'             => '这个 :attribute 字段 does not exist in :o这个r.',
    'integer'              => '这个 :attribute 必须是 an integer.',
    'ip'                   => '这个 :attribute 必须是 一个合法的 IP address.',
    'json'                 => '这个 :attribute 必须是 一个合法的 JSON string.',
    'max'                  => [
        'numeric' => '这个 :attribute may not be greater than :max.',
        'file'    => '这个 :attribute may not be greater than :max kilobytes.',
        'string'  => '这个 :attribute may not be greater than :max characters.',
        'array'   => '这个 :attribute may not have more than :max items.',
    ],
    'mimes'                => '这个 :attribute 必须是 a file of type: :values.',
    'min'                  => [
        'numeric' => '这个 :attribute 必须是 at least :min.',
        'file'    => '这个 :attribute 必须是 at least :min kilobytes.',
        'string'  => '这个 :attribute 必须是 at least :min characters.',
        'array'   => '这个 :attribute must have at least :min items.',
    ],
    'not_in'               => '这个 selected :attribute is invalid.',
    'numeric'              => '这个 :attribute 必须是 a number.',
    'present'              => '这个 :attribute 字段 必须是 present.',
    'regex'                => '这个 :attribute 格式 错误.',
    'required'             => '这个 :attribute 字段 是 必填项.',
    'required_if'          => '这个 :attribute 字段 是 必填项 when :o这个r is :value.',
    'required_unless'      => '这个 :attribute 字段 是 必填项 unless :o这个r is in :values.',
    'required_with'        => '这个 :attribute 字段 是 必填项 when :values is present.',
    'required_with_all'    => '这个 :attribute 字段 是 必填项 when :values is present.',
    'required_without'     => '这个 :attribute 字段 是 必填项 when :values 不是 present.',
    'required_without_all' => '这个 :attribute 字段 是 必填项 when none of :values are present.',
    'same'                 => '这个 :attribute and :o这个r must match.',
    'size'                 => [
        'numeric' => '这个 :attribute 必须是 :size.',
        'file'    => '这个 :attribute 必须是 :size kilobytes.',
        'string'  => '这个 :attribute 必须是 :size characters.',
        'array'   => '这个 :attribute must contain :size items.',
    ],
    'string'               => '这个 :attribute 必须是 a string.',
    'timezone'             => '这个 :attribute 必须是 一个合法的 zone.',
    'unique'               => '这个 :attribute 已经 被 占用.',
    'url'                  => '这个 :attribute 格式 错误.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using 这个
    | convention "attribute.rule" to name 这个 lines. This makes it quick to
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
    | 这个 following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];

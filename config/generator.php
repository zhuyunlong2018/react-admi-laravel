<?php

return [
    'name' => 'Laravel-generator',
    //the url to access
    'route'=>'generator',
    //the rule  can be used by the field
    'rules'=>[
        'string',
        'email',
        'file',
        'numeric',
        'array',
        'alpha',
        'alpha_dash',
        'alpha_num',
        'date',
        'boolean',
        'distinct',
        'phone',
        'custom'
    ],
    //difine your custom value
    'customDummys'=>[
        'DummyAuthor'=>env('DUMMY_AUTHOR','ZhuYunLong2018'),
        'DummyEmail' => '920200256@qq.com',
        'DummyCreateDate' => date("Y-m-d"),
        'DummyCreateTime' => date("H:i"),
    ]
];
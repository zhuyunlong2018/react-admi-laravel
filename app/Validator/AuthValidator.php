<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 16:23
 */

namespace App\Validator;


class AuthValidator extends BaseValidator
{
    protected $rules = [
        "admin/login" => [
            'userName' => 'required|max:255',
            'password' => 'required|string|min:6'
        ],

        "admin/register" => [
            'userName' => 'required|max:255',
            'password' => 'required|string|min:6'
        ],
    ];

}
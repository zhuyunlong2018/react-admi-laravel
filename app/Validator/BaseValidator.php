<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/20
 * Time: 15:34
 */

namespace App\Validator;

use App\Exceptions\DevException;
use App\Exceptions\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BaseValidator
{
    protected $rules = [];

    public function __construct(Request $request) {
        if (!isset($this->rules[$request->route()->uri])) {
            throw new DevException();
        }
        $validator = Validator::make($request->input(), $this->rules[$request->route()->uri]);
        if($validator->fails()) {
            throw new ValidationException([
                'msg' => $validator->getMessageBag()
            ]);
        }
    }
}
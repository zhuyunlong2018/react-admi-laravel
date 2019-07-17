<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 11:21
 */

namespace App\Models;


use App\Utils\Utils;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Self_;

class BaseModel extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = null;

    public function getAttribute($key)
    {
        $key = Str::snake($key);
        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        $key = Str::snake($key);
        return parent::setAttribute($key, $value);
    }

    public static function getOne($condition) {
        return self::where($condition)->first();
    }
}
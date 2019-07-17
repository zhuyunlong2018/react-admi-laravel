<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/17
 * Time: 16:19
 */

namespace App\Utils;


class Utils
{
    /**
     * 获取一个固定长度的随机字符串
     * @param $length
     * @return null|string
     */
    public static function getRandChar($length = 32)
    {
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol) - 1;
        for ($i = 0; $i < $length; $i++) {
            $str .= $strPol[rand(0, $max)];
        }
        return $str;
    }

    /**
     * 驼峰命名法转下划线风格
     * @param $str
     * @return string
     */
    public static function toUnderScore($str)
    {
        $array = array();
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] == strtolower($str[$i])) {
                $array[] = $str[$i];
            } else {
                if ($i > 0) {
                    $array[] = '_';
                }
                $array[] = strtolower($str[$i]);
            }
        }
        $result = implode('', $array);
        return $result;
    }

    /**
     * 下划线风格转驼峰命名法
     * @param $str
     * @return string
     */
    public static function toCamelCase($str)
    {

        $array = explode('_', $str);
        $result = '';
        foreach ($array as $value) {
            $result .= ucfirst($value);
        }
        return $result;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/23
 * Time: 10:58
 */

namespace App\Validator;


use App\Exceptions\DevException;
use Illuminate\Http\Request;

abstract class BaseValidator
{
    /**
     * 当前访问路由
     * @var
     */
    protected $uri;

    /**
     * 验证器规则，key=>value,key为访问的路由，value为参数对应规则
     * @var array
     */
    protected $rules = [];

    protected $message = [];

    protected $attributes = [];

    protected $customRules = [];

    protected $request = null;

    public function __construct(string $uri, Request $request) {
        $this->uri = $uri;
        $this->request = $request;
        $this->makeCustomRules();
    }

    /**
     * 自定义规则在此地方注册
     */
    abstract protected function makeCustomRules(): void ;


    /**
     * 通过自定义规则名称获取验证函数
     * @param string $rule
     * @return callable
     * @throws DevException
     */
    protected function getCustomRules(string $rule): callable {
        if (!isset($this->customRules[$rule])) {
            throw new DevException(['msg' => "验证器自定义规则错误"]);
        }
        return $this->customRules[$rule];
    }

    /**
     * 设置自定义的验证规则
     * @param string $rule 规则名称
     * @param callable $ruleCall 规则验证回调函数
     * @throws DevException
     */
    protected function setCustomRules(string $rule, callable $ruleCall): void {
        if (isset($this->customRules[$rule])) {
            throw new DevException(['msg' => "验证器自定义规则重复了"]);
        }
        $this->customRules[$rule] = $ruleCall;
    }

    /**
     * 获取规则
     * @return array
     */
    public function getRules() : array {
        if (isset($this->rules[$this->uri])) {
            return $this->rules[$this->uri];
        }
        return [];
    }

    /**
     * 获取自定义验证提示
     * @return array
     */
    public function getMessage() : array {
        return $this->message;
    }

    /**
     * 获取自定义属性描述
     * @return array
     */
    public function getCustomAttributes() : array {
        return $this->attributes;
    }
}
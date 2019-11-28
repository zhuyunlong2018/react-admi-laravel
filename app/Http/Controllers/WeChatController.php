<?php
/**
 * Created by PhpStorm.
 * User: ZhuYunLong2018
 * Email: 920200256@qq.com
 * Date: 2019/11/28
 * Time: 10:51
 */

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Log;

class WeChatController extends Controller
{

    public function index()
    {

        $wechat = app('wechat.official_account');
        $result = $wechat->qrcode->temporary('foo', 600);
        echo "hello";die;
        $qrcodeUrl = $wechat->qrcode->url($result['ticket']);

        return view('index', compact('qrcodeUrl'));
    }

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function($message){
            if ($message['Event'] === 'SCAN') {
                $openid = $message['FromUserName'];

                $user = User::where('openid', $openid)->first();

                if ($user) {
                    // TODO: 这里根据情况加入其它鉴权逻辑

                    // 使用 laravel-passport 的个人访问令牌
                    $token = $user->createToken($user->name)->accessToken;

                    // 广播扫码登录的消息，以便前端处理
                    event(new WechatScanLogin($token));

                    \Log::info('haha login');
                    return '登录成功！';
                }

                return '失败鸟';
            } else {
                // TODO： 用户不存在时，可以直接回返登录失败，也可以创建新的用户并登录该用户再返回
                return '登录失败';
            }
        }, \EasyWeChat\Kernel\Messages\Message::EVENT);

        return $app->server->serve();
    }
}
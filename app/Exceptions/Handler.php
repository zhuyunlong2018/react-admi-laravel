<?php

namespace App\Exceptions;

use App\Utils\Response;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (config('app.debug')) {
//            return parent::render($request, $exception);
        }
        return $this->handle($request, $exception);
    }

    /**
     * 接管exception处理
     * @param $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Exception $exception)
    {
        // 只处理自定义的APIException异常
        if ($exception instanceof ApiException) {
            return Response::error($exception);
        } else {
            //TODO 切换为api响应并记录log
            return parent::render($request, $exception);
        }
    }
}

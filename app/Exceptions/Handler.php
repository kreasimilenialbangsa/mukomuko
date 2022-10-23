<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request,Throwable $exception)
    // {
    //    //Model and Route not found error
    //     if($exception instanceof NotFoundHttpException || $exception instanceof ModelNotFoundException){
    //      return   $this->NotFOUNDExceptionMessage($request,$exception);
    //     }

    // }

    // //Model and route not found message
    // public function NotFOUNDExceptionMessage($request,Exception $exception)
    // {
    //     # code...
    //     return $request->expectsJson() ?
    //     response( [
    //         'data'=>[
    //             'message'=>'not found'
    //         ]
    //         ],404)
    //     :parent::render($request,$exception);
    // }
}

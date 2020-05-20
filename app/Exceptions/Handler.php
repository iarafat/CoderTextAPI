<?php

namespace App\Exceptions;

use App\Abstractions\APIResponse;
use Error;
use ErrorException;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use ReflectionException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
     * @param Throwable $exception
     * @return void
     *
     * @throws Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Throwable $exception
     * @return Response
     *
     * @throws Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return (new APIResponse())->errors($exception->getMessage(), 422, $exception->errors());
        } elseif ($exception instanceof AuthenticationException) {
            return (new APIResponse())->errors($exception->getMessage(), 401);
        } elseif (
            $exception instanceof QueryException ||
            $exception instanceof ErrorException ||
            $exception instanceof Error ||
            $exception instanceof ReflectionException
        ) {
            return (new APIResponse())->errors($exception->getMessage(), 500);
        } elseif ($exception instanceof ModelNotFoundException) {
            return (new APIResponse())->errors($exception->getMessage(), 404);
        } elseif ($exception instanceof AccessDeniedHttpException) {
            return (new APIResponse())->errors($exception->getMessage(), 403);
        } elseif ($exception instanceof NotFoundHttpException) {
            $email = setting('contact-form.receive_email');
            return (new APIResponse())->errors("Whoops, looks like something went wrong. If error persists, contact $email", 404);
        }

        return parent::render($request, $exception);
    }
}

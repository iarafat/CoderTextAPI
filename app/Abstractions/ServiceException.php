<?php


namespace App\Abstractions;

use App\Exceptions\CustomException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class ServiceException
{
    /**
     * Throw the exception
     *
     * @param $exception
     * @throws CustomException
     */
    public static function throw($exception)
    {
        if ($exception instanceof ValidationException) {
            $status = 422;
        } elseif ($exception instanceof AuthenticationException) {
            $status = 401;
        } elseif (
            $exception instanceof QueryException ||
            $exception instanceof \ErrorException ||
            $exception instanceof \Error ||
            $exception instanceof \ReflectionException
        ) {
            $status = 500;
        } elseif ($exception instanceof ModelNotFoundException) {
            $status = 404;
        } else {
            $status = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
        }

        if ($exception instanceof CustomException) {
            throw new CustomException($exception->getMessage(), $exception->getCode());
        }

        throw new CustomException($exception->getMessage(), $status);
    }
}
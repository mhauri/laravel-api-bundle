<?php

declare(strict_types=1);

namespace MHauri\ApiBundle\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Debug\ExceptionHandler as IlluminateExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use MHauri\ApiBundle\Http\ApiResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class ExceptionHandler implements IlluminateExceptionHandler
{
    private IlluminateExceptionHandler $appExceptionHandler;

    public function __construct(IlluminateExceptionHandler $appExceptionHandler)
    {
        $this->appExceptionHandler = $appExceptionHandler;
    }

    public function report(Throwable $e)
    {
        $this->appExceptionHandler->report($e);
    }

    public function shouldReport(Throwable $e)
    {
        return $this->appExceptionHandler->shouldReport($e);
    }

    public function render($request, Throwable $e)
    {
        switch (get_class($e)) {
            case ValidationException::class:
                $response = ApiResponse::badRequest(Response::HTTP_BAD_REQUEST, $e->getMessage());
                break;
            case RouteNotFoundException::class:
                $response = ApiResponse::badRequest(Response::HTTP_NOT_FOUND, $e->getMessage());
                break;
            case NotFoundHttpException::class:
                $response = ApiResponse::notFound();
                break;
            case ThrottleRequestsException::class:
            case TooManyRequestsHttpException::class:
                $response = ApiResponse::tooManyRequests();
                break;
            case AuthenticationException::class:
                $response = ApiResponse::unauthorized();
                break;
            default:
                $response = ApiResponse::badRequest(Response::HTTP_INTERNAL_SERVER_ERROR, $exception->getMessage());
                break;
        }

        return $response;
    }

    public function renderForConsole($output, Throwable $e)
    {
        $this->appExceptionHandler->renderForConsole($output, $e);
    }
}

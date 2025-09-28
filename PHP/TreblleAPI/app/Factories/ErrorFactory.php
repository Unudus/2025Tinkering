<?php

namespace App\Factories;

use Http\Discovery\Exception\NotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use JustSteveKing\Tools\Http\Enums\Status;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Throwable;
use Treblle\ApiResponses\Data\ApiError;
use Treblle\ApiResponses\Responses\ErrorResponse;

class ErrorFactory
{
    public static function create(Throwable $exception, Request $request) :ErrorResponse
    {
        return match( $exception::class ) {
            NotFoundHttpException::class,
            ModelNotFoundException::class => new ErrorResponse(
                data: new ApiError(
                    title: 'Resource Not Found',
                    detail: 'The resource you are looking for does not exist',
                    instance: $request->fullUrl(),
                    code: 'HTTP-404',
                    link: 'https://docs.treblle.com/errors/404'
                ),
                status: Status::NOT_FOUND
            ),

            MethodNotAllowedHttpException::class,
            MethodNotAllowedException::class => new ErrorResponse(
                data: new ApiError(
                    title: 'Method not allowed',
                    detail: "You are trying todo a {$request->method()} request on an end-point that only allows {(MethodNotAllowedException)$exception->getAllowedMethods()}",
                    instance: $request->fullUrl(),
                    code: 'HTTP-405',
                    link: 'https://docs.treblle.com/errors/405'
                ),
                status: STATUS::METHOD_NOT_ALLOWED
            ),

            default => new ErrorResponse(
                data: new ApiError(
                    title: 'Something went wrong.',
                    detail: 'Something when wrong.',
                    instance: $request->fullUrl(),
                    code: 'SER-500',
                    link: 'https://docs.treblle.com/errors/500'
                )
            )
        };
    }
}
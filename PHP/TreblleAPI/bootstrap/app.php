<?php

use App\Factories\ErrorFactory;
use App\Http\Middleware\SunsetMiddleware;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use JustSteveKing\Tools\Http\Enums\Status;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Treblle\ApiResponses\Data\ApiError;
use Treblle\ApiResponses\Responses\ErrorResponse;
use Treblle\ErrorCodes\Enums\ErrorCode;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api/routes.php',
        apiPrefix:'',
        commands: __DIR__.'/../routes/console/routes.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->alias([
            'sunset' => SunsetMiddleware::class,
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
        ]);

        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // If not using the tutor's exception class (clean no package option, although it's also fairly raw output)
        // $exceptions->render( function(Throwable $exception) {
        //         $status = $exception->getCode()?: 500;
        //         if ( class_implements($exception, HttpExceptionInterface::class) ) {
        //             /** @var HttpExceptionInterface $exception */
        //             $status = $exception->getStatusCode();
        //         }
        //         return new JsonResponse(
        //             data: [
        //                 'message' => $exception->getMessage()
        //             ],
        //             status: $status
        //         );
        //     }
        // );
        
        // using the tutor's exception handler ( following along, not good reference )
        $exceptions->render(function(UnprocessableEntityHttpException $exception, Request $request){
            return new JsonResponse(
                data: $exception->getMessage(),
                status: 422
            );
        });
        $exceptions->render(function (Throwable $exception, Illuminate\Http\Request|Request $request){
            return ErrorFactory::create($exception, $request);

            // non-factory method
            // return new ErrorResponse(
            //     data: new ApiError(
            //         title: 'Not Found',
            //         detail: $exception->getMessage(),
            //         instance: $request->path(),
            //         code: ErrorCode::NOT_FOUND->value,
            //         link: 'https://docs.domain.com/errors/not-found'
            //     ),
            //     status: Status::NOT_FOUND
            // );
        });
        
    })->create();

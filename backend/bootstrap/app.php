<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $shouldJson = function (Request $request) {
            // API/* hoặc client muốn JSON hoặc đang chạy unit test
            return $request->is('api/*')
                || $request->expectsJson()
                || $request->wantsJson()
                || app()->runningUnitTests();
        };

        $exceptions->render(function (Throwable $e, Request $request) use ($shouldJson) {

            if (! $shouldJson($request)) {
                return null; // để web request render bình thường
            }

            // 422 - Validate
            if ($e instanceof ValidationException) {
                return response()->json([
                    'status' => false,
                    'message' => 'Dữ liệu không hợp lệ',
                    'errors' => $e->errors(),
                ], 422);
            }

            // 404 - Model not found
            if ($e instanceof ModelNotFoundException) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không tìm thấy dữ liệu',
                    'errors' => $e->getMessage(),
                ], 404);
            }

            // 404 - Route not found
            if ($e instanceof NotFoundHttpException) {
                return response()->json([
                    'status' => false,
                    'message' => 'Route không tồn tại',
                    'errors' => $e->getMessage(),
                ], 404);
            }

            // HTTP exception khác (401/403/405/429...)
            if ($e instanceof HttpExceptionInterface) {
                return response()->json([
                    'status' => false,
                    'message' => 'Có lỗi xảy ra',
                    'errors' => $e->getMessage(),
                ], $e->getStatusCode());
            }

            // 500 - Lỗi hệ thống
            return response()->json([
                'status' => false,
                'message' => 'Lỗi hệ thống',
                'errors' => config('app.debug') ? $e->getMessage() : null,
            ], 500);
        });
    })->create();

<?php

namespace App\http\Controllers\V1\Services;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function __invoke(): Response
    {
        $services = Service::query()->simplePaginate(config('app.pagination.limit'));

        return new JsonResponse( data: $services );
    }
}
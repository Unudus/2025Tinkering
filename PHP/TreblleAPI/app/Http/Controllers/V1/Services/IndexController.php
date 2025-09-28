<?php

namespace App\http\Controllers\V1\Services;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function __invoke(): Response
    {
        $services = QueryBuilder::for( subject: Service::class )
            ->allowedIncludes( includes: ['checks'] )
            ->allowedFilters( filters: [
                'url'
            ])
            ->getEloquentBuilder()
            ->simplePaginate( perPage: config('app.pagination.limit') );

        
        return new JsonResponse( 
            data: ServiceResource::collection(
                resource: $services
        ));
    }
}
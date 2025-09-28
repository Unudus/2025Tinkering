<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\Link;

/** 
 * @property Service $resource
 */
class ServiceResource extends JsonApiResource
{
    
    public function toAttributes(Request $request) :array
    {
        return [

            'name' => $this->resource->name,
            'uri' => $this->resource->url,
            'created' => new DateResource( resource: $this->resource->created_at )
        ];
    }

    public function toRelationships(Request $request): array
    {
        return [
            'checks' => function(){
                return CheckResource::collection(
                    resource: $this->whenLoaded(
                        relationship: 'checks'
                    )
                );
            }
        ];
    }

    public function toLinks(Request $request): array
    {
        return [
            Link::self(route( 
                name: 'v1:services:show', 
                parameters: $this->resource
            ))
        ];
    }
}

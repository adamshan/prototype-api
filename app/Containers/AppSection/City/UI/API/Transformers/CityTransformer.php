<?php

namespace App\Containers\AppSection\City\UI\API\Transformers;

use App\Containers\AppSection\City\Models\City;
use App\Ship\Parents\Transformers\Transformer;

class CityTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(City $city): array
    {
        $response = [
            'object' => $city->getResourceKey(),
            'id' => $city->getHashedKey(),
            'created_at' => $city->created_at,
            'updated_at' => $city->updated_at,
            'readable_created_at' => $city->created_at->diffForHumans(),
            'readable_updated_at' => $city->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $city->id,
            // 'deleted_at' => $city->deleted_at,
        ], $response);

        return $response;
    }
}

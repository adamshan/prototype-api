<?php

namespace App\Containers\AppSection\Country\UI\API\Transformers;

use App\Containers\AppSection\Country\Models\Country;
use App\Ship\Parents\Transformers\Transformer;

class CountryTransformer extends Transformer
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

    public function transform(Country $country): array
    {
        $response = [
            'object' => $country->getResourceKey(),
            'id' => $country->getHashedKey(),
            'created_at' => $country->created_at,
            'updated_at' => $country->updated_at,
            'readable_created_at' => $country->created_at->diffForHumans(),
            'readable_updated_at' => $country->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $country->id,
            // 'deleted_at' => $country->deleted_at,
        ], $response);

        return $response;
    }
}

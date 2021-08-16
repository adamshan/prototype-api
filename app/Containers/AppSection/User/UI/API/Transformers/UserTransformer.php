<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use App\Containers\AppSection\Authorization\UI\API\Transformers\RoleTransformer;
use App\Containers\AppSection\City\UI\API\Transformers\CityTransformer;
use App\Containers\AppSection\Country\UI\API\Transformers\CountryTransformer;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class UserTransformer extends Transformer
{
    protected $availableIncludes = [
        'roles','country','city'
    ];

    protected $defaultIncludes = [
        'roles','country','city'
    ];

    public function transform(User $user): array
    {
        $response = [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
            'country_id' => $user->country_id,
            'city_id' => $user->city_id,
            'last_name' => $user->last_name,
            'first_name' => $user->first_name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'gender' => $user->gender,
            'phone_number' => $user->phone_number,
            'adresse' => $user->adresse,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'readable_created_at' => $user->created_at->diffForHumans(),
            'readable_updated_at' => $user->updated_at->diffForHumans(),
        ];

        $response = $this->ifAdmin([
            'real_id' => $user->id,
        ], $response);

        return $response;
    }

    public function includeRoles(User $user): Collection
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

    public function includeCountry(User $user): Item
    {
        return $this->item($user->country, new CountryTransformer());
    }

    public function includeCity(User $user): Item
    {
        return $this->item($user->city, new CityTransformer());
    }
}

<?php

namespace App\Containers\AppSection\City\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class CityRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}

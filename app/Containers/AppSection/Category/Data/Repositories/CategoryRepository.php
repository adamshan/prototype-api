<?php

namespace App\Containers\AppSection\Category\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class CategoryRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}

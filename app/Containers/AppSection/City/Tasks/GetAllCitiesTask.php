<?php

namespace App\Containers\AppSection\City\Tasks;

use App\Containers\AppSection\City\Data\Repositories\CityRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCitiesTask extends Task
{
    protected CityRepository $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}

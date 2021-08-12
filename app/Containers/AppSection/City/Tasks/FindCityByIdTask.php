<?php

namespace App\Containers\AppSection\City\Tasks;

use App\Containers\AppSection\City\Data\Repositories\CityRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCityByIdTask extends Task
{
    protected CityRepository $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

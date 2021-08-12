<?php

namespace App\Containers\AppSection\City\Tasks;

use App\Containers\AppSection\City\Data\Repositories\CityRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCityTask extends Task
{
    protected CityRepository $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\AppSection\City\Tasks;

use App\Containers\AppSection\City\Data\Repositories\CityRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteCityTask extends Task
{
    protected CityRepository $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id): ?int
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\AppSection\Country\Tasks;

use App\Containers\AppSection\Country\Data\Repositories\CountryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindCountryByIdTask extends Task
{
    protected CountryRepository $repository;

    public function __construct(CountryRepository $repository)
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

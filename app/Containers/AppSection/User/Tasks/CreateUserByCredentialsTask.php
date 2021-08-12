<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Hash;

class CreateUserByCredentialsTask extends Task
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(
        int $country_id,
        int $city_id,
        bool $isAdmin,
        string $email,
        string $password,
        string $last_name,
        string $first_name = null,
        string $gender = null,
        string $phone_number = null,
        string $adresse = null
    ): User
    {
        try {
            // create new user
            $user = $this->repository->create([
                'password' => Hash::make($password),
                'email' => $email,
                'last_name' => $last_name,
                'first_name' => $first_name,
                'gender' => $gender,
                'phone_number' => $phone_number,
                'is_admin' => $isAdmin,
                'country_id' => $country_id,
                'city_id' => $city_id,
                'adresse' => $adresse,
            ]);

        } catch (Exception $e) {
            throw new CreateResourceFailedException();
        }

        return $user;
    }
}

<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\UpdateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\UpdateUserRequest;
use App\Ship\Parents\Actions\Action;

class UpdateUserAction extends Action
{
    public function run(UpdateUserRequest $request): User
    {
        $sanitizedData = $request->sanitizeInput([
            'password',
            'last_name',
            'first_name',
            'gender',
            'country_id',
            'city_id',
            'phone_number',
            'adresse'
        ]);

        return app(UpdateUserTask::class)->run($sanitizedData, $request->id);
    }
}

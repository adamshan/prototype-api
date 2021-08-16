<?php

namespace App\Containers\AppSection\User\Actions;

use App\Containers\AppSection\Authorization\Tasks\AssignUserToRoleTask;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserByCredentialsTask;
use App\Containers\AppSection\User\UI\API\Requests\CreateAdminRequest;
use App\Ship\Parents\Actions\Action;

class CreateAdminAction extends Action
{ 
    public function run(CreateAdminRequest $request): User
    {
        $admin = app(CreateUserByCredentialsTask::class)->run(
            $request->country_id,
            $request->city_id,
            true,
            $request->email,
            $request->password,
            $request->last_name,
            $request->first_name,
            $request->gender,
            $request->phone_number,
            $request->adresse
        );

        // NOTE: if not using a single general role for all Admins, comment out that line below. And assign Roles
        // to your users manually. (To list admins in your dashboard look for users with `is_admin=true`).
        app(AssignUserToRoleTask::class)->run($admin, ['superadmin']);

        return $admin;
    }
}

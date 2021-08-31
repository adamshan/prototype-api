<?php

namespace App\Containers\AppSection\Authorization\Data\Seeders;

use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Parents\Seeders\Seeder;

class AuthorizationRolesSeeder_2 extends Seeder
{
    public function run(): void
    {
        // Default Roles ----------------------------------------------------------------
        $roles =  app(CreateRoleTask::class);
        $roles->run('superadmin', 'Superadministrator', 'Super Administrator Role', 999);
        $roles->run('school_admin', 'school_admin', 'school_admin Role', 777);
        $roles->run('teacher', 'teacher', 'teacher Role', 775);
    }
}

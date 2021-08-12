<?php

namespace App\Containers\AppSection\City\Actions;

use App\Containers\AppSection\City\Tasks\GetAllCitiesTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllCitiesAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllCitiesTask::class)->addRequestCriteria()->run();
    }
}

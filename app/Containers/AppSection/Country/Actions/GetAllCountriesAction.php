<?php

namespace App\Containers\AppSection\Country\Actions;

use App\Containers\AppSection\Country\Tasks\GetAllCountriesTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllCountriesAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllCountriesTask::class)->addRequestCriteria()->run();
    }
}

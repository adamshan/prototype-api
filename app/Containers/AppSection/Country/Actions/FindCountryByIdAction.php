<?php

namespace App\Containers\AppSection\Country\Actions;

use App\Containers\AppSection\Country\Models\Country;
use App\Containers\AppSection\Country\Tasks\FindCountryByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindCountryByIdAction extends Action
{
    public function run(Request $request): Country
    {
        return app(FindCountryByIdTask::class)->run($request->id);
    }
}

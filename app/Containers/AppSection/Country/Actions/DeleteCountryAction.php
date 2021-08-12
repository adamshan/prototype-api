<?php

namespace App\Containers\AppSection\Country\Actions;

use App\Containers\AppSection\Country\Tasks\DeleteCountryTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteCountryAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteCountryTask::class)->run($request->id);
    }
}

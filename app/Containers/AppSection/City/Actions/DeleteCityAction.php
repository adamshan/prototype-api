<?php

namespace App\Containers\AppSection\City\Actions;

use App\Containers\AppSection\City\Tasks\DeleteCityTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteCityAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteCityTask::class)->run($request->id);
    }
}

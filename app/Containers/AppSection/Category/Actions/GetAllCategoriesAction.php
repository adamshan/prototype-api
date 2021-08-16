<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Tasks\GetAllCategoriesTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GetAllCategoriesAction extends Action
{
    public function run(Request $request)
    {
        return app(GetAllCategoriesTask::class)->addRequestCriteria()->run();
    }
}

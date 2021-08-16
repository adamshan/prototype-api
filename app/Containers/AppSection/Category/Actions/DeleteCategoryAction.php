<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Tasks\DeleteCategoryTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteCategoryAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteCategoryTask::class)->run($request->id);
    }
}

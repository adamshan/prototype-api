<?php

namespace App\Containers\AppSection\Category\UI\API\Transformers;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer;

class CategoryTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(Category $category): array
    {
        $response = [
            'object' => $category->getResourceKey(),
            'id' => $category->getHashedKey(),
            'created_at' => $category->created_at,
            'updated_at' => $category->updated_at,
            'readable_created_at' => $category->created_at->diffForHumans(),
            'readable_updated_at' => $category->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $category->id,
            // 'deleted_at' => $category->deleted_at,
        ], $response);

        return $response;
    }
}

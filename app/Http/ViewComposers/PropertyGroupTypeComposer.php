<?php

namespace App\Http\ViewComposers;

use App\Services\PropertyGroupTypeService;
use Illuminate\View\View;

class PropertyGroupTypeComposer
{
    /**
     * List of all categories
     *
     * @var array
     */
    protected $propertyGroupTypes;

    /**
     * CategoryListComposer constructor.
     * In construct storing categories in list
     *
     * @param PropertyGroupTypeService $groupTypeService
     */
    public function __construct(PropertyGroupTypeService $groupTypeService)
    {
        $this->propertyGroupTypes = $groupTypeService->getPropertyGroupTypes();
    }

    /**
     * Bind categories list to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('groupTypes', $this->propertyGroupTypes);
    }
}
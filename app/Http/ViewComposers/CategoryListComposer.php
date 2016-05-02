<?php

namespace App\Http\ViewComposers;

use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryListComposer
{
    /**
     * List of all categories
     *
     * @var array
     */
    protected $categories;

    /**
     * CategoryListComposer constructor.
     * In construct storing categories in list
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categories = $categoryService->getCategoryDropDownList();
    }

    /**
     * Bind categories list to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
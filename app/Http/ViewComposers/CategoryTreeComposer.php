<?php

namespace App\Http\ViewComposers;


use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryTreeComposer
{
    /**
     * Buffered variable to bind category tree to view
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected $categoryTree;

    /**
     * CategoryTreeComposer constructor.
     * Getting category tree
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryTree = $categoryService->getMap($categoryService->getCategoryTree());
    }

    /**
     * Bind category tree to view
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categoryTree', $this->categoryTree);
    }
}
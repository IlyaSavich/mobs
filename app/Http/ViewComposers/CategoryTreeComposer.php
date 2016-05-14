<?php

namespace App\Http\ViewComposers;


use App\Repositories\CategoryRepository;
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
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryTree = $categoryRepository->getMap();
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
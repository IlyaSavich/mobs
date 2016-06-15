<?php

namespace App\Http\ViewComposers;

use App\Repositories\CategoryRepository;
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
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categories = $categoryRepository->getDropDown();
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
<?php

namespace App\Http\ViewComposers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\View\View;

class CategoryTableDataComposer
{
    /**
     * List of all categories
     *
     * @var array
     */
    protected $categoryTable;

    /**
     * CategoryListComposer constructor.
     * In construct storing categories in list
     *
     * @param CategoryRepository $categoryRepository
     *
     * @internal param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryTable = $categoryRepository->getTableData();
    }

    /**
     * Bind categories list to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('categoryTable', $this->categoryTable);
    }
}
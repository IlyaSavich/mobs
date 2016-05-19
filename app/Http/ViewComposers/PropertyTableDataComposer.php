<?php

namespace App\Http\ViewComposers;

use App\Repositories\ProductRepository;
use App\Repositories\PropertyRepository;
use Illuminate\View\View;

class PropertyTableDataComposer
{
    /**
     * List of all categories
     *
     * @var array
     */
    protected $productTable;

    /**
     * CategoryListComposer constructor.
     * In construct storing categories in list
     *
     * @param PropertyRepository $propertyRepository
     */
    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->productTable = $propertyRepository->getTableData();
    }

    /**
     * Bind categories list to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('propertyTable', $this->productTable);
    }
}
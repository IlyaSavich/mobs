<?php

namespace App\Http\ViewComposers;

use App\Repositories\ProductRepository;
use Illuminate\View\View;

class ProductTableDataComposer
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
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productTable = $productRepository->getTableData();
    }

    /**
     * Bind categories list to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('productTable', $this->productTable);
    }
}
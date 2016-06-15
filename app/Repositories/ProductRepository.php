<?php

namespace App\Repositories;

use App\Http\Requests\CreateProductRequest;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use DB;

class ProductRepository
{
    /**
     * Store in database new product
     * Store in product table product information
     * In product_category storing category of the product
     *
     * @param CreateProductRequest $request
     *
     * @return Product
     */
    public function store(CreateProductRequest $request)
    {
        $requestInput = $request->all();

        echo '<pre>';
        var_dump($requestInput);
        die;

        /* @var Product $product */
        $product = Product::create($requestInput);
        $product->categories_id = $requestInput['categories_id'];

        $product->category()->sync($product->categories_id);

        return $product;
    }

    /**
     * Getting all products with there category titles
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTableData()
    {
        return Product::join('product_category', 'product.id', '=', 'product_category.product_id')
            ->join('category', 'product_category.category_id', '=', 'category.id')
            ->select(['product.*', 'category.title as category_title', 'category.id as category_id'])
            ->orderBy('product.id')
            ->get();
    }

    /**
     * Getting product
     *
     * @param int $id
     *
     * @internal $a Product
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     *
     */
    public function getProductWithCategoriesId($id)
    {
        $product = Product::where('product.id', '=', $id)
            ->join('product_category', 'product.id', '=', 'product_category.product_id')
            ->select(['product.*', 'product_category.category_id'])
            ->first();

        $product->categories_id = $product->category()->get()->pluck('id')->toArray();

        return $product;
    }

    /**
     * Update product data
     * Updating product information and product categories
     *
     * @param $id
     * @param CreateProductRequest $request
     *
     * @return mixed
     */
    public function update($id, CreateProductRequest $request) // TODO for multiple categories
    {
        $requestInput = $request->all();

        /* @var Product $product */
        $product = Product::findOrFail($id);
        $product->update($requestInput);

        return $product->category()->sync($requestInput['categories_id']);
    }

    /**
     * Delete product
     * Deleting product information and relations in `product_category`
     *
     * @param $id
     *
     * @return bool|null
     * @throws \Exception
     */
    public function delete($id)
    {
        /* @var Product $product */
        $product = Product::findOrFail($id);
        $product->category()->detach();

        return $product->delete();
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Admin\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    /**
     * Variable is used to work with products:
     * creating, storing, getting methods with database
     * 
     * @var ProductRepository
     */
    protected $productRepository;
    
    /**
     * Create a new controller instance
     * Only authorized user with admin rights can access resources
     * Set ProductRepository instance for working with category
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->middleware('auth');
        $this->middleware('role');
        
        $this->productRepository = $productRepository;
    }

    /**
     * View list of products
     * @return mixed
     */
    public function index()
    {
        return view('admin.product.list');
    }

    /**
     * View create form for products
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Storing the new product
     * 
     * @param CreateProductRequest $request
     *
     * @return mixed
     */
    public function store(CreateProductRequest $request)
    {
        $this->productRepository->store($request);
        
        return redirect()->route('product.list');
    }

    /**
     * View eit form for the product
     * 
     * @param $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        /* @var Product $product */
        $product = $this->productRepository->getProductWithCategoriesId($id);

        return view('admin.product.edit', compact('product'));
    }

    /**
     * Updating the product
     * Redirect to list of all products
     * 
     * @param $id
     * @param CreateProductRequest $request
     *
     * @return mixed
     */
    public function update($id, CreateProductRequest $request)
    {
        $this->productRepository->update($id, $request);

        return redirect()->route('product.list');
    }

    /**
     * Deleting the product
     * Redirect to list of all products
     * 
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->productRepository->delete($id);
        
        return redirect()->route('product.list');
    }
}

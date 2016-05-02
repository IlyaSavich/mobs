<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Admin\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Variable is used to work with categories
     *
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * Create a new controller instance
     * Only authorized user with admin rights can access resources
     * Set CategoryService instance for working with category
     *
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->middleware('role');

        $this->categoryService = $categoryService;
    }

    /**
     * Display the list of all categories
     *
     * @return mixed
     */
    public function index()
    {
        return view('admin.category.list');
    }

    /**
     * Display create category form view
     * Use the list of all categories to view drop down list for choosing parent category
     *
     * @return mixed
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store new category in the database
     * Redirect to view displaying categories list
     *
     * @param CreateCategoryRequest $request
     *
     * @return mixed
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->categoryService->store($request);

        return redirect()->route('category.list');
    }

    /**
     * Display edit category form
     *
     * @param Category $category
     *
     * @return mixed
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Updating the category
     * Redirect to lists of categories
     *
     * @param $id
     * @param CreateCategoryRequest $request
     *
     * @return mixed
     */
    public function update($id, CreateCategoryRequest $request)
    {
        $this->categoryService->update($id, $request);

        return redirect()->route('category.list');
    }

    /**
     * Deleting the category by id
     * Redirect to lists of categories
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $this->categoryService->delete($id);

        return redirect()->route('category.list');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Admin\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class CategoryController extends Controller
{
    /**
     * Variable is used to work with categories
     *
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * Create a new controller instance
     * Only authorized user with admin rights can access resources
     * Set CategoryRepository instance for working with category
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth');
        $this->middleware('role');

        $this->categoryRepository = $categoryRepository;
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
        $this->categoryRepository->store($request);

        return redirect()->route('category.list');
    }

    /**
     * Display edit category form
     *
     * @param int $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        /* @var Category $category */
        $category = $this->categoryRepository->getWithProperties($id);
        
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
        $this->categoryRepository->update($id, $request);

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
        $this->categoryRepository->delete($id);

        return redirect()->route('category.list');
    }

    /**
     * Getting all category properties
     * Return in JSON
     * 
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function properties($id)
    {
        $properties = $this->categoryRepository->getProperties($id);
        
        return Response::json($properties);
    }
}

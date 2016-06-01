<?php

namespace App\Repositories;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Admin\Category;
use App\Models\Admin\CategoryProperty;
use Illuminate\Database\Eloquent\Collection;
use Response;

class CategoryRepository
{
    /**
     * Id of root category
     */
    const ROOT_CATEGORY_ID = 0;

    /**
     * Title to refer to root category
     */
    const ROOT_CATEGORY_TITLE = 'Корневая категория';

    /**
     * Get all categories from database
     * @return Collection|static[]
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * Get list of all categories into associative array, id as key and title as value with root category
     * @return array
     */
    public function getCategoryDropDownList()
    {
        $categoryList = $this->makeList();
        $categoryList[self::ROOT_CATEGORY_ID] = self::ROOT_CATEGORY_TITLE;

        return $categoryList;
    }

    /**
     * Get list of all categories into associative array, id as key and title as value without root category
     * @return array
     */
    public function getCategoryListWithoutRoot()
    {
        return $this->makeList();
    }

    /**
     * Getting categories with properties
     *
     * @param int $id
     *
     * @return Category
     */
    public function getWithProperties($id)
    {
        /* @var Category $category */
        $category = Category::findOrFail($id);

        $category->properties_id = $category->property()->get()->pluck('id')->toArray();

        return $category;
    }

    /**
     * Store in database new category
     *
     * @param CreateCategoryRequest $request
     *
     * @return static
     */
    public function store(CreateCategoryRequest $request)
    {
        $requestInput = $request->all();

        /* @var Category $category */
        $category = Category::create($requestInput);
        if (array_key_exists('property_id', $requestInput)) {
            $category->property()->sync($requestInput['property_id']);
        }

        return $category;
    }

    /**
     * Update the category
     *
     * @param $id
     * @param CreateCategoryRequest $request
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, CreateCategoryRequest $request)
    {
        $requestInput = $request->all();
        /* @var Category $category*/
        $category = Category::findOrFail($id);

        $category->update($requestInput);
        $category->property()->sync($requestInput['property_id']);

        return $category;
    }

    /**
     * Deleting the category using it id
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return Category::destroy($id);
    }

    /**
     * Get category by id
     *
     * @param $id
     *
     * @return Collection|\Illuminate\Database\Eloquent\Model
     */
    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * Create tree of categories
     *
     * @return Collection|static[]
     */
    public function getCategoryTree()
    {
        return Category::get()->toTree();
    }

    /**
     * Get category map
     *
     * @return string
     */
    public function getMap()
    {
        return $this->generateUl($this->getCategoryTree());
    }

    /**
     * Getting information for table of categories
     * Setting parent category title
     * 
     * @return Collection|static[]
     */
    public function getTableData()
    {
        $categories = Category::all();

        /* @var Category $category */
        foreach ($categories as $category) {
            $parent = $category->parent()->first();

            $category->parent_title = is_null($parent) ? 
                self::ROOT_CATEGORY_TITLE : $parent->title;
        }

        return $categories;
    }

    /**
     * Getting all properties of the category
     * 
     * @param $id
     *
     * @return Collection
     */
    public function getProperties($id)
    {
        /* @var Category $category */
        $category = Category::findOrFail($id);
        
        return $category->property()->get();
    }

    /**
     * Create <ul> from category tree
     * For each subcategories layout create new <ul>
     *
     * @param Collection $categories
     * @param string $out
     *
     * @return string
     */
    private function generateUl(Collection $categories, $out = '')
    {
        $out .= '<ul>';
        foreach ($categories as $category) {
            $out = $this->generateUl($category->children, $this->appendCategory($out, $category));
        }
        $out .= '</ul>';

        return $out;
    }

    /**
     * Appending the category to category map
     *
     * @param string $out category map
     * @param Category $category
     *
     * @return string
     */
    private function appendCategory($out, Category $category)
    {
        return $out . '<li><a href="' . route('category.edit', $category->id) . '">'
        . $category->title . '</a></li>';
    }

    /**
     * Make associative array id => title for categories
     * @return array
     */
    private function makeList()
    {
        return Category::pluck('title', 'id');
    }
}
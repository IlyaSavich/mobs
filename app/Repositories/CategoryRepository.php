<?php

namespace App\Repositories;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Admin\Category;
use Kalnoy\Nestedset\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

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
    public function getDropDown()
    {
        $categoryList = $this->makeList();
        $categoryList[self::ROOT_CATEGORY_ID] = self::ROOT_CATEGORY_TITLE;

        return $categoryList;
    }

    /**
     * Get list without the current element bu it id of all categories into associative array,
     * id as key and title as value with root category
     *
     * @param $id int Current category id
     *
     * @return array
     */
    public function getDropDownWithoutCurrent($id)
    {
        $categoryList = $this->getDropDown();
        unset($categoryList[$id]);

        return $categoryList;
    }

    /**
     * Get list of all categories into associative array, id as key and title as value without root category
     * @return array
     */
    public function getDropDownWithoutRoot()
    {
        return $this->makeList();
    }

    /**
     * Store in database new category
     *
     * @param CreateCategoryRequest $request
     *
     * @return Category
     */
    public function store(CreateCategoryRequest $request)
    {
        $requestInput = $request->all();

        /* @var Category $category */
        $category = Category::create($requestInput);

        $category->property()->sync($requestInput['property_id']);

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

        /* @var Category $category */
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
        /* @var Category $category */
        $category = Category::findOrFail($id);

        $children = $category->children()->get();

        /* @var Category $child */
        foreach ($children as $child) {
            $child->update(['parent_id' => $category->parent_id]);
        }

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
     * Generate tree of categories
     *
     * @return string
     */
    public function getMap()
    {
        return $this->generateUl($this->getCategoryTree());
    }

    /**
     * Get table data of categories
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
     * Get properties of the category
     *
     * @param $id int Category id
     *
     * @param PropertyRepository $propertyRepository
     *
     * @return Collection
     */
    public function getProperties($id, PropertyRepository $propertyRepository)
    {
        /* @var Category $category */
        $category = Category::findOrFail($id);

        $properties = $propertyRepository->withInputs($category->property()->get());
        
        return $properties;
    }

    /**
     * Getting properties of the category
     *
     * @param Category $category
     *
     * @return Category
     */
    public function withProperties(Category $category)
    {
        $category->properties_id = $category->property()->get()->pluck('id')->toArray();

        return $category;
    }

    /**
     * Create <ul> from category tree
     * For each subcategories layout create new <ul>
     *
     * @param EloquentCollection $categories
     * @param string $out
     *
     * @return string
     */
    private function generateUl(EloquentCollection $categories, $out = '')
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
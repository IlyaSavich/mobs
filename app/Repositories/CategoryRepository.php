<?php

namespace App\Repositories;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Collection;

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
     * Store in database new category
     *
     * @param CreateCategoryRequest $request
     *
     * @return static
     */
    public function store(CreateCategoryRequest $request)
    {
        return Category::create($request->all());
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
        $category = Category::findOrFail($id);

        return $category->update($request->all());
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

    public function getTableData()
    {
        $categories = Category::all();

        /* @var Category $category */
        foreach ($categories as $category) {
            $parent = $category->parent()->first();

            $category->parent_title = is_null($parent) ? self::ROOT_CATEGORY_TITLE : $parent->title;
        }

        return $categories;
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
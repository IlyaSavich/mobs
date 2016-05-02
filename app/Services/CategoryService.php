<?php

namespace App\Services;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Admin\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    /**
     * Id of root category
     */
    const ROOT_CATEGORY_ID = null;

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
     * Create category map for output
     *
     * @param Collection|static[] $tree
     *
     * @return string
     */
    public function getMap(Collection $tree)
    {
        $traverse = function ($categories, $out = '') use (&$traverse) {
            
            $out .= '<ul>';
            foreach ($categories as $category) {
                $out = $this->appendCategory($out, $category);

                $out = $traverse($category->children, $out);
            }
            $out .= '</ul>';

            return $out;
        };

        return $traverse($tree);
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
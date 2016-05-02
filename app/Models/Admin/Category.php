<?php

namespace App\Models\Admin;

use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Category
 * @package App
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $parent_category_id
 */
class Category extends \Eloquent
{
    use NodeTrait;
    /**
     * Table name
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'parent_category_id',
    ];
}

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
 * @property int $parent_id
 * @property string $created_at
 * @property string $update_at
 *
 * @property string $parent_title
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
        'parent_id',
    ];

    /**
     * All products of the category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }
}

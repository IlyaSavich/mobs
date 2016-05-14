<?php

namespace App\Models\Admin;

/**
 * Class Product
 * @package App\Models\Admin
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property int $quantity
 * @property string $created_at
 * @property string $update_at
 *
 * @property int $category_id
 * @property int $categories_id
 */
class Product extends \Eloquent
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'quantity',
    ];

    /**
     * All categories of the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsToMany(Category::class,
            'product_category', 'product_id', 'category_id')->withTimestamps();
    }
}

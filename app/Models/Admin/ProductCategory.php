<?php

namespace App\Models\Admin;

/**
 * Class ProductCategory
 * @package App\Models\Admin
 *
 * @property int $id
 * @property int $category_id
 * @property int $product_id
 * @property string $created_at
 * @property string $updated_at
 */
class ProductCategory extends \Eloquent
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'product_category';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'product_id',
        'category_id',
    ];
}

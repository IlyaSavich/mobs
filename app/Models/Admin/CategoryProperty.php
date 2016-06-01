<?php

namespace App\Models\Admin;

/**
 * Class CategoryProperty
 * @package App\Models\Admin
 *
 * @property int $id
 * @property int $category_id
 * @property int $property_id
 * @property string $created_at
 * @property string $updated_at
 */
class CategoryProperty extends \Eloquent
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'category_property';

    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'property_id',
    ];
}

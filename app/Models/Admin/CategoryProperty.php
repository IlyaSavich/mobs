<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
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

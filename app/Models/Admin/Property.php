<?php

namespace App\Models\Admin;

/**
 * Class Property
 * @package App\Models\Admin
 *
 * @property int $id
 * @property string $title
 * @property string $input_type
 * @property string $description
 * @property int $group_type
 * @property string $valid_type
 * @property string $created_at
 * @property string $updated_at
 */
class Property extends \Eloquent
{
    /**
     * Database table name
     *
     * @var string
     */
    protected $table = 'property';

    /**
     * Fields that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'title',
        'input_type',
        'group_type',
        'description',
    ];
}

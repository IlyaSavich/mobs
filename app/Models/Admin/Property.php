<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

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
 * 
 * @property array $possible_values
 * @property string $input
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

    /**
     * Categories with this property
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsToMany(Category::class,
            'category_property', 'property_id', 'category_id');
    }

    /**
     * All possible values of this property
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|\Eloquent
     */
    public function possible()
    {
        return $this->hasMany(PropertyPossibleValues::class, 'property_id');
    }
}

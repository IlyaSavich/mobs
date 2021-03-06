<?php

namespace App\Models\Admin;

/**
 * Class PropertyPossibleValues
 * @package App\Models\Admin
 * 
 * @property int $id
 * @property int $property_id
 * @property string value
 */
class PropertyPossibleValues extends \Eloquent
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'property_possible_values';

    /**
     * Say that there no timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'value',
    ];

    /**
     * Property that has this possible value
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}

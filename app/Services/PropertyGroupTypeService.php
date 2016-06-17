<?php

namespace App\Services;


class PropertyGroupTypeService
{
    /**
     * Fields that value user must just input
     */
    const SIMPLE_INPUT_GROUP_TYPE = 1;

    /**
     * Fields that values user must choose from proposed
     */
    const SELECT_INPUT_GROUP_TYPE = 2;
    
    /**
     * Array of property group types
     * This value shows how the admin will input property value,
     * simple typing or select from a list of available
     *
     * @var array
     */
    protected $propertyGroupTypes = [
        self::SIMPLE_INPUT_GROUP_TYPE => 'Простое',
        self::SELECT_INPUT_GROUP_TYPE => 'Выбирать из перечня',
    ];

    /**
     * Getting array of property group types
     *
     * @return array
     */
    public function getPropertyGroupTypes()
    {
        return $this->propertyGroupTypes;
    }
}
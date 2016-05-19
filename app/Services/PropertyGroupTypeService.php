<?php

namespace App\Services;


class PropertyGroupTypeService
{
    /**
     * Array of property group types
     * This value shows how the admin will input property value,
     * simple typing or select from a list of available
     *
     * @var array
     */
    protected $propertyGroupTypes = [
        1 => 'Простое',
        2 => 'Выбирать из перечня',
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
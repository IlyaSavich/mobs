<?php

namespace App\Services;

class InputFieldTypeService
{
    /**
     * Array of input types
     * Uses for properties
     *
     * @var array
     */
    protected $inputFieldTypes = [
        'text',
        'textarea',
        'radio',
        'checkbox',
        'select',
        'multiselect',
        'reset',
        'file',
        'image',
        'color',
        'date',
        'number',
        'time',
        'range',
    ];

    /**
     * Getting array of input field types
     * Make associative array with equals key and value of various input field types
     * 
     * @return array
     */
    public function getInputFieldTypes()
    {
        return array_combine($this->inputFieldTypes, $this->inputFieldTypes);
    }
}
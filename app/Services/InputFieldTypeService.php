<?php

namespace App\Services;

class InputFieldTypeService
{
    /**
     * Array of input types grouped by simple inputs and selecting inputs
     * Uses for properties
     *
     * @var array
     */
    protected $inputFieldTypes = [
        1 => [
            'text',
            'textarea',
            'file',
            'date',
            'time',
            'number',
            'range',
        ],
        2 => [
            'radio',
            'checkbox',
            'select',
        ],
    ];

    /**
     * Getting array of input field types
     * Make associative array with equals key and value of various input field types
     * 
     * @return array
     */
    public function getInputFieldTypes()
    {
        return $this->combineInputTypes();
    }

    /**
     * Getting array of input field types in JSON format
     * 
     * @return string
     */
    public function getJSONInputTypes()
    {
        return json_encode($this->combineInputTypes());
    }

    /**
     * Combine array of grouped input types
     *
     * @return array
     */
    private function combineInputTypes()
    {
        $combineInputTypes = [];
        foreach ($this->inputFieldTypes as $groupKey => $groupInputTypes) {
            $combineInputTypes[$groupKey] =
                array_combine($groupInputTypes, $groupInputTypes);
        }

        return $combineInputTypes;
    }
}
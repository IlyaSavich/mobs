<?php

namespace App\Services;

class InputFieldTypeService
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
     * Array of input types
     * Uses for properties
     *
     * @var array
     */
    protected $inputFieldTypes = [
        self::SIMPLE_INPUT_GROUP_TYPE => [
            'text',
            'textarea',
            'file',
            'color',
            'date',
            'number',
            'time',
            'range',
        ],

        self::SELECT_INPUT_GROUP_TYPE => [
            'radio',
            'checkbox',
            'select',
        ],
    ];

    /**
     * Input types after combining
     * Make associative array with equals key and value of various input field types
     * 
     * @var array
     */
    private $inputsCombine = [];
    
    public function __construct()
    {
        foreach ($this->inputFieldTypes as $groupType => $group) {
            $this->inputsCombine[$groupType] = array_combine($group, $group);
        }
    }

    /**
     * Getting array of input field types
     * 
     * @return array
     */
    public function getInputFieldTypes()
    {
        return $this->inputsCombine;
    }

    /**
     * Getting array of input field types in JSON
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function getInputFieldTypesJSON()
    {
        return json_encode($this->inputsCombine);
    }
}
<?php

namespace App\Generators\PropertyInput;

use App\Generators\PropertyInput\Base\BasePropertyInput;

/**
 * Class SimplePropertyInput
 * Generator of input to property for the supported input types
 *
 * @package App\Builder
 */
class SimplePropertyInput extends BasePropertyInput
{
    /**
     * Input types that are supported
     */
    public static $correctInputTypes = [
        'text',
        'date',
        'number',
        'file',
        'color',
        'time',
    ];

    /**
     * Generate input for property
     *
     * @return string
     */
    protected function input()
    {
        return '<input type="' . $this->property->input_type . '" placeholder="Значение" ' .
            'name="property[' . $this->property->id . ']" class="form-control">';
    }
}
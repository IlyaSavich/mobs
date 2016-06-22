<?php

namespace App\Generators\PropertyInput;

use App\Generators\PropertyInput\Base\BasePropertyInput;

/**
 * Class TextareaPropertyInput
 * Generator of property textarea input
 *
 * @package App\Builder
 */
class TextareaPropertyInput extends BasePropertyInput
{
    /**
     * Input types that are supported
     */
    public static $correctInputTypes = [
        'textarea',
    ];

    /**
     * Generate input for property
     *
     * @return string
     */
    protected function input()
    {
        return '<textarea placeholder="Значение ..." class="form-control"' .
            'name="property[' . $this->property->id . ']"></textarea>';
    }
}
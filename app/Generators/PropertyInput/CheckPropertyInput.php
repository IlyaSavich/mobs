<?php

namespace App\Generators\PropertyInput;

use App\Generators\PropertyInput\Base\BasePropertyInput;

/**
 * Class CheckPropertyInput
 * Generator of property checkbox input
 *
 * @package App\Builder
 */
class CheckPropertyInput extends BasePropertyInput
{
    /**
     * Generate an input with label for the property
     *
     * @return mixed
     */
    protected function input()
    {
        return $this->label($this->field());
    }

    /**
     * Associate label to input field
     *
     * @param string $input
     *
     * @return string
     */
    protected function label($input)
    {
        return '<label for="' . $this->property->title
        . '">' . $this->property->possible_values . '</label>' . $input;
    }

    /**
     * Getting HTML input
     *
     * @return string
     */
    protected function field()
    {
        return '<input type="' . $this->property->input_type . '" placeholder="Значение" '
        . 'name="property[' . $this->property->id . ']"'
        . 'value="' . $this->property->possible_values . '" id="' . $this->property->title . '">';
    }
}
<?php

namespace App\Generators\PropertyInput;

use App\Generators\PropertyInput\Base\BasePropertyInput;

/**
 * Class SelectPropertyInput
 * Generator of property select input
 *
 * @package App\Builder
 */
class SelectPropertyInput extends BasePropertyInput
{
    /**
     * Input types that are supported
     */
    public static $correctInputTypes = [
        'select',
    ];

    /**
     * Generate input for property
     *
     * @return string
     */
    protected function input()
    {
        return '<select name="property[' . $this->property->id . ']" '
        . 'class="form-control">' . $this->options() . '</select>';
    }

    /**
     * Generate options for the select input
     * Returns empty string if there no possible values
     *
     * @return string
     */
    protected function options()
    {
        $options = '';

        if (!is_null($this->property->possible_values)) {

            foreach ($this->property->possible_values as $possible_value) {
                $options .= '<option value="' . $possible_value . '">' . $possible_value . '</option>';
            }

        }

        return $options;
    }
}
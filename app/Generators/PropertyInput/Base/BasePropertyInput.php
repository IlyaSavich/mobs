<?php

namespace App\Generators\PropertyInput\Base ;

use App\Generators\PropertyInput\Contracts\PropertyInputContract;
use App\Models\Admin\Property;

/**
 * Class BasePropertyInput
 * Base class for generating property inputs
 *
 * @package App\Builder
 */
abstract class BasePropertyInput implements PropertyInputContract
{
    /**
     * The type of the input
     * Init in the construct
     *
     * @var Property
     */
    protected $property;

    /**
     * BasePropertyInput constructor.
     * Init input type if it matches supported input types
     *
     * @param Property $property
     */
    public function __construct(Property $property)
    {
        $this->property = $property;
    }

    /**
     * Generate an HTML wrapped input
     *
     * @return string
     */
    public function generate()
    {
        return $this->wrap($this->input());
    }

    /**
     * Wrap input into the div
     *
     * @param string $input
     *
     * @return string
     */
    protected function wrap($input)
    {
        return '<div class="input-group input-field">' . $input . '</div>';
    }

    /**
     * Generate an input for the property
     *
     * @return mixed
     */
    abstract protected function input();
}
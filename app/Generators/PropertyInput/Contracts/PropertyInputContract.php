<?php

namespace App\Generators\PropertyInput\Contracts;

interface PropertyInputContract
{
    /**
     * Getting an input in HTML
     *
     * @return string
     */
    public function generate();
}
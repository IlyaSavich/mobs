<?php

namespace App\Generators\PropertyInput\Factory;

use App\Generators\PropertyInput\CheckPropertyInput;
use App\Generators\PropertyInput\SelectPropertyInput;
use App\Generators\PropertyInput\SimplePropertyInput;
use App\Generators\PropertyInput\TextareaPropertyInput;
use App\Models\Admin\Property;
use App\Repositories\PropertyRepository;
use Symfony\Component\Routing\Exception\InvalidParameterException;

class PropertyInputFactory
{
    /**
     * Getting an instance of the property input
     * 
     * @param Property $property
     * @param PropertyRepository $propertyRepository
     *
     * @return CheckPropertyInput|SelectPropertyInput|SimplePropertyInput|TextareaPropertyInput
     */
    public static function getInstance(Property $property, PropertyRepository $propertyRepository)
    {
        switch ($property->input_type) {
            case 'text':
            case 'file':
            case 'color':
            case 'date':
            case 'number':
            case 'time':
                return new SimplePropertyInput($property);
            case 'textarea':
                return new TextareaPropertyInput($property);
            case 'checkbox':
                return new CheckPropertyInput($propertyRepository->withFirstPossibleValue($property));
            case 'select':
                return new SelectPropertyInput($propertyRepository->withPossibleValues($property));
            default:
                throw new InvalidParameterException('The parameter `' .
                    $property->input_type . '` is not supported');
        }
    }
}
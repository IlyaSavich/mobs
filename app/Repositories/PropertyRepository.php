<?php

namespace App\Repositories;

use App\Http\Requests\CreatePropertyRequest;
use App\Models\Admin\Property;
use App\Services\PropertyGroupTypeService;

class PropertyRepository
{
    /**
     * Storing new property in database
     *
     * @param CreatePropertyRequest $request
     *
     * @return static
     */
    public function store(CreatePropertyRequest $request)
    {
        $requestInput = $request->all();

        /* @var Property $property */
        $property = Property::create($requestInput);

        if ($requestInput['group_type'] == PropertyGroupTypeService::SELECT_INPUT_GROUP_TYPE) {
            $property->possible()
                ->createMany($this->makeCreatingArray($requestInput['possible_values']));
        }

        return $property;
    }

    /**
     * Getting all properties from database
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTableData()
    {
        return Property::all();
    }

    /**
     * Updating property
     *
     * @param Property $property
     * @param CreatePropertyRequest $request
     *
     * @return bool|int
     */
    public function update(Property $property, CreatePropertyRequest $request)
    {
        $requestInput = $request->all();

        $property->update($request->all());

        if ($requestInput['group_type'] == PropertyGroupTypeService::SELECT_INPUT_GROUP_TYPE) {
            $this->syncPossible($property, $requestInput['possible_values']);
        }

        return $property;
    }

    /**
     * Deleting property
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return Property::destroy($id);
    }

    /**
     * Getting possible values of the property
     * 
     * @param Property $property
     *
     * @return Property
     */
    public function withPossibleValues(Property $property)
    {
        $property->possible_values = $this->getArrayOfPossibleValues($property);

        return $property;
    }

    /**
     * Getting an array of property possible values
     *
     * @param Property $property
     *
     * @return array
     */
    private function getArrayOfPossibleValues(Property $property)
    {
        return $property->possible()->get()->pluck('value')->toArray();
    }

    /**
     * Make array to using after createMany method
     *
     * @param $array
     *
     * @return mixed
     */
    private function makeCreatingArray($array)
    {
        foreach ($array as $item => $value) {
            $array[$item] = ['value' => $value];
        }

        return $array;
    }

    private function syncPossible(Property $property, $inputs)
    {
        $property->possible()->delete();
        $property->possible()->createMany($this->makeCreatingArray($inputs));

        return $property;
    }
}
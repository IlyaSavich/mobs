<?php

namespace App\Repositories;

use App\Http\Requests\CreatePropertyRequest;
use App\Models\Admin\Property;
use App\Providers\ProductServiceProvider;

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
        return Property::create($request->all());
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
     * @param $id
     * @param CreatePropertyRequest $request
     *
     * @return bool|int
     */
    public function update($id, CreatePropertyRequest $request)
    {
        /* @var Property $property */
        $property = Property::findOrFail($id);
        
        return $property->update($request->all());
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
}
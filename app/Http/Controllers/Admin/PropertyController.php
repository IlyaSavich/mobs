<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePropertyRequest;
use App\Models\Admin\Property;
use App\Repositories\PropertyRepository;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    /**
     * Variable is uses for working with properties: CRUD
     * 
     * @var
     */
    protected $propertyRepository;
    
    /**
     * Create a new controller instance
     * Only authorized user with admin rights can access resources
     *
     * @param PropertyRepository $propertyRepository
     */
    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->middleware('auth');
        $this->middleware('role');
        
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * Show all properties
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.property.list');
    }

    /**
     * Rendering create form
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.property.create');
    }

    /**
     * Storing new property in database
     * Redirect to list of properties
     * 
     * @param CreatePropertyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePropertyRequest $request)
    {
        $this->propertyRepository->store($request);
        
        return redirect()->route('property.list');
    }

    /**
     * Rendering edit property form
     * 
     * @param Property $property
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Property $property)
    {
        $property = $this->propertyRepository->withPossibleValues($property);
        
        return view('admin.property.edit', compact('property'));
    }

    /**
     * Updating property
     * Redirect to list of properties
     *
     * @param Property $property
     * @param CreatePropertyRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Property $property, CreatePropertyRequest $request)
    {
        $this->propertyRepository->update($property, $request);

        return redirect()->route('property.list');
    }

    /**
     * Deleting property
     * Redirect to list of properties
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $this->propertyRepository->delete($id);

        return redirect()->route('property.list');
    }
}

<?php

namespace App\Http\ViewComposers;

use App\Services\InputFieldTypeService;
use Illuminate\View\View;

class InputFieldTypesComposer
{
    /**
     * List of all categories
     *
     * @var array
     */
    protected $inputFieldTypes;

    /**
     * List of input types in JSON
     * 
     * @var
     */
    protected $inputTypesJSON;

    /**
     * CategoryListComposer constructor.
     * In construct storing categories in list
     *
     * @param InputFieldTypeService $inputFieldTypeService
     */
    public function __construct(InputFieldTypeService $inputFieldTypeService)
    {
        $this->inputFieldTypes = $inputFieldTypeService->getInputFieldTypes();
        $this->inputTypesJSON = $inputFieldTypeService->getJSONInputTypes();
    }

    /**
     * Bind categories list to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with([
            'inputTypes' => $this->inputFieldTypes,
            'inputTypesJSON' => $this->inputTypesJSON,
        ]);
    }
}
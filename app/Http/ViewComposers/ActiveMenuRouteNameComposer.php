<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Route;

class ActiveMenuRouteNameComposer
{
    /**
     * List of all categories
     *
     * @var array
     */
    protected $activeRouteName;

    /**
     * CategoryListComposer constructor.
     * In construct storing categories in list
     */
    public function __construct() // TODO
    {
        $this->activeRouteName = Route::getCurrentRoute()->getName();
        echo '<pre>';
        var_dump($this->activeRouteName);
        die;
    }

    /**
     * Bind categories list to view
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('activeRouteName', $this->activeRouteName);
    }
}
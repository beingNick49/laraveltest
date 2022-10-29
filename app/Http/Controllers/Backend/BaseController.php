<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function loadDataToView($view_path)
    {
        View::composer($view_path, function ($view) {
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path);
            $view->with('panel', $this->panel);
        });
        return $view_path;
    }
}
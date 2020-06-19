<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComponentModule;


class ComponentModuleController extends Controller
{
    public function show()
    {
        $componentmodules = ComponentModule::All();

        return view('component_module.show')->with(compact('componentmodules'));
    }
}

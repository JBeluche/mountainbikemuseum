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
    
    public function create()
    {
        $this->validate(request(), [
            'name' => 'required',
            'nav_link_id' => 'required',
            'lang' => 'required'
        ]);

        //Create a module and move on to edit it
        $module = new App\ComponentModule;
        $module->name = request('name');
        $module->is_custom = 1;
        return view('component_module.create');
    }
}

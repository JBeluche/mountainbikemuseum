<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\component;
use App\ComponentTextfield;

class ComponentController extends Controller
{
    public function edit($componentId)
    {
        $component = Component::where('id', '=', $componentId)->firstOrFail();
        $textfields = ComponentTextfield::where('component_id', '=', $component->id)->get();
        /*$images = Component::where('id', '=', $componentId)->all();
        $listitems = Component::where('id', '=', $componentId)->firallstOrFail();*/


        return view('component.edit')->with(compact('component', 'textfields'));
    }

    public function update($componentId)
    {
        


        //Remember to update the file as well.
    }
}

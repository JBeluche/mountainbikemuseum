<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\component;

class ComponentController extends Controller
{
    public function edit($componentId)
    {
        $component = Component::where('id', '=', $componentId)->firstOrFail();
        return view('component.edit')->with(compact('component'));
    }
}

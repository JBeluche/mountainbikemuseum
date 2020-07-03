<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComponentModule;
use App\ComponentModuleDatafield;
use App\AvailableTag;


class ComponentModuleController extends Controller
{
    public function show()
    {
        $componentmodules = ComponentModule::All();

        return view('component_module.show')->with(compact('componentmodules'));
    }
    
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
        ]);

        //Create a module and move on to edit it
        $module = new ComponentModule;
        $module->name = request('name');
        $module->is_custom = 1;
        $module->images_amount = 1;
        $module->textfields_amount = 1;
        $module->listitem_amount = 1;
        $module->save();

        return redirect('/component_module/edit/'. $module->id);
    }

    public function edit($moduleId)
    {
        $module = ComponentModule::where('id', '=', $moduleId)->firstOrFail();
        $datafields = ComponentModuleDatafield::where('component_module_id', '=', $moduleId)->get();
        $tags = AvailableTag::all();
        
        return view('component_module.edit')->with(compact('module', 'datafields', 'tags'));
        
    }

    public function update($moduleId, Request $request)
    {
        $module = ComponentModule::where('id', '=', $moduleId)->firstOrFail();
        $tags = AvailableTag::all();

        $this->validate(request(), [
            'name' => 'required',
            'index' => 'required',
            'tag_id' => 'required',
        ]);

        if($request->has('add')){
            //Add new module data field
            $datafield = new ComponentModuleDatafield;
            $datafield->tag_id = request('tag_id');
            $datafield->component_module_id = $moduleId;
            $datafield->index = request('index');
            $datafield->name = request('name');
            $datafield->save();
        }

        if($request->has('destroy')){
            $datafield = ComponentModuleDatafield::find(request('datafield_id'));

            $datafield->delete();
        }

        if($request->has('save')){
            $datafield = ComponentModuleDatafield::where('id', '=', request('datafield_id'))->firstOrFail();

            $datafield->name = request('name');
            $datafield->index = request('index');
            $datafield->tag_id = request('tag_id');

            $datafield->save();                    
        }


        $datafields = ComponentModuleDatafield::where('component_module_id', '=', $moduleId)->get();


        return view('component_module.edit')->with(compact('module', 'datafields', 'tags'));

    }
}

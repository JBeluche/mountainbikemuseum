<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComponentModule;
use App\ComponentModuleDatafield;
use App\AvailableTag;
use App\ComponentModuleBlueprint;
use App\DataLink;


class ComponentModuleController extends Controller
{
    public function show()
    {
        $componentmodules = ComponentModule::All();
        $blueprints = ComponentModuleBlueprint::All();

        return view('component_module.show')->with(compact('componentmodules', 'blueprints'));
    }
    
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'blueprint' => 'required',
        ]);

        //Create a module and move on to edit it
        $module = new ComponentModule;
        $module->name = request('name');
        $module->is_custom = 1;
        $module->images_amount = 0;
        $module->textfields_amount = 0;
        $module->listitem_amount = 0;
        $module->component_module_blueprint_id = request('blueprint');
        $module->save();

        return redirect('/component_module/edit/'. $module->id);
    }

    public function edit($moduleId)
    {
        $module = ComponentModule::where('id', '=', $moduleId)->firstOrFail();
        $datafields = ComponentModuleDatafield::where('component_module_id', '=', $moduleId)->orderby('index')->get();
        $tags = AvailableTag::all();
        
        return view('component_module.edit')->with(compact('module', 'datafields', 'tags'));
        
    }

    public function update($moduleId, Request $request)
    {
        $module = ComponentModule::where('id', '=', $moduleId)->firstOrFail();
        $tags = AvailableTag::all();

    

        if($request->has('add')){
            
            $this->validate(request(), [
                'name' => 'required',
                'index' => 'required',
                'tag_id' => 'required',
            ]);

            //Add new module data field
            $datafield = new ComponentModuleDatafield;
            $datafield->tag_id = request('tag_id');
            $datafield->component_module_id = $moduleId;
            $datafield->index = request('index');
            $datafield->name = request('name');

            $tag = AvailableTag::where('id', '=', request('tag_id'))->firstOrFail();
            $datafield->data_type = $tag->data_type;

            $datafield->save();
        }


        if($request->has('destroy')){
            $datafield = ComponentModuleDatafield::find(request('datafield_id'));
            $datalinks = DataLink::where('field_id', '=', request('datafield_id'))->get();
            foreach($datalinks as $datalink)
            {
                $datalink->delete();
            }

            $datafield->delete();
        }

        if($request->has('save')){
            $datafield = ComponentModuleDatafield::where('id', '=', request('datafield_id'))->firstOrFail();
            $tag = AvailableTag::where('id', '=', request('tag_id'))->firstOrFail();

            $datafield->name = request('name');
            $datafield->index = request('index');
            $datafield->tag_id = request('tag_id');
            $datafield->data_type = $tag->data_type;

            $datafield->save(); 

            //Refresh all datalinks data type
            $datalinks = DataLink::where('field_id', '=', request('datafield_id'))->get();

            foreach($datalinks as $datalink)
            {
                DataLink::where('id', '=', $datalink->id)->update(['data_type' => $datafield->data_type]);
            }

        }

        

        $datafields = ComponentModuleDatafield::where('component_module_id', '=', $moduleId)->get();


        return redirect('/component_module/edit/' . $moduleId);

    }
}

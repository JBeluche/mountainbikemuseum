<?php

namespace App\Http\Controllers;

use App\AvailableTag;
use Illuminate\Http\Request;
use App\Component;
use App\ComponentList;
use App\ComponentModuleDatafield;
use App\ComponentTextfield;
use App\TextData;
use App\DataLink;
use App\ImageData;
use DB;
use App\Page;
use App\LinkData;

class ComponentController extends Controller
{


    
    public function edit($componentId)
    {
        $component = Component::where('id', '=', $componentId)->firstOrFail();
        $datalinks = DataLink::where('component_id', '=', $component->id)->get();
        $datafields = ComponentModuleDatafield::where('component_module_id', '=', $component->component_module_id)->orderby('index')->get();
        $page = Page::where('id', '=', $component->page_id)->firstOrFail();
        $textdatas = TextData::all();
        $imagedatas = ImageData::all();
        $tags = AvailableTag::all();
        $linkdatas = LinkData::all();

        return view('component.edit')->with(compact('component', 'datalinks', 'textdatas', 'imagedatas', 'page', 'datafields', 'tags', 'linkdatas'));
    }

    public function update(Component $component, Request $request)
    {
        if($request->has('linkdata'))
        {
            foreach(request('linkdata') as $linkdata)
            {
                parse_str($linkdata, $array); 
    
                $new_datalink = DataLink::where('id', '=', $array['datalink_id'])->update(['linkdata_id' => $array['linkdata_id']]);
    
            }
        }

        if($request->has('textdata'))
        {
            foreach(request('textdata') as $textdata)
            {
                parse_str($textdata, $array); 

                $new_datalink = DataLink::where('id', '=', $array['datalink_id'])->update(['textdata_id' => $array['textdata_id']]);

            }
        }

        if($request->has('imagedata'))
        {
            foreach(request('imagedata') as $imagedata)
            {
                parse_str($imagedata, $array); 
    
                $new_datalink = DataLink::where('id', '=', $array['datalink_id'])->update(['imagedata_id' => $array['imagedata_id']]);
    
            }
        }
        $request->session()->put('component_edit', $component);

        //Remember to update the file as well.
        return redirect('page/updatefile/' . $component->page_id);

    }

    public function delete(Component $component)
    {
        $page_id = $component->page_id;

        //Check for all the links to this component
        $datalinks = DataLink::where('component_id', '=', $component->id)->get();

        foreach($datalinks as $datalink)
        {
            $datalink->delete();
        }

        $component->delete();

        return redirect('page/updatefile/' . $page_id);
    }

    public function updateindex($componentId)
    {

        $this->validate(request(), [
            'index' => 'required',
        ]);

        $component = Component::where('id', '=', $componentId)->update(['index' => request('index')]);
        $component = Component::where('id', '=', $componentId)->firstOrFail();

        return redirect('page/updatefile/' . $component->page_id);

    }
}

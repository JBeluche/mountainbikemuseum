<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\component;
use App\ComponentList;
use App\ComponentTextfield;
use App\TextData;
use App\DataLink;
use App\ImageData;
use DB;

class ComponentController extends Controller
{


    
    public function edit($componentId)
    {
        $component = Component::where('id', '=', $componentId)->firstOrFail();
        $datalinks = DataLink::where('component_id', '=', $component->id)->get();

        $textdatas = TextData::all();
        $imagedatas = ImageData::all();


        return view('component.edit')->with(compact('component', 'datalinks', 'textdatas', 'imagedatas'));
    }

    public function update(Component $component)
    {
        
        foreach(request('textdata') as $textdata)
        {
            parse_str($textdata, $array); 

            $new_datalink = DataLink::where('id', '=', $array['datalink_id'])->update(['textdata_id' => $array['textdata_id']]);

        }

        foreach(request('imagedata') as $imagedata)
        {
            parse_str($imagedata, $array); 

            $new_datalink = DataLink::where('id', '=', $array['datalink_id'])->update(['imagedata_id' => $array['imagedata_id']]);

        }

        //Remember to update the file as well.
        return redirect('page/updatefile/' . $component->page_id)->with(['component_edit' => $component] );

    }

    public function delete(Component $component)
    {
        $page_id = $component->page_id;

        //Check for all the links to this component
        $textfields = ComponentTextfield::where('component_id', '=', $component->id)->get();
        $datalinks = DataLink::where('component_id', '=', $component->id)->get();

        foreach($textfields as $textfield)
        {
            $textfield->delete();
        }

        foreach($datalinks as $datalink)
        {
            $datalink->delete();
        }

        $component->delete();

        return redirect('page/updatefile/' . $page_id);
    }
}

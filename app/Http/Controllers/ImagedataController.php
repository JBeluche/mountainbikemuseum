<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageData;
use App\Component;
use App\ComponentModuleDatafield;
use App\DataLink;
use App\Page;
use App\ComponentModuleBlueprint;

class ImagedataController extends Controller
{
    public function show()
    {
        $images = ImageData::all();

        return view('imagedata.show')->with(compact('images'));
    }

    public function create()
    {
        return view('imagedata.create');
    }

    public function delete($imageID)
    {
        $image = ImageData::where('id', '=', $imageID)->firstOrFail();
        
        $datalinks = DataLink::where('imagedata_id', '=', $imageID)->get();

        $data = array();

        foreach($datalinks as $datalink)
        {
            //Get component
            $component = Component::where('id', '=', $datalink->component_id)->firstOrFail();
            $module = ComponentModuleBlueprint::where('id', '=', $component->component_module_id)->firstOrFail();

            //Get location
            $field = ComponentModuleDatafield::where('id', '=', $datalink->field_id)->firstOrFail();
            $page = Page::where('id', '=', $component->page_id)->firstOrFail();

            $index = $field->index;
            $component_name = $component->name;

            $array[$page->name] = 'Pagina: ' . $page->name .'<br> Module: ' . $module->name . ' <br> Component: ' . $component_name . ' <br> Index: ' . $index . '<br><br>';

            $data = implode(',', $array);

        }

        

        //Plek weten van de component waar hij is.
        
        try {
            $image->delete();
          
          } catch (\Illuminate\Database\QueryException $e) {
 
            return redirect('/image_data/show')
                ->withErrors(__('De afbeelding wordt nog ergens gebruikt! Zorg ervoor dat hij overal niet meer naar verwezen wordt. <br> <br>' . $data));

          }

          return redirect('/image_data/show');
    }

    public function store(Request $request)
    {

        //Validate Data 
        $this->validate(request(), [
            'name' => 'required|unique:image_data',
            'file' => 'required',
        ]);

        $path = $request->file('file')->store('img');

        $imagedata = new ImageData;

        $imagedata->name = request('name');
        $imagedata->filename = $path;

        $imagedata->save();

        return redirect('/image_data/show');
    }
}

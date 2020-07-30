<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinkData;
use App\Component;
use App\ComponentModuleBlueprint;
use App\ComponentModuleDatafield;
use App\DataLink;
use App\Page;
use App\ComponentModuleBlueprint;

class LinkdataController extends Controller
{
    public function show()
    {
        $links = LinkData::all();

        return view('linkdata.show')->with(compact('links'));
    }

    public function create()
    {
        return view('linkdata.create');
    }

    public function delete($linkdataID)
    {
        $linkdata = LinkData::where('id', '=', $linkdataID)->firstOrFail();

        $datalinks = DataLink::where('textdata_id', '=', $linkdata->id)->get();

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
        try {
            $linkdata->delete();
          
          } catch (\Illuminate\Database\QueryException $e) {

            return redirect('/link_data/show')
                ->withErrors(__('De link wordt nog ergens gebruikt! Zorg ervoor dat hij overal niet meer naar verwezen wordt. <br> <br>' . $data));

          }

          return redirect('/link_data/show');
    }

    public function store(Request $request)
    {

        //Validate Data 
        $this->validate(request(), [
            'name' => 'required|unique:image_data',
            'link_name' => 'required',
        ]);

        $linkdata = new LinkData;

        $linkdata->name = request('name');
        $linkdata->link_name = request('link_name');

        $linkdata->save();

        return redirect('/link_data/show');
    }
}

<?php

namespace App\Http\Controllers;

use App\TextCategory;
use Illuminate\Http\Request;
use App\TextData;
use App\Component;
use App\ComponentModuleDatafield;
use App\DataLink;
use App\Page;
use App\ComponentModuleBlueprint;

class TextdataController extends Controller
{
    public function show(Request $request)
    {
        $text_categories = TextCategory::All();

        $textdatas = TextData::All();

        if($request->has('filter')){
            $textdatas = TextData::where('category_id', '=', request('filter_id'))->get();
        }


        return view('textdata.show')->with(compact('textdatas', 'text_categories'));
        
    }

    public function create()
    {
        $categories = TextCategory::all();

        return view('textdata.create')->with(compact('categories'));
    }

    public function store()
    {
        //Check if key_name already exist
        $this->validate(request(), [
            'key_name' => 'unique:text_data|required|alpha_dash',
            'nl_text' => 'required',
            'en_text' => 'required',
            'de_text' => 'required',
        ]);

        $textdata = new TextData;

        $textdata->key_name = request('key_name');
        $textdata->nl_text = request('nl_text');
        $textdata->en_text = request('en_text');
        $textdata->de_text = request('de_text');
        $textdata->category_id = request('category_id');


        $textdata->save();

        return redirect('/text_data/show');

    }

    public function update(TextData $textdata)
    {
        //Check if key doesnt already exist and if everything is submitted     
        if(request('key_name') == $textdata->key_name)
        {
            $this->validate(request(), [
                'category_id' => 'required',
                'en_text' => 'required',
                'de_text' => 'required',
                'nl_text' => 'required',
                ]);
        } 
        else{
            $this->validate(request(), [
                'key_name' => 'unique:text_data|required|alpha_dash',
                ]);
        }
      

            $textdata->key_name = request('key_name');
            $textdata->category_id = request('category_id');
            $textdata->nl_text = request('nl_text');
            $textdata->en_text = request('en_text');
            $textdata->de_text = request('de_text');

            $textdata->save();
            
            return redirect('/text_data/show');
    
    }

    public function destroy(Textdata $textdata)
    {
        $datalinks = DataLink::where('textdata_id', '=', $textdata->id)->get();

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

            $array[$page->name] = 'Pagina: ' . $page->name .'<br> Module: ' . $module->name . ' <br>  Component: ' . $component_name . ' <br> Index: ' . $index . '<br><br>';

            $data = implode(',', $array);

        }

        try {
            $textdata->delete();
          
          } catch (\Illuminate\Database\QueryException $e) {
              
            return redirect('/text_data/show')
                ->withErrors(__('De text wordt nog ergens gebruikt! Zorg ervoor dat hij overal niet meer naar verwezen wordt. <br> <br>' . $data));

          }

        return redirect('/text_data/show');
    }
}

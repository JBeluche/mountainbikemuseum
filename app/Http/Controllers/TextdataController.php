<?php

namespace App\Http\Controllers;

use App\TextCategory;
use Illuminate\Http\Request;
use App\TextData;

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
            'key_name' => 'unique:text_data|required',
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
        $this->validate(request(), [
            'key_name' => 'unique:text_data|required',
            'category_id' => 'required',
            'en_text' => 'required',
            'de_text' => 'required',
            'nl_text' => 'required',
            ]);

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
        $textdata->delete();

        return redirect('/text_data/show');
    }
}

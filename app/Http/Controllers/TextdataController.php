<?php

namespace App\Http\Controllers;

use App\TextCategory;
use Illuminate\Http\Request;
use App\TextData;

class TextdataController extends Controller
{
    public function show()
    {

        $textdatas = TextData::All();

        return view('textdata.show')->with(compact('textdatas'));
        
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

    public function update()
    {
        //Check if key doesnt exist already with current language

    }
}

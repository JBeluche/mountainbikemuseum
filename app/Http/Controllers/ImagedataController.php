<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageData;

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
        
        try {
            $image->delete();
          
          } catch (\Illuminate\Database\QueryException $e) {
              
            return redirect('/image_data/show')
                ->withErrors(__('notifications.imagedata_constraint'));

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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LinkData;

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

        try {
            $linkdata->delete();
          
          } catch (\Illuminate\Database\QueryException $e) {
              
            return redirect('/link_data/show')
                ->withErrors(__('notifications.linkdata_constraint'));

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

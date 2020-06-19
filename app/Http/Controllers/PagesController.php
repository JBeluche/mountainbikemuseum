<?php

namespace App\Http\Controllers;

use App;
use App\Language;
use App\ListItem;
use App\Mail\ContactMe;
use App\Mail\ContactMeAdmin;
use App\Mail\Reserveren;
use App\Mail\ReserverenAdmin;
use App\Page;
use App\NavLink;
use Illuminate\Http\Request;
use Mail;
use \Session;
use App\Component;
use App\ComponentModule;
use App\ComponentTextfield;
use App\PageComponents\HeaderMain;
use App\TextData;

class PagesController extends Controller
{
    public function create()
    {

        //Get all navigation link
        $navlinks = App\NavLink::all();

        return view('pages.create')->with(compact('navlinks'));
    }

    public function store()
    {

        //Validate Data 
        $this->validate(request(), [
            'name' => 'required',
            'nav_link_id' => 'required',
            'lang' => 'required'
        ]);

        //Create the view for new page
        $view = new App\View;
        $view->name = request('name');
        $view->save();

        $page = new Page;
        
        //If navlink is self
        //Create a navlink
        //Else
        if(request('nav_link_id') == 0){

            $navLink = new App\NavLink;
            $navLink->name = request('name');
            $navLink->lang = request('lang');

            //Reken uit wat de index moet zijn
            $maxIndex = NavLink::max('index');
            $navLink->index = ($maxIndex + 1);

            $navLink->save();

            $page->nav_link_id = $navLink->id;

        }
        else{
            $page->nav_link_id = request('nav_link_id');
        }



        $page->name = request('name');
        $page->lang = request('lang');
        $page->view = $view->name;

        $page->save();

        //Now you need to create the file.

        $basePath = base_path();

        copy($basePath. "/resources/views/templates/template_top.blade.php", $basePath. "/resources/views/stored_pages/" . $page->name . ".blade.php");

    }

    public function edit($pageId)
    {
        //Get the page 
        $page = Page::where('id', '=', $pageId)->firstOrFail();

        $components =  Component::where('page_id', '=', $pageId)->get();
        
        //Get all the components 
        $componentModules = App\ComponentModule::all();
        return view('pages.edit')->with(compact('page', 'componentModules', 'components'));
    }

    public function update($pageId)
    {
        //Check if you need to add a component
        //Add a component
        $component = new App\Component;
        $component->page_id = $pageId;
        $component->component_module_id = request('componentModuleId');	
        $component->name = request('name');

        $component->save();

        //Create the textfields for the component
        $textfields_amount = ComponentModule::where('id', '=', $component->component_module_id)->firstOrFail()->textfields_amount;

        for($i = 1; $i <= $textfields_amount; $i++)
        {
            $componentTextfield = new App\ComponentTextfield();
            $componentTextfield->text_data_id = 1;
            $componentTextfield->component_id = $component->id;
            $componentTextfield->index = $i;

            $componentTextfield->save();
        }


        $page = Page::where('id', '=', $pageId)->firstOrFail();
        $basePath = base_path();
        $pageViewLocation = $basePath . '/resources/views/stored_pages/' . $page->name . '.blade.php';

        //Delete the old file
        unlink($pageViewLocation);

        //Recreate the file, Add top template
        copy($basePath . "/resources/views/templates/template_top.blade.php", $pageViewLocation);

        $fh = fopen($pageViewLocation, 'a');

        //Loop through all the page's components
        $components = Component::where('page_id', '=', $pageId)->get();

        $textdatakeys = array();

        foreach($components as $component)
        {
             //Foreach of them get there images and text
            $textfields = ComponentTextfield::where('component_id', '=', $component->id)->get();
            foreach($textfields as $textfield)
            {
                $text = '{{ __(\'home.' . TextData::where('id', '=', $textfield->text_data_id)->firstOrFail()->key_name . '\') }}';
                array_push($textdatakeys, $text);
            }

            $componentname = ComponentModule::where('id', '=', $component->component_module_id)->get();
            $data = $component->getComponentHTML($componentname, $textdatakeys, 'no');

            //Paste in the good order in the file
            fwrite($fh, $data);
        }

        fwrite($fh, '@stop');
        fclose($fh);
       

        return redirect('page/edit/' . $pageId);

    }



    public function show(Page $page)
    {

        $components = $page->components()->get();

        //Get the components for the page
        //$components = $page->components()->get();

        //Filter the list item op component
        $listItems = ListItem::whereNull('list_item_id')
            ->with('childrenListItems')
            ->get();

        if (isset($page->name)) {
            $view = view('stored_pages.' . $page->view);
            return $view->with(compact('page', 'components', 'listItems'));
        } elseif (Session::exists('paymentPage')) {
            $page_name = Session::pull('paymentPage');
            $page = Page::where('name', '>', 'page_name')->firstOrFail();
            $components = $page->components()->get();
            return view('stored_pages.' . $page_name)->with(compact('page', 'components', 'listItems'));
        }

        return redirect('home');

    }

    public function requests(Page $page, Request $request)
    {
        //Gets all the needed element to display on all pages
        $pages = Page::all();
        $components = $page->components()->get();
        $listItems = ListItem::whereNull('list_item_id')
            ->with('childrenListItems')
            ->get();

        //****************
        //  Look at what the page is and handlse acordingly
        //****************

        //Fietsenverhuur session pagina 1a naar 1b
        if ($page->view === 'fietsverhuur') {
            if ($request->people_count === null) {
                return redirect('fietsenverhuur');
            } elseif (isset($request->people_count)) {
                $validatedData = $request->validate([
                    'people_count' => 'required|numeric|max:20',
                ]);
                $request->session()->put('people_count', $validatedData['people_count']);
            }
        }

        //Fietsenverhuur session pagina 1b naar 2
        if ($page->name === 'reserveren-2') {
            if ($request->persons === null) {
                return redirect('fietsenverhuur');
            } elseif (isset($request->persons)) {
                $validatedData = $request->validate([
                    'persons.*' => 'required|numeric|between:0,99.99',
                ]);
                $request->session()->put('persons', $validatedData);
            }
        }

        if (isset($page->name)) {
            $view = view('stored_pages.' . strtolower($page->name));

            return $view->with(compact('pages', 'page', 'components', 'listItems', 'request'));
        }
        return redirect('home');
    }

    public function mail(Page $page, Request $request)
    {

        $page->name = strtolower($page->name);

        if ($page->name === 'reserveren-2') {
            $validatedData = $request->validate([
                'voorletters' => 'nullable|string|max:10',
                'tussenvoegsel' => 'nullable|string|max:20',
                'land' => 'string|max:50',
                'achternaam' => 'string|max:50',
                'type_klant' => 'string|max:50',
                'postcode' => 'nullable|string|max:10',
                'email' => 'email|string|max:255',
                'straatnaam' => 'nullable|string|max:255',
                'plaats' => 'string|max:200',
                'telefoon' => 'string|max:18',
                'huisnummer' => 'nullable|string|max:6',
                'toevoeging' => 'nullable|string|max:10',

                'aankomsttijd' => 'string|max:6',
                'date' => 'string|max:14',
                'duration' => 'string|max:6',
                'comment' => 'nullable|string|max:255',

                'persons' => 'required',

            ]);

            Session::forget('people_count');

            //Send mails with data
            try {
                Mail::to(request('email'))
                    ->send(new Reserveren($validatedData));
                Mail::to('jeremie@mountainbikemuseum.nl')
                    ->send(new ReserverenAdmin($validatedData));
            } catch (Exception $e) {
                return back()
                    ->with('message',  __('notifications.page_controller_mail_1') . $e);
            }
            return redirect('/contact')
                ->with('message', __('notifications.page_controller_mail_2'));
        }

        if ($page->name === 'contact') {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|string|max:255',
                'message' => 'required|string|max:1000',
                'page' => 'required|string|max:100',
            ]);
            try {
                Mail::to(request('email'))
                    ->send(new ContactMe($validatedData));
                Mail::to('jeremie@mountainbikemuseum.nl')
                    ->send(new ContactMeAdmin($validatedData));
            } catch (Exception $e) {
                return back()
                    ->with('message', __('notifications.page_controller_mail_1') . $e);
            }

            return redirect()->back()
                ->with('message', __('notifications.page_controller_mail_3'));
        }

        return redirect()->back()
            ->with('message',  __('notifications.page_controller_mail_4'));
    }

    public function language(Language $language)
    {

        //Set cookie for the language
        Session::put('lang', $language->name);

        return redirect()->back();
    }

}

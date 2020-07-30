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
use App\DataLink;
use App\ComponentModuleDatafield;
use Symfony\Component\VarDumper\Cloner\Data;
use App\View;

class PagesController extends Controller
{
    public function create()
    {

        //Get all navigation link
        $navlinks = App\NavLink::all();

        return view('pages.create')->with(compact('navlinks'));
    }

    public function delete($page_id)
    {
        $components = Component::where('page_id', '=', $page_id)->get();

        foreach($components as $component)
        {
            $data_link = DataLink::where('component_id', '=', $component->id)->firstOrFail();
            $data_link->delete();
            $component->delete();
        }

        $page = Page::where('id', '=', $page_id)->firstOrFail();

        $page_de = Page::where('view', '=', $page->view)->where('lang', '=', 'de')->firstOrFail();
        $page_en = Page::where('view', '=', $page->view)->where('lang', '=', 'en')->firstOrFail();

        $view = View::where('name', '=', $page->view)->firstOrFail();

        $page->delete();
        $page_de->delete();
        $page_en->delete();
        $view->delete();


        return redirect('/dashboard');
    }

    public function store()
    {

        //Validate Data 
        $this->validate(request(), [
            'name_de' => 'required|alpha_dash',
            'name_en' => 'required|alpha_dash',
            'name_nl' => 'required|alpha_dash',
            'nav_link_id_de' => 'required',
            'nav_link_id_en' => 'required',
            'nav_link_id_nl' => 'required',
        ]);

        //Check if the name is already in use
        $pages = Page::all();

        foreach($pages as $page)
        {
            if($page->name == request('name_nl') || $page->name == request('name_de') || $page->name == request('name_en'))
            {
                return redirect()->back()->with('message', 'Er is een dubbele naam, zorg ervoor dat ze niet overeen komen met al bestaande namen. Lukt het niet? Neem contact op met beheerder!');
            }
        }

        //Create the view for new page
        $view = new App\View;
        $view->name = strtolower(request('name_nl'));
        $view->save();

        $page_nl = new Page;
        $page_de = new Page;
        $page_en = new Page;

        //If navlink is self
        //Create a navlink
        //Else
        if (request('nav_link_id_nl') == 0) {

            $navLinknl = new App\NavLink;
            $navLinknl->name = request('name_nl');
            $navLinknl->lang = 'nl';

            $maxIndex = NavLink::max('index');
            $navLinknl->index = ($maxIndex + 1);

            $navLinknl->save();

            $page_nl->nav_link_id = $navLinknl->id;
        } else {

            $page_nl->nav_link_id = request('nav_link_id_nl');

        }

        if (request('nav_link_id_de') == 0) {

            $navLinkde = new App\NavLink;
            $navLinkde->name = request('name_de');
            $navLinkde->lang = 'de';

            $maxIndex = NavLink::max('index');
            $navLinkde->index = ($maxIndex + 1);
            
            $navLinkde->save();

            $page_de->nav_link_id = $navLinkde->id;
        } else {

            $page_de->nav_link_id = request('nav_link_id_de');

        }


        if (request('nav_link_id_en') == 0) {

            $navLinken = new App\NavLink;
            $navLinken->name = request('name_en');
            $navLinken->lang = 'en';

            //Reken uit wat de index moet zijn
            $maxIndex = NavLink::max('index');
            $navLinken->index = ($maxIndex + 1);

            $navLinken->save();

            $page_en->nav_link_id = $navLinken->id;

        } else {

            $page_en->nav_link_id = request('nav_link_id_en');

        }



        $page_nl->name = request('name_nl');
        $page_de->name = request('name_de');
        $page_en->name = request('name_en');

        $page_nl->lang = 'nl';
        $page_de->lang = 'de';
        $page_en->lang = 'en';

        $page_nl->view = $view->name;
        $page_de->view = $view->name;
        $page_en->view = $view->name;

        $page_nl->save();
        $page_de->save();
        $page_en->save();

        //Now you need to create the file.

        $basePath = base_path();

        copy($basePath . "/resources/views/templates/template_top.blade.php", $basePath . "/resources/views/stored_pages/" . $view->name . ".blade.php");

        return redirect('dashboard');
    }

    public function edit($pageId)
    {
        //Get the page 
        $page = Page::where('id', '=', $pageId)->firstOrFail();

        $components =  Component::where('page_id', '=', $pageId)->orderBy('index')->get();

        //Get all the components 
        $componentModules = App\ComponentModule::all();
        return view('pages.edit')->with(compact('page', 'componentModules', 'components'));
    }

    public function update($pageId, Request $request)
    {

        //Setting up page information
        $page = Page::where('id', '=', $pageId)->firstOrFail();
        $basePath = base_path();
        $pageViewLocation = $basePath . '/resources/views/stored_pages/' . $page->view . '.blade.php';


        ///// 
        // Adding a component, if need be!
        /////
        if ($request->has('add_component')) {
            //Validate Data 
            $this->validate(request(), [
                'name' => 'required',
                'index' => 'required',
            ]);

            $component = new App\Component;
            $component->page_id = $pageId;
            $component->component_module_id = request('componentModuleId');
            $component->name = request('name');
            $component->index = request('index');

            $component->save();


            //Create all the fields required
            $module_fields = ComponentModuleDatafield::where('component_module_id', '=', $component->component_module_id)->get();

            foreach($module_fields as $module_field)
            {
                $data_link = new DataLink;
                $data_link->field_id = $module_field->id;
                $data_link->data_type =  $module_field->data_type;
                $data_link->imagedata_id = 1;
                $data_link->textdata_id = 1;
                $data_link->linkdata_id = 1;
                $data_link->component_id = $component->id;

                $data_link->save();

            }


        }

        ///// 
        // Recreating the file!!
        /////

        //Delete the old file
        unlink($pageViewLocation);
        //Recreate the file, Add top template
        copy($basePath . "/resources/views/templates/template_top.blade.php", $pageViewLocation);


        //Components are being collected allong with there data. 
        //Then everything is being put on the correct file!
        $fh = fopen($pageViewLocation, 'a');

        //Loop through all the page's components
        $components = Component::where('page_id', '=', $pageId)->orderBy('index')->get();

        foreach ($components as $component) {
            //Foreach of them get there images and text
            $module = ComponentModule::where('id', '=', $component->component_module_id)->firstOrFail();

            $datafields = ComponentModuleDatafield::where('component_module_id', '=', $component->component_module_id)->get();
            $data_links = DataLink::where('component_id', '=', $component->id)->get();
            if($module->is_custom == 0){
                $data = $component->getComponentHTML($component, $module);
            }
            elseif($module->is_custom == 1){
                $data = $component->getComponentHTMLCustomed($component, $module);
            }

            //Paste in the good order in the file
            fwrite($fh, $data);

        }

        fwrite($fh, '@stop');
        fclose($fh);

        ///// 
        // Redirecting correctly! Depending on where you came from, redirect to correct page
        /////
 
        if($request->has('component_edit'))
        {
            $component = $request->session()->pull('component_edit');
            return redirect('component/edit/' . $component->id);
        }
      

        //Default redirect
        return redirect('page/edit/' . $pageId);
    }



    public function show(Page $page)
    {

        $components = $page->components()->get();

        //Get the components for the page
        //$components = $page->components()->get();

        //Filter the list item op component
        /*$listItems = ListItem::whereNull('list_item_id')
            ->with('childrenListItems')
            ->get();*/

        if (isset($page->name)) {
            $view = view('stored_pages.' . $page->view);
            return $view->with(compact('page', 'components'));
        } elseif (Session::exists('paymentPage')) {
            $page_name = Session::pull('paymentPage');
            $page = Page::where('name', '>', 'page_name')->firstOrFail();
            $components = $page->components()->get();
            return view('stored_pages.' . $page_name)->with(compact('page', 'components'));
        }

        return redirect('home');
    }

    public function requests(Page $page, Request $request)
    {
        //Gets all the needed element to display on all pages
        $pages = Page::all();
    

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

            return $view->with(compact('pages', 'page', 'request'));
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

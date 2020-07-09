<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Component extends Model
{

    public $textfield = array();

    public function textfields()
    {
        return $this->hasMany(Textfield::class);
    }

    public function componenttextfields()
    {
        return $this->hasMany(ComponentTextfield::class);
    }

    public function imageFields()
    {
        return $this->hasMany(ImageField::class);
    }

    public function componentModule()
    {
        return $this->hasOne(ComponentModule::class);
    }

    public function listItems()
    {
        return $this->hasMany(ListItem::class);
    }


    //Here I have dumped all the components
    public function getComponentHTMLCustomed($component, $module)
    {
        ////*********** CLIENT CUSTOMT MODULE HANDLER ************////
        
         //Get all the datafields
        $component_module_datafields = ComponentModuleDatafield::where('component_module_id', '=', $module->id)->orderBy('index')->get();

        $datafields = array();

        foreach($component_module_datafields as $component_module_datafield)
        {
            try {
                $data_link = DataLink::where('field_id', '=', $component_module_datafield->id)->where('component_id', '=', $component->id)->firstOrFail();
              } catch (ModelNotFoundException $ex) {
                //Make a new datalink dummy!
                $datalink = new DataLink;
                $datalink->field_id = $component_module_datafield->id;
                $datalink->imagedata_id = 1;
                $datalink->textdata_id = 1;
                $datalink->linkdata_id = 1;
                $datalink->data_type = $component_module_datafield->data_type;
                $datalink->component_id = $component->id;

                $datalink->save();
              }

            
                if($component_module_datafield->data_type == 'text')
                {
                    /* HERE YOU CAN SEE ALL THE DIFFERENT TAGS, MIGHT CHANGE THOSE IF DATA CHANGES! */
                    if($component_module_datafield->tag_id == 1){
                        $text = '<h1 class="heading-1  u-margin-bottom-big"> {{ __(\'home.' . TextData::where('id', '=', $data_link->textdata_id)->firstOrFail()->key_name . '\') }} </h1>';
                    }
                    elseif($component_module_datafield->tag_id == 2){
                        $text = '<h2 class="heading-2-normal"> {{ __(\'home.' . TextData::where('id', '=', $data_link->textdata_id)->firstOrFail()->key_name . '\') }} </h2>';
                    }
                    elseif($component_module_datafield->tag_id == 3){
                        $text = '<p class="u-padding-sides-big paragraph-big__dark "> {{ __(\'home.' . TextData::where('id', '=', $data_link->textdata_id)->firstOrFail()->key_name . '\') }} </p>';
                    }
                    elseif($component_module_datafield->tag_id == 10){
                        $text = '{{ __(\'home.' . TextData::where('id', '=', $data_link->textdata_id)->firstOrFail()->key_name . '\') }}';
                    }

                    array_push($datafields, $text);
                }
                elseif($component_module_datafield->data_type == 'tag_only')
                {
                    if($component_module_datafield->tag_id == 4){
                        $text = '<br>';
                    }
                    elseif($component_module_datafield->tag_id == 8){
                        $text = '<p class=" u-padding-sides-big paragraph-big__dark">';
                    }
                    elseif($component_module_datafield->tag_id == 9){
                        $text = '</p>';
                    }
                    elseif($component_module_datafield->tag_id == 11){
                        $text = '<p class="u-margin-bottom-medium-small u-padding-sides-big"></p>';
                    }
                    array_push($datafields, $text);
                }

                elseif($component_module_datafield->data_type == 'img')
                {
                    if($component_module_datafield->tag_id == 6){
                        $text = '<img class="u-margin-bottom-big " style="width: 100%;" src="/img/' . ImageData::where('id', '=',  $data_link->imagedata_id)->firstOrFail()->filename . '">';
                    }
                    if($component_module_datafield->tag_id == 7){
                        $text = '<img class="image-banner" src="/img/' . ImageData::where('id', '=',  $data_link->imagedata_id)->firstOrFail()->filename . '">';
                    }

                    array_push($datafields, $text);
                }
                
                elseif($component_module_datafield->data_type == 'link')
                {
                    if($component_module_datafield->tag_id == 5){
                        $text = '<a class="link paragraph-big__dark" target="blank" href="' . 
                        LinkData::where('id', '=',  $data_link->linkdata_id)->firstOrFail()->link_name . 
                        '"> {{ __(\'home.' . TextData::where('id', '=', $data_link->textdata_id)->firstOrFail()->key_name . '\') }} </a>';
                    }

                    array_push($datafields, $text);
                }

        }

        //Here you have the different blueprints. The data is put in the correct place
        if($module->component_module_blueprint_id == 1)
        {
            $imploded_datafields = implode($datafields);

            $data_array = 
            '
                <section class="centered-text-and-images">' . $imploded_datafields . '</section>
            ';

            return $data_array;

        }


       

    }
    public function getComponentHTML($component, $module)
    {

        //Get all the datafields
        $component_module_datafields = ComponentModuleDatafield::where('component_module_id', '=', $module->id)->orderBy('index')->get();

        $datafields = array();

        foreach($component_module_datafields as $component_module_datafield)
        {

            $data_link = DataLink::where('field_id', '=', $component_module_datafield->id)->where('component_id', '=', $component->id)->firstOrFail();
            
                if($component_module_datafield->data_type == 'text')
                {
                    $text = '{{ __(\'home.' . TextData::where('id', '=', $data_link->textdata_id)->firstOrFail()->key_name . '\') }}';

                    array_push($datafields, $text);
                }
                elseif($component_module_datafield->data_type == 'img')
                {
                    $text = ImageData::where('id', '=',  $data_link->imagedata_id)->firstOrFail()->filename;
                    array_push($datafields, $text);
                }

        }

 ////*********** MODULES ************////


        //Home header
        if($module->id == 3)
        {
            $data =  
            '
            <header class="header-main" style="background-image:url(/img/home.jpg);">

                <div class="overflow-padding">
                    <div class="header-main__dots header-main__dots--left">
                            <img src="img/dot-effect-1.png" alt="A set of dot to create an nice effect over the header image"
                                    class="">
                    </div>
                </div>
        
                <h1 class="header-main__h1">
                ' . (isset($datafields[0]) ? $datafields[0] : '')  . '<br>' . (isset($datafields[1]) ? $datafields[1] : '')  . '
                </h1>
        
                <div class="overflow-padding">
                    <div class="header-main__dots header-main__dots--right">
                            <img src="/img/dot-effect-1.png" alt="A set of dot to create an nice effect over the header image">
                    </div>
                </div>
            
            </header>
            ';
        
            return $data;
        }


        //A thick retro bar!
        if($module->id == 4)
        {
            $data =  
            '
            <div class="retro-bar-full">
                <img src="img/retro-bar-1.svg" alt="A thick colorfull line stretching over the full width of the website">
            </div>
            ';
        
            return $data;
        }

        //Testing module
        if($module->id == 3)
        {
            $data =  
            '
                <h1>' . (isset($datafields[0]) ? $datafields[0] : '')  . '</h1>
                <h1>' . (isset($datafields[1]) ? $datafields[1] : '') . '</h1>
                <img src="/img/' . (isset($datafields[2]) ? $datafields[2] : '') . '">
            ';
        
            return $data;
        }

    }
}

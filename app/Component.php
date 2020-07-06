<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function getComponentHTMLCustomed($component, $module, $data_links, $datafields)
    {
        ////*********** CLIENT CUSTOMT MODULE HANDLER ************////
       /* if($module->is_custom == 1)
        {
            $i = 0;

            foreach($datafields as $datafield)
            {
                if($datafield->tag = "H1")
                {
                    $data_array = 
                    "
                        <h1>" . (isset($text[$i]) ? $text[$i] : '') . " </h1>
                    ";
                }
                $i++;
            }
            //Get all data fields
            //If field has data, 
                //Get data for each fields


            //Make a

            //Create a section
            //Get all the fields with there tag
            //Put the code??
        }*/


        ////*********** MODULE ************////

        //Header main

        //Filter all the data bij field index(use field id)
        //Then for all the data
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

        if($module->id == 1)
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

        if($module->id == 2)
        {
            $data =  
            '
            <div class="retro-bar-full">
                <img src="img/retro-bar-1.svg" alt="A thick colorfull line stretching over the full width of the website">
            </div>
            ';
        
            return $data;
        }

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

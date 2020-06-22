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
    public function getComponentHTML($componentName, $text, $image)
    {
        ////*********** CLIENT CUSTOMT COMPONENT HANDLER ************////
        if($componentcustom = 1)
        {
            //Foreach contentfield
            //if content field is text
            //Get tag, textdata, class. Echo
            //else if content field is image
            //get image url get class
        }


        ////*********** COMPONENTS ************////

        //Header main
        if($componentName = "Header Main")
        {
            $data =  
            "
                <h1>" . (isset($text[0]) ? $text[0] : '') . "<h1>
                <h1>" . (isset($text[1]) ? $text[1] : '') . "<h1>
            ";
        
            return $data;
        }

    }
}

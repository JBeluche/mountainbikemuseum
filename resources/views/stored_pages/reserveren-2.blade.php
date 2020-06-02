

@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent        


    <section class="fiets-reserveren__section">
        <h1 class="header-main__h1">{{ __('reserveren_2.page_title') }}</h1>
        <hr class="fiets-reserveren__heading-line">

            <form method="POST" action="/{{$page->name}}/mail" class="reserving-form">
                @csrf
                <div class="reserving-form__item--col-1">
                    <label for="Voorletters" class="main-form__label">{{ __('reserveren_2.form_item_1') }}</label> 
                    <input  type="text" required name="voorletters" placeholder="{{ __('reserveren_2.form_item_1') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-2">
                    <label for="Tussenvoegsel" class="main-form__label">{{ __('reserveren_2.form_item_2') }}</label> 
                    <input  type="text" name="tussenvoegsel" placeholder="{{ __('reserveren_2.form_item_2') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-4-full">
                    <label for="Land" class="main-form__label">{{ __('reserveren_2.form_item_3') }}</label> 
                    <input  type="text" required name="land" placeholder="{{ __('reserveren_2.form_item_3') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-1 main-form__dropdown">
                    <label for="Achternaam" class="main-form__label">{{ __('reserveren_2.form_item_4') }}</label> 
                    <input  type="text" required name="achternaam" placeholder="{{ __('reserveren_2.form_item_4') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-2 main-form__dropdown">
                    <label for="Type Klant" class="main-form__label">{{ __('reserveren_2.form_item_5a') }}</label>    
                    <select required name="type_klant" >
                        <option>{{ __('reserveren_2.form_item_5b') }}</option>
                        <option>{{ __('reserveren_2.form_item_5c') }}</option>
                    </select>               
                </div>
                
                <div class="reserving-form__item--col-4">
                    <label for="Postcode" class="main-form__label">{{ __('reserveren_2.form_item_6') }}</label> 
                    <input  type="text"  name="postcode" placeholder="{{ __('reserveren_2.form_item_6') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-5">
                    <label for="Plaats" class="main-form__label">{{ __('reserveren_2.form_item_7') }}</label> 
                    <input  type="text" required name="plaats" placeholder="{{ __('reserveren_2.form_item_7') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-1-full">
                    <label for="E-mail" class="main-form__label">{{ __('reserveren_2.form_item_8') }}</label> 
                    <input  type="text" required name="email" placeholder="{{ __('reserveren_2.form_item_8') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-4-full">
                    <label for="Straatnaam" class="main-form__label">{{ __('reserveren_2.form_item_9') }}</label> 
                    <input  type="text"  name="straatnaam" placeholder="{{ __('reserveren_2.form_item_9') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-1-full">
                    <label for="Telefoon" class="main-form__label">{{ __('reserveren_2.form_item_10') }}</label> 
                    <input  type="number" required name="telefoon" placeholder="{{ __('reserveren_2.form_item_10') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-4">
                    <label for="Huisnummer" class="main-form__label">{{ __('reserveren_2.form_item_11') }}</label> 
                    <input  type="number"  name="huisnummer" placeholder="{{ __('reserveren_2.form_item_11') }}" class="main-form__input main-form__input">                    
                </div>
                
                <div class="reserving-form__item--col-5">
                    <label for="Toevoeging" class="main-form__label">{{ __('reserveren_2.form_item_12') }}</label> 
                    <input  type="text"  name="toevoeging" placeholder="{{ __('reserveren_2.form_item_12') }}" class="main-form__input main-form__input">                    
                </div>

                <hr class="reserving-form__item--col-3-full fiets-reserveren__heading-line u-margin-top-bottom-medium">              

                <div class=" main-form__dropdown reserving-form__item--col-1-full">
                    <label for="Aankomsttijd" class="main-form__label">{{ __('reserveren_2.form_item_13') }}</label> 
                    <select name="aankomsttijd">
                        @for ($i = 8; $i < 21; $i++)  
                        @if($i > 19)                                             
                            <option value="{{$i}}:00">{{$i}}:00</option>      
                        @else                                         
                            <option value="{{$i}}:00">{{$i}}:00</option>                        
                            <option value="{{$i}}:15">{{$i}}:15</option>                        
                            <option value="{{$i}}:30">{{$i}}:30</option>                        
                            <option value="{{$i}}:45">{{$i}}:45</option>
                        @endif
                        @endfor
                    </select>
                </div>
                
                <div class="reserving-form__item--col-4-full">
                    <label for="date" class="main-form__label">{{ __('reserveren_2.form_item_14') }}</label> 
                <input type="text" class="main-form__input main-form__input" required placeholder="{{date("d/m/Y")}}" id="date" name="date" 
                        onkeyup="date_reformat_dd(this);" 
                        onkeypress="date_reformat_dd(this);" 
                        onpaste="date_reformat_dd(this);" 
                        autocomplete="off">                    
                </div>

                <div class=" main-form__dropdown reserving-form__item--col-1-full">
                    <label for="duration" class="main-form__label">{{ __('reserveren_2.form_item_15') }}</label> 
                    <select name="duration">
                        @for ($i = 1; $i < 11; $i++)       
                            @if($i > 9)                                
                                <option value="{{$i}}:00">{{$i}}:00 {{ __('reserveren_2.form_item_15') }}</option>      
                            @else
                                <option value="{{$i}}:00">{{$i}}:00 {{ __('reserveren_2.uur') }}</option>                         
                                <option value="{{$i}}:30">{{$i}}:30 {{ __('reserveren_2.uur') }}</option>      
                            @endif
                        @endfor
                    </select>
                </div>
                
                <div class="reserving-form__item--col-4-full">
                    <label for="comment" class="main-form__label">{{ __('reserveren_2.form_item_16a') }}</label> 
                    <input  type="text"  name="comment" placeholder="{{ __('reserveren_2.form_item_16b') }}" class="main-form__input main-form__input">                    
                </div>
                
               
                {{--All hidden field are value that will need to be send to user--}}
                @if(Session::has('persons'))
                    @foreach(Session::get('persons')['persons'] as $person)
                        <input type="hidden" value="{{$person}}" name="persons[]">
                    @endforeach                    
                    
                @endif

                <div class=" main-form__down-centered u-margin-top-medium"
                        style="grid-column: 1 / 6;">
                        
                <button type="submit" class="main-form__button">{{ __('reserveren_2.bestel_btn') }}</button>
            </div>


            </form>



    </section>
    
    @stop
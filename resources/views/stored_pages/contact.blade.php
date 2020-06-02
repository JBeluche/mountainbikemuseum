@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent
    <section class="big-grey-card__section big-grey-card__section--contact dropshadow-4">



        <div class="big-grey-card__background-wrapper big-grey-card__background-wrapper--contact">
            <img src="img/contact-1.jpg" alt="" class="big-grey-card__background-image">
            
            <img src="img/retro-bar-1.svg"  alt="" class="big-grey-card__background-retro-bar"">
            <img src="img/contact-2.jpg" alt="" class="big-grey-card__background-image">

            <img src="img/retro-bar-1.svg" class="big-grey-card__background-retro-bar"">
        </div>
 
        <a href="https://goo.gl/maps/1uZBnpUAdpqPTKNm7"  title="An image of google maps with the location of the museum" target="blank" class="big-grey-card__card-map">
        </a>

        <div class="big-grey-card__card-container big-grey-card__card-container--contact"> 
            <div class="big-grey-card__grey-area-fix big-grey-card__contact-wrapper paragraph-medium__light" id="main_textfield">
           
                <h2 class="big-grey-card__contact-header heading-1 u-margin-bottom-big">{{ __('contact.page_title') }}</h2>

                <div class="big-grey-card__contact-contact-1">
                    <ul>
                        <li>{{$footer[0]->name_company}}</li>
                        <li>{{$footer[0]->address_part1}}</li>
                        <li>{{$footer[0]->address_part2}}</li>
                    </ul>
                </div>
                <div class="big-grey-card__contact-contact-2">
                    <ul>
                        <li>{{$footer[0]->name_owner}}</li>
                        <li>{{$footer[0]->phone_number}}</li>
                        <li>{{$footer[0]->email}}</li>
                    </ul>
                </div>
                <div  class="big-grey-card__contact-openinghours">
                    <div class="footer__opening-hours--left">
                        <ul>
                            <li>{{ __('footer.Maandag') }}</li>
                            <li>{{ __('footer.Dinsdag') }}</li>
                            <li>{{ __('footer.Woensdag') }}</li>
                            <li>{{ __('footer.Donderdag') }}</li>
                            <li>{{ __('footer.Vrijdag') }}</li>
                            <li>{{ __('footer.Zaterdag') }}</li>
                            <li>{{ __('footer.Zondag') }}</li>
                        </ul>
                    </div>
                    <div class="footer__opening-hours--center">
                        <ul>
                            <li>-</li>
                            <li>-</li>
                            <li>-</li>
                            <li>-</li>
                            <li>-</li>
                            <li>-</li>
                            <li>-</li>
                        </ul>
                    </div>
                    <div class="footer__opening-hours--right">
                        <ul>
                            <li>{{ __('footer.closed') }}</li>
                            <li>{{ __('footer.closed') }}</li>
                            <li>{{ __('footer.closed') }}</li>
                            <li>{{ __('footer.closed') }}</li>
                            <li>{{ __('footer.openen_from_1') }}</li>
                            <li>{{ __('footer.openen_from_1') }}</li>
                            <li>{{ __('footer.openen_from_1') }}</li>
                        </ul>
                    </div>
                </div>

                <img src="img/retro-bar-2.svg" class="big-grey-card__contact-bottom-bar" alt="Retro looking bar">
            </div>
        </div>

      
        <div class="big-grey-card__contact-form-wrapper">
            <div class="contact-form big-grey-card__centered-card big-grey-card__contact-form">

                <span class="dropshadow-5-filter">
                <div class="contact-form__left">
                    <p class="contact-form__left--text paragraph-big__dark u-margin-bottom-medium">
                        {{ __('contact.contact_form') }}</p>
                    <hr class="contact-form__left--line u-margin-bottom-medium">
                </div>
            </span>
                <div class="contact-form__right contact-form__right--dark">
                    <form method="POST" action="/{{$page->name}}/mail"  class="contact-form__form">
                        @csrf
                        <h4 class="heading-4 u-margin-bottom-small">{{ __('main.contact_intro') }}</h4>
                        <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_name') }}</p>
                        <input class="input-field-base u-margin-bottom-small" required type="text" name='name' placeholder="{{ __('main.contact_name_placeholder') }}">
                        <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_mail') }}</p>
                        <input class="input-field-base u-margin-bottom-small" required type="email" name='email' placeholder="{{ __('main.contact_mail_placeholder') }}">
                        <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_msg') }}</p>
                        <input type="hidden" name="page" value="Contact">
                        <textarea class="input-field-base input-field__long-text u-margin-bottom-medium" required name='message'  placeholder="{{ __('main.contact_msg_placeholder') }}"></textarea>
                        <button type="submit" class="btn-pink">{{ __('main.click_here') }}</button>
                    </form>
                </div>
            </div>
        </div>
</section>


@include('scripts.dynamic_background') 

    @stop
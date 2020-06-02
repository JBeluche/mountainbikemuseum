<div class="contact-form">

    <span class="dropshadow-5-filter">
    <div class="contact-form__left">
        <p class="contact-form__left--text paragraph-big__dark u-margin-bottom-medium">{{ __('arrangementen.contact_text_1') }}</p>
        <hr class="contact-form__left--line u-margin-bottom-medium">
        <p class="contact-form__left--text paragraph-big__dark u-margin-bottom-medium">{{ __('arrangementen.contact_text_2') }}</p>
        <div class="contact-form__left--btn-wrapper">
            <img class="contact-form__left--bike-icon" src="img/svg/bicycle-solid.svg" alt="An pink icon of a bike">
            <a href="Fietsenverhuur"><button class="btn-pink">{{ __('main.click_here') }}</button></a>
        </div>
    </div>
</span>
<div class="contact-form__right contact-form__right--dark">
    <form method="POST" action="/contact/mail"  class="contact-form__form">
        @csrf
        <h4 class="heading-4 u-margin-bottom-small">{{ __('main.contact_intro') }}</h4>
        <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_name') }}</p>
        <input class="input-field-base u-margin-bottom-small" required type="text" name='name' placeholder="{{ __('main.contact_name_placeholder') }}">
        <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_mail') }}</p>
        <input class="input-field-base u-margin-bottom-small" required type="email" name='email' placeholder="{{ __('main.contact_mail_placeholder') }}">
        <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_msg') }}</p>
        <input type="hidden" name="page" value="Arrangementen">
        <textarea class="input-field-base input-field__long-text u-margin-bottom-medium" required name='message'  placeholder="{{ __('main.contact_msg_placeholder') }}"></textarea>
        <button type="submit" class="btn-pink">{{ __('main.contact_send') }}</button>
    </form>
</div>

</div>

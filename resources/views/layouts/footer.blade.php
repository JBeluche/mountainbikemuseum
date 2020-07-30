@if ($errors->any() or session('message'))

    <div class="l-modal is-hidden--off-flow js-modal-shopify">
        <div class="l-modal__shadow js-modal-hide"></div>
        <div class="c-popup l-modal__body dropshadow-5">
            @if(session('message'))
            <h3 class="heading-3">{{ session('message') }}</h3>
            @elseif($errors->any())
            <h1 class="heading-3 u-margin-bottom-small">{{ __('footer.correct') }}</h1>
            <ul class="paragraph-regular__light">
                @foreach ($errors->all() as $error)
                <li class="u-margin-bottom-small">{!! $error !!}</li>
                @endforeach
            </ul>
            @endif
            <p class="popup-close" id="close-alert-button"><img src="/img/svg/close.svg" alt="An x to close the window"></p>
        </div>
    </div>

    <script>
        //***********
        // This is the alert box function 
        //***********
        $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
        $('.js-modal-hide').click(function(){
        $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
        });
        document.getElementById("close-alert-button").onclick = function() {
            $('.js-modal-shopify').toggleClass('is-shown--off-flow').toggleClass('is-hidden--off-flow');
            };
    </script>

@endif

{{--This is an arrow to help user know there is content below. It disappears when user is at bottom of page --}}
   <div id="arrow_wrapper" class="arrow_wrapper">
        <div id="arrow-1" class="arrow arrow-first"></div>
        <div id="arrow-2" class="arrow arrow-second"></div>
    </div> 


<footer class="footer paragraph-medium__dark">
    <div class="footer__information-1">
        <div class="footer__information--inside-box">
            <ul>
                <li>{{$footer[0]->name_company}}</li>
                <li>{{$footer[0]->address_part1}}</li>
                <li>{{$footer[0]->address_part2}}</li>
            </ul>

        </div>
    </div>

    <hr class="small-device-line small-device-line-2">

    <div class="footer__information-2">
        <div class="footer__information--inside-box">
            <ul>
                <li>{{$footer[0]->name_owner}}</li>
                <li>{{$footer[0]->phone_number}}</li>
                <li>{{$footer[0]->email}}</li>
            </ul>

        </div>
    </div>

    <hr class="small-device-line small-device-line-3">

    <div class="footer__social">

        <p>{{ __('footer.social_media') }}</p>
        <div class="footer__social--icon-wrapper">
            <br>
            <a target="_blank" href="https://www.facebook.com/dutchmountainbikemuseum">
                <img src="/img/facebook-square-black.svg" alt="Facebook Icon">
            </a>
            <a target="_blank" href="https://www.instagram.com/explore/locations/223268221132659/mountainbike-museum/">
                <img src="/img/instagram-black.svg" alt="Instagram Icon">
            </a>
        </div>
    </div>

    <hr class="small-device-line small-device-line-1">

    <div class="footer__opening-hours">
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

@include('layouts.cookie_melding')

</footer>

<div class="footer__credits">
    <p>Tekst door <a href="https://www.cactusprikkelt.nl/" style="text-decoration: none; color: #EEEEEE;">Cactus Educatie & Communicatie </a> </p>
    <p>Happily created by Jeremie Beluche at creatingmountains.com</p>
    <p>Copyright &copy; &#183; All Rights Reserved by &#183; Point M</p>
</div>


@stack('scripts')


<script>
    function checkValue(str, max) {
				if (str.charAt(0) !== '0' || str == '00') {
					var num = parseInt(str);
					if (isNaN(num) || num <= 0 || num > max) num = 1;
					str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
				};
				return str;
			};

  // reformat by date
		function date_reformat_dd(date) {
			date.addEventListener('input', function(e) {
				this.type = 'text';
				var input = this.value;
				if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
				var values = input.split('/').map(function(v) {
					return v.replace(/\D/g, '')
				});
				if (values[1]) values[1] = checkValue(values[1], 12);
				if (values[0]) values[0] = checkValue(values[0], 31);
				var output = values.map(function(v, i) {
					return v.length == 2 && i < 2 ? v + ' / ' : v;
				});
				this.value = output.join('').substr(0, 14);
			});
		}


    //Check if the window is at the bottom of the page, add an arrow if it isn't
    window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= (document.body.offsetHeight - 220)) {
        var link = document.getElementById('arrow_wrapper');
        link.style.display = 'none'; //or
        link.style.visibility = 'hidden';
    }
};



/****
**This is for the dropdown on mobiles
******/

var dropdown = document.getElementById("dropdown_event");
dropdown.onclick = function(){
var dropdownContent = document.getElementsByClassName("dropdown__content");
var dropdownBtn = document.getElementsByClassName("dropdown__btn");


var dropdownContent2 = document.getElementsByClassName("dropdown__content")[1];
var dropdownBtn2 = document.getElementsByClassName("dropdown__btn")[1];
var dropdownContent3 = document.getElementsByClassName("dropdown__content")[2];
var dropdownBtn3 = document.getElementsByClassName("dropdown__btn")[2];



dropdownContent.style.display = "block";
    dropdownContent.style.backgroundColor = "#ddd";
    dropdownBtn.style.backgroundColor = "#571575";

    
    dropdownContent2.style.display = "block";
    dropdownContent2.style.backgroundColor = "#ddd";
    dropdownBtn2.style.backgroundColor = "#571575";

    
    dropdownContent3.style.display = "block";
    dropdownContent3.style.backgroundColor = "#ddd";
    dropdownBtn3.style.backgroundColor = "#571575";
   
};


/*This stuff is for the cookie popup at the bottom of the page*/

(function (factory) {
	if (typeof define === 'function' && define.amd) {
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		factory(require('jquery'));
	} else {
		factory(jQuery);
	}
}(function ($) {
	var pluses = /\+/g;
	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}
	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}
	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}
	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}
		try {
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}
	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}
	var config = $.cookie = function (key, value, options) {
		if (value !== undefined && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);
			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}
			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '',
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}
		var result = key ? undefined : {};
		var cookies = document.cookie ? document.cookie.split('; ') : [];
		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');
			if (key && key === name) {
				result = read(cookie, value);
				break;
			}
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}
		return result;
	};
	config.defaults = {};
	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};
}));
$(".close-cookie-warning").on("click", function() {
  $.cookie('HideCookieMessage', 'true', { expires: 120, path: '/'});
  $('div.cookies').hide();
});
(function ($) {
  if ($.cookie('HideCookieMessage')) { $('.cookies').hide(); } else {
    $('.cookies').show(); }
})(jQuery);



</script>
</body>

</html>
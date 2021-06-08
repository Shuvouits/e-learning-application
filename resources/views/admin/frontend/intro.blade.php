<style type="text/css">
    :root {

        --linear-gradient-bg-color: linear-gradient(-45deg, #F44A4A 0, #6E1A52 100%);
        --linear-gradient-reverse-bg-color: linear-gradient(-45deg, #6E1A52 0, #F44A4A 100%);
        --linear-gradient-about-bg-color: linear-gradient(197.61deg, #F44A4A, #6E1A52);
        --linear-gradient-about-blue-bg-color: linear-gradient(40deg, #1A263A 33%, #4A8394 84%);
        --linear-gradient-career-bg-color: linear-gradient(22.72914987deg, #F5C252 4%, #6AC1D0);
        --background-blue-bg-color: #0284A2;
        --background-red-bg-color: #F44A4A;
        --background-grey-bg-color: #F7F8FA;
        --background-light-grey-bg-color: #F9F9F9;
        --background-black-bg-color: #29303B;
        --background-white-bg-color: #FFF;
        --background-mehroon-bg-color: #992337;
        --text-black-color: #29303B;
        --text-light-grey-color: #777;
        --text-red-color: #F44A4A;
        --text-dark-grey-color: #686F7A;
        --text-blue-color: #0284A2;
        --text-dark-blue-color: #003845;
        --text-white-color: #FFF;
    }
</style>


<style>
    #cookieWrapper {
        position: fixed;
        bottom: 0;
        width: 100%;
        z-index: 100;
        margin: 0;
        border-radius: 0;
        background-color: var(--background-blue-bg-color) !important;
    }

    .bg-primary {
        background-color: var(--background-blue-bg-color) !important;
    }

    .btn-warning {
        background-color: var(--background-red-bg-color) !important;
        border: 1px solid var(--background-red-bg-color) !important;
        color: var(--text-white-color);
    }

    .cookie-consent__message {
        color: var(--text-white-color);
    }
</style>



<div id="cookieWrapper" class="bg-primary text-white w-100 py-3 text-center cookierbar js-cookie-consent cookie-consent">
    <span class="cookie-consent__message">
        Your experience on this site will be improved by allowing cookies.&nbsp;&nbsp;
    </span>
    <button class="btn btn-sm btn-warning js-cookie-consent-agree cookie-consent__agree">
        Allow cookies
    </button>
</div>

<script>
    window.laravelCookieConsent = (function() {

        const COOKIE_VALUE = 1;
        const COOKIE_DOMAIN = '';

        function consentWithCookies() {
            setCookie('laravel_cookie_consent', COOKIE_VALUE, 7300);
            hideCookieDialog();
        }

        function cookieExists(name) {
            return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
        }

        function hideCookieDialog() {
            const dialogs = document.getElementsByClassName('js-cookie-consent');

            for (let i = 0; i < dialogs.length; ++i) {
                dialogs[i].style.display = 'none';
            }
        }

        function setCookie(name, value, expirationInDays) {
            const date = new Date();
            date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
            document.cookie = name + '=' + value +
                ';expires=' + date.toUTCString() +
                ';domain=' + COOKIE_DOMAIN +
                ';path=/' +
                '';
        }

        if (cookieExists('laravel_cookie_consent')) {
            hideCookieDialog();
        }

        const buttons = document.getElementsByClassName('js-cookie-consent-agree');

        for (let i = 0; i < buttons.length; ++i) {
            buttons[i].addEventListener('click', consentWithCookies);
        }

        return {
            consentWithCookies: consentWithCookies,
            hideCookieDialog: hideCookieDialog
        };
    })();
</script>


<!-- Mirrored from eclass.mediacity.co.in/demo/public/home by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 01:34:28 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
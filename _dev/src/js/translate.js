const Cookies = require('js-cookie');

const googleTranslateConfig = {
    lang: "en",
    domain: "ctoec.org"
};

window.TranslateInit = function() {
    let code = TranslateGetCode();

    if (code == googleTranslateConfig.lang) {
        TranslateCookieHandler(null, googleTranslateConfig.domain);
    }

    new google.translate.TranslateElement({
        pageLanguage: googleTranslateConfig.lang,
    });

    TranslateEventHandler('click', '[data-google-lang]', function (e) {
        TranslateCookieHandler("/" + googleTranslateConfig.lang + "/" + e.target.getAttribute("data-google-lang"), googleTranslateConfig.domain);
        window.location.reload();
    });
}

function TranslateGetCode() {
    let lang = (Cookies.get('googtrans') != undefined && Cookies.get('googtrans') != "null") ? Cookies.get('googtrans') : googleTranslateConfig.lang;
    return lang.match(/(?!^\/)[^\/]*$/gm)[0];
}

function TranslateCookieHandler(val, domain) {
    Cookies.set('googtrans', val);
    Cookies.set("googtrans", val, {
        domain: "." + document.domain,
    });

    if (domain == "undefined") return;
    
    Cookies.set("googtrans", val, {
        domain: domain,
    });

    Cookies.set("googtrans", val, {
        domain: "." + domain,
    });
}

function TranslateEventHandler(event, el, handler) {
    document.addEventListener(event, function (e) {
        if (e.target.closest(el)) handler(e);
    });
}
window.addEventListener("load", function(){
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
            "background": "#efefef",
            "text": "#404040"
            },
            "button": {
            "background": "#8ec760",
            "text": "#ffffff"
            }
        },
        "type": "opt-in",
        "content": {
            "message": "Ce site utilise des cookies. En continuant à utiliser ce site, vous acceptez leur utilisation.",
            "dismiss": "Got it",
            "allow": "Accepter",
            "deny": "Refuser",
            "link": "ici",
            "href": "/politique",
            "policy": 'Cookies',
        }
    });
});
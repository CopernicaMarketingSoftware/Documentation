# Productupdate - REST API v4 en webhooks op specifieke velden

## Nieuwe REST API v4 met JWT-autorisatie
Vandaag introduceert Copernica versie 4 van de REST API. Deze nieuwe versie heeft een ander login- en autorisatiesysteem om de veiligheid te vergroten. De login-tokens maken voortaan niet langer deel uit van de URL en zijn daardoor minder kwetsbaar als een API-URL wordt geknipt en geplakt. Bovendien hebben de tokens een kortere levensduur om de kans verder te verkleinen dat ze in verkeerde handen vallen.

In ons [blogartikel](https://www.copernica.com/nl/blog/post/nieuwe-rest-api-v4-met-jwt-autorisatie) lees je wat je moet doen om over te stappen.

## Webhooks limiteren op specifieke velden
Het is nu mogelijk om webhooks alleen uit te voeren wanneer er wijzigingen zijn gedaan in een specifiek veld van een (sub)profiel. Webhooks worden gebruikt om de wijzigingen in Copernica te synchroniseren naar een extern systeem. Door enkel de wijzigingen in een specifiek veld door te sturen, voorkom je onnodige belasting van je server.

Je kunt dit instellen bij de [webhooks](https://ms.copernica.com/#/admin/account/webhooks) die gekoppeld staan aan een database of collectie.

## Verbeteringen Marketing Suite 
In de [profielen](https://ms.copernica.com/#/profiles)-module wordt nu per gebruiker opgeslagen of de optie om collecties weer te geven in- of uitgeschakeld is. Hierdoor hoef je niet meer dagelijks dezelfde optie aan te vinken om de collecties te bekijken.

Bovendien hebben we ervoor gezorgd dat het overzicht in de [profielen](https://ms.copernica.com/#/profiles)-module niet meer automatisch wordt herladen wanneer er op de achtergrond wijzigingen worden doorgevoerd, bijvoorbeeld via imports of API-calls.

Verder hebben we in de [resultaten](https://ms.copernica.com/#/results)-module het verwachte aantal ontvangers van je mailing toegevoegd. Dit verwachte aantal is gebaseerd op de huidige hoeveelheid (sub)profielen in de (mini)selectie.

Daarnaast is het nu mogelijk om in de [e-mail-editor](https://ms.copernica.com/#/design) mappen te kopiëren inclusief de onderliggende templates.

## Vertaalmodule bereikbaar via de REST API
We hebben methodes toegevoegd om de [vertaalmodule](https://www.copernica.com/nl/documentation/multi-language) bereikbaar te maken via de REST API. Het is nu mogelijk om een nieuwe [vertaling aan te maken](https://www.copernica.com/nl/documentation/restv4/rest-post-ms-template-translations), [vertalingen op te vragen](https://www.copernica.com/nl/documentation/restv4/rest-get-ms-template-translations) of [vertalingen bij te werken](https://www.copernica.com/nl/documentation/restv4/rest-put-ms-template-translations).

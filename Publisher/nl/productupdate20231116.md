# Productupdate - Introductie REST API v4 en webhooks op specifieke velden

## Introductie versie 4 van onze REST API
We hebben een nieuwe versie van de REST API uitgebracht. Versie 4 van de REST API heeft een ander authorisatiesysteem waardoor koppelingen wat minder gevoelig zijn voor fouten van gebruikers. Het API-token wordt in deze versie niet meer via de URL meegestuurd, waardoor gebruikers die URL's knippen en plakken niet langer per ongeluk het API-token met anderen kunnen delen.

In ons [blogartikel](https://www.copernica.com/nl/blog/post/nieuwe-rest-api-v4-met-jwt-autorisatie) vind je meer uitleg over wat er nieuw is en wat je moet doen om over te stappen. Hoewel de vorige versies (v1 tot en met v3) nog actief blijven en je dus nog niet onmiddellijk actie hoeft te ondernemen, is een overstap wel aan te raden.

## Webhooks limiteren op specifieke velden
Het is nu mogelijk om webhooks alleen uit te laten voeren wanneer er wijzigingen zijn gedaan in specifieke velden van een (sub)profiel. Webhooks worden gebruikt om wijzigingen in Copernica te synchroniseren naar een extern systeem - bijvoorbeeld naar jouw eigen webserver of database.

Als je voorheen een webhook had geconfigureerd, dan werd er voor élke profiel- of subprofielwijziging een call vanuit Copernica gestuurd naar de webhook, zelfs als dit onbelangrijke of irrelevante wijzigingen waren. Dit webhooksysteem is nu beter te configureren: je kunt voortaan instellen dat je alleen deze calls wilt ontvangen als er een specifiek veld van waarde verandert. Hierdoor wordt jouw server minder belast.

Het limiteren van [webhooks](https://ms.copernica.com/#/admin/account/webhooks) is mogelijk als deze gekoppeld zijn aan een database of collectie.

## Verbeteringen Marketing Suite 
In de [profielen](https://ms.copernica.com/#/profiles)-module wordt nu per gebruiker opgeslagen of de optie om collecties weer te geven in- of uitgeschakeld is. Hierdoor hoef je niet meer dagelijks dezelfde optie aan te vinken om de collecties te bekijken.

Bovendien hebben we ervoor gezorgd dat het overzicht in de [profielen](https://ms.copernica.com/#/profiles)-module niet meer automatisch wordt herladen wanneer er op de achtergrond wijzigingen worden doorgevoerd, bijvoorbeeld via imports of API-calls.

Verder hebben we in de [resultaten](https://ms.copernica.com/#/results)-module het verwachte aantal ontvangers van je mailing toegevoegd. Dit verwachte aantal is gebaseerd op de huidige hoeveelheid (sub)profielen in de (mini)selectie.

Daarnaast is het nu mogelijk om in de [e-mail-editor](https://ms.copernica.com/#/design) mappen te kopiëren inclusief de onderliggende templates.

## Vertaalmodule bereikbaar via de REST API
We hebben methodes toegevoegd om de [vertaalmodule](https://www.copernica.com/nl/documentation/multi-language) bereikbaar te maken via de REST API. Het is nu mogelijk om een nieuwe [vertaling aan te maken](https://www.copernica.com/nl/documentation/restv4/rest-post-ms-template-translations), [vertalingen op te vragen](https://www.copernica.com/nl/documentation/restv4/rest-get-ms-template-translations) of [vertalingen bij te werken](https://www.copernica.com/nl/documentation/restv4/rest-put-ms-template-translations).

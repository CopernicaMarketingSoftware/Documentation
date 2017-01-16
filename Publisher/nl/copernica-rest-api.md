# De Copernica REST API
Met de Copernica REST API kun je data in je Copernica-account ophalen, creeeren, updaten of verwijderen zonder daarvoor gebruik te maken van de Copernica applicaties REST staat voor Representational State Transfer en het belangrijkste kenmerk ervan is dat het HTTP requests gebruikt als communicatiemiddel tussen Copernica de API en jouw device. Copernica's API maakt alleen gebruik van HTTPS. Dit houdt in dat er gebruik wordt gemaakt van een vergrendelde HTTP-connectie zodat je zeker weet dat er niet met je data geknoeid wordt tijdens de overdracht.
De REST-service is beschikbaar op [https://api.copernica.com](https://api.copernica.com).

Je kunt de REST API bijvoorbeeld gebruiken om profielinformatie op te halen. Als je alle informatie van een bepaald profiel met ID 1234 wil ophalen, ziet je request er als volgt uit:

`https://api.copernica.com/profile/1234?access_token=abc123`

## HTTP requests
Zoals gebruikelijk bij REST API's, maakt ook Copernica's API gebruik van HTTP requests om data op te halen of te bewerken. We gebruiken vier soorten requests: GET, POST, PUT en DELETE. GET geeft de server de opdracht om de data die jij opvraagt door te sturen. Met POST kun je data toevoegen, zoals bijvoorbeeld profielen of databases. PUT is het commando om bestaande data te updaten. DELETE wordt, zoals je misschien al geraden hebt, gebruikt om data te verwijderen. In de [lijst met resources]() kun je vinden welke soort requests iedere methode ondersteunt.

## Beginnen met de REST API
Voordat je kunt beginnen met API calls doen, moet je eerst toegang krijgen tot de API. Om die te verkrijgen, is het nodig dat je jouw applicatie registreert. Anders dan je misschien zou verwachten, gebeurt dit niet via het dashboard van de Publisher of MarketingSuite, maar via de Copernica-website. Je vindt de module onder ['applicaties'](https://www.copernica.com/nl/applications/create), waar je jouw applicatie toe te voegen. Daarna klik je op je applicatie in de [lijst](https://www.copernica.com/nl/applications) onderaan de pagina en voeg je jouw account toe door op 'account toevoegen' te klikken en je account te selecteren uit de lijst, waarna je jouw accountnaam en access key onderaan de pagina zult zien staan.
Wanneer je je access key hebt, kun je beginnen met het doen van calls.

## API calls doen
Wanneer je applicatie geregistreerd is en je jouw access token hebt verkregen, kun je beginnen met het maken van calls.

### Onderdelen van een call
Een HTTP call bestaat uit de volgende onderdelen:
**De URI**: een verwijzing naar de bron waar je de data vandaan wil halen met daarin tevens de query, de opdracht die je de server geeft. In de Copernica REST API heeft deze de volgende vorm: `https://api.copernica.com/$method/$ID?access_token=abc123`. Hierbij moeten $method en $ID natuurlijk vervangen worden door de method en ID die van toepassing zijn. Achter access_token komt jouw eigen access token te staan.

**Header fields**: deze geven informatie over de request weer, zoals bijvoorbeeld het type content van de body, de datum, de server, et cetera.

**De body**: de body is optioneel voor een HTTP-bericht. Het bevat alle data die meegestuurd wordt met het bericht. Wanneer je een GET of een DELETE request stuurt, hoef je niets in de body te zetten. Doe je echter een POST of PUT, dan zet je hierin welke data je wil toevoegen of veranderen aan je database. In de body staat ook de data die je terugkrijgt van de API. Dit zijn de data die je opvraagt, rapportages van toegevoegde of gewijzigde data en success en error messages.

Het is niet gebruikelijk om je requests helemaal zelf te schrijven. Het is makkelijker en sneller om dit door middel van een library te doen, zoals Requests (Python) of cURL (andere talen). [Hier]() vind je van iedere soort call een voorbeeldscript in PHP met cURL. 

### Errors en succesberichten
Wanneer je request niet lukt, krijg je vanzelfsprekend een error message terug in de vorm van een HTTP 400 (Bad request) header. Een succesvolle request stuurt ook een header terug, die verschilt per soort call. Bij een GET request krijg je geen headerinformatie, omdat je de data zelf terugkrijgt. Succesvolle POST en PUT requests geven een link naar de betreffende data in de vorm van een `X-location: https://api.copernica.com/profile/$profileID` wanneer je een profiel wijzigt of toevoegt.
Een succesvolle DELETE request voor een profiel ziet er als volgt uit: `X-deleted: profile $profileID`.

Het grootste deel van de data wordt teruggegeven in een key:value paar. De volgende syntax wordt gebruikt om te beschrijven welke vorm de teruggestuurde data heeft:

`"key" : "value"` de key is een string, de value ook.
`"key" : 1` de key is een string, de value een integer.
`"key" : [...]` de key is een string, de value een indexed array.
`"key" : {...}` de key is een string, de value een associative array.

**Let op**: de keys en values in het bericht zijn hoofdlettergevoelig. {"Name": "Jeroen"} is dus niet hetzelfde als {"name": "jeroen"}.

## Copernica integreren met jouw applicatie
Naast authorisatie via een access code, kun je Copernica ook integreren in je eigen applicatie door middel van een koppeling met OAuth 2.0. Hiermee kun je gebruikers van jouw applicatie toestemming laten geven hun Copernica-gegevens te delen met jouw applicatie, zodat ze hun data niet nogmaals handmatig hoeven in te vullen. Meer informatie over deze integratie vind je [hier]().

# OAuth2 

OAuth 2.0 is het standaardprotocol voor autorisatie. OAuth 2.0 vervangt 
het werk dat is verricht op het oorspronkelijke OAuth protocol dat in 2006
is ontworpen. Door OAuth 2.0 kunnen gebruikers toegang verlenen tot gegevens,
zonder hun gebruikersnaam en wachtwoord uit handen te geven.  

## Waarvoor heb je dit nodig?

De OAuth2 functionaliteit komt van pas als je een applicatie maakt die je aan 
heel veel Copernica accounts wilt koppelen. Bijvoorbeeld aan accounts van 
andere bedrijven. Veronderstel dat je een website hebt gemaakt die met 
behulp van kunstmatige intelligentie Copernica-databases kan analyseren en 
selecties kan optimaliseren. Deze tool is handig voor jezelf, maar ook voor 
anderen. Je kunt dan een button op jouw website plaatsen: 
"klik hier om ook jouw Copernica database te analyseren". Als iemand op de 
button klikt, wordt hij automatisch doorverwezen naar Copernica.com, en wordt 
een vraag gesteld zoals: "De database-analyzer wil toegang tot jouw account om 
je database te analyseren. Vind je dat goed?".

![](../images/oauth-copernica.png)

## Applicatie aanmelden
De hierboven beschreven koppeling kun je met OAuth2 maken. Om te beginnen 
moet je je applicatie aanmelden via de [configuratie-module](https://ms.copernica.com/#/admin/company/applications) in Marketing Suite.
Je moet hierbij een naam en omschrijving van je applicatie opgeven. Zorg dat
dit een duidelijke naam en omschrijving is, want deze gegevens krijgen mensen 
te zien als ze op de pagina "applicatie X wil graag toegang tot jouw gegevens"
komen.

Nadat je de applicatie hebt aangemeld, ontvang je een *client_key* en *client_secret*.
Dit is de logincode en het wachtwoord dat je later moet doorgeven aan Copernica
om toegang te krijgen tot andere accounts. Let op dat je de waarde van *client_secret*
geheim houdt. Alleen jij mag toegang hebben tot deze data.

## Button of hyperlink plaatsen

Met de logingegevens van je applicatie (de *client_key* en *client_secret*) kun
je een link of button op je website plaatsen. Als mensen deze link aanklikken
worden ze doorverwezen naar Copernica.com alwaar ze hun account toegankelijk
kunnen maken voor jouw applicatie. De link moet verwijzen naar de volgende URL:

`https://www.copernica.com/nl/authorize?client_id=XXX&redirect_uri=XXX&state=XXX&response_type=code`

In de URL staat een aantal variabelen op de waarde XXX. Deze variabelen moet je
invullen met waardes die voor jou relevant zijn:

* **client_id**: de waarde van de *client_key* van je applicatie
* **redirect_uri**: het volledige adres (url) van de pagina op jouw website waar de gebruiker naar wordt terugverwezen nadat hij toegang heeft verleend
* **state**: een moeilijk te raden random string die je zelf hebt gegenereerd (dit moet telkens een andere waarde zijn!)
* **response_type**: dit moet de waarde *code* hebben

Je moet er goed voor zorgen dat de **state** variabele echt een moeilijk te raden
random string is. Als de string niet naar onze zin is (te kort, te voorspelbaar),
dan wordt sowieso geen toegang verleend.

## De terugkeerpagina

Ook moet je een terugkeerpagina maken. Nadat iemand op de link op je website heeft
geklikt en op copernica.com jouw applicatie toegang heeft gegeven tot zijn 
accountgegevens, keert hij terug naar deze pagina. Copernica voegt twee variabelen
toe aan de URL van de terugkeerpagina: de variabelen *state* en de variabele *code*.

Op de terugkeerpagina moet je twee dingen doen. Ten eerste moet je controleren 
of de waarde van de variabele *state* overeenkomt met de waarde die je in de 
oorspronkelijke link had gezet. Als dat niet het geval is, is er iets vreemds
aan de hand (misbruik!) en hoef je dus niks meer te doen.

Als de **state** variabele in orde is, kun je de REST API gebruiken om de *access key*
te downloaden. Gebruik hiervoor de volgende URL:

`https://api.copernica.com/v3/token?client_id=XXX&client_secret=XXX&redirect_uri=XXX&code=XXX`

Ook hier moet je de XXX waarden weer vervangen door je eigen variabelen:

* **client_id**: de waarde van de *client_key* van je applicatie
* **client_secret**: de waarde van de *client_secret* van je applicatie
* **redirect_uri**: precies hetzelfde adres als in de oorspronkelijke link of button
* **code**: de waarde van de *code* variabele die door Copernica is meegegeven aan de terugkeerurl

Voor de duidelijkheid: deze URL is dus een REST API adres. Deze URL moet je niet aan
de gebruiker tonen, en je hoeft hem of haar er ook niet naar door te verwijzen.
Het is de bedoeling dat je *vanaf jouw server* een HTTP GET request naar dit adres 
stuurt. De *redirect_url* parameter in deze URL wordt overigens niet meer gebruikt. Er zal 
geen gebruiker meer worden doorverwezen. De parameter is alleen nodig zodat 
Copernica kan controleren dat het request afkomstig is van hetzelfde adres als 
de oorspronkelijke call.

Als alles goed gaat, dan krijg je als resultaat van deze API call een 
*access_token* terug. Dit token kan je vervolgens gebruiken om API calls te
doen, en de gegevens in het desbetreffende account op te vragen.

`{ access_token : "ed430a95c58fd7d230c9dc453396cf5" }`

## Meer informatie

* [Introductie tot de REST API](rest-introductie)
* [Overzicht van alle API calls](rest-api)

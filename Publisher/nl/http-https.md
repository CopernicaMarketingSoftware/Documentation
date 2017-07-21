# HTTP en HTTPS

HTTP staat voor HyperText Transfer Protocol. HTTPS is een extensie 
hierop die het mogelijk maakt, in combinatie met SSL/TLS protocol, 
versleutelde informatie te versturen.

HTTP is het protocol dat wordt gebruikt voor communicatie tussen een 
webclient en een webserver, die zowel op het internet als op lokale 
netwerken wordt gebruikt. Dit protocol legt vast welke requests er 
naar de webserver kunnen worden gestuurd. Elke request bevat ook een URL 
naar een webpagina of afbeelding op het web. HTTP legt ook vast welke 
responses een webserver terug kan geven.

Een voorbeeld van een HTTP request zijn de calls die je kunt versturen 
met de [REST API](./rest-api). Je stuurt hiermee namelijk een vraag voor 
informatie naar de webserver en krijgt hierop een response.

## Soorten requests

Er zijn verschillende soorten requests, die aangeven wat de client van 
de server wil. Je hebt bijvoorbeeld de GET request, waarmee je informatie 
opvraagt. Er zijn ook de PUT en POST requests, waarmee je nieuwe informatie 
aan kunt leveren of oude informatie aan kunt passen. Met DELETE kun je 
informatie verwijderen en zo zijn er nog veel meer requests. Een request 
bevat ook altijd een URL, headervelden en soms ook een inhoud.

## Soorten responses

Een response bestaat ook weer uit verschillende onderdelen: Een code, 
headervelden en een boodschap. De codes geven aan wat voor resultaat er 
is bereikt. De code "404" ken je mogelijk al, deze geeft bijvoorbeeld 
aan dat het opgevraagde document niet bestaat. De response kan zo 
informatie geven over hoe een request verwerkt is en foutmeldingen geven 
als er iets niet is gelukt.

## HTTPS

HTTPS gebruikt een versleutelde connectie om je data veilig te versturen. 
Zo voorkom je dat de verkeerde personen toegang krijgen tot gevoelige data 
als telefoonnummers, adressen en burgerservicenummers. Copernica biedt 
de mogelijkheid om HTTPS af te dwingen op je eigen websites (die je kunt 
bouwen in Publisher). Als je een Copernica domein gebruikt hoef je hier 
niets extra's voor te doen. Met de volgende stappen kun je ook HTTPS 
gebruiken op je eigen domein:

1. Vraag een SSL certificaat aan (type is onbelangrijk) als je er nog geen hebt. Bronnen hiervoor kun je op Google vinden.
2. Vraag een toegewijd IP adres bij Copernica aan als je deze nog niet hebt. Je kunt deze aanvragen bij ons Support team (support@copernica.com) voor een kleine maandelijkse toeslag.
3. Lever je SSL certificaat in bij ons Support team met de private key, het intermediate-certificaat en de root-certificate. Dit is gevoelige informatie, dus verstuur deze niet onversleuteld. Je kunt eventueel het certificaat uploaden naar een veilige FTP server of via Skype.
4. Als je al deze stappen hebt uitgevoerd kun je je website opzetten om alleen HTTPS te gebruiken.

## Meer informatie

* [API's](./apis)
* [REST API](./rest-api)
* [Websites](./websites)
* [Tips, tricks en achtergrond](./tips-and-tricks)

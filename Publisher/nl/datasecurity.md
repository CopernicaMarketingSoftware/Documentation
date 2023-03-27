# Dataveiligheid
Er zijn verschillende manieren om je data veilig van en naar Copernica te krijgen.

In dit artikel geven we per onderdeel uitleg hoe je dit het beste kunt doen.

## Digitale handtekening voor webhooks, fetch- en loadfeed-tags
Alle uitgaande HTTP verzoeken bevatten een "Digest", "X-Copernica-ID" en een "Signature" header. Deze headers bevatten een gehashte waarde van je bericht, de identifier van je Copernica account en een digitale handtekening. Hiermee kun je verifiëren dat de verzoeken vanaf de servers van Copernica worden gedaan en of deze uit je eigen account afkomstig zijn.

Het formaat van de headers is gespecificeerd (links in het Engels):

* De "Digest" header houdt zich aan de [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2 "Instance Digests in PHP") 
en [RFC 5843](https://tools.ietf.org/html/rfc5843 "Additional Hash Algorithms for HTTP Instance Digests") richtlijnen.
* De "Signature" header is gedefinieerd in [een IETF draft](https://tools.ietf.org/html/draft-cavage-http-signatures-11 "Signing HTTP Messages").
* De "X-Copernica-ID" header staat gelijk aan "account-XXX" (waar XXX de ID van je account is)

Een HTTP-header ziet er bijvoorbeeld zo uit:
```
POST /path/to/your/script HTTP/1.1
Host: yourserver.yourdomain.com
Date: Sun, 05 Jan 2014 21:31:40 GMT
X-Copernica-ID: account-1234
Digest: SHA-256=X48E9qOokqqrvdts8nOJRJN3OWDUoyWxBf7kbu9DBPE=
Content-Type: application/json
Content-Length: 328746
X-Nonce: fsd9f2
Signature: keyId="one._domainkey.copernica.com",algorithm="rsa-sha256",
     headers="(request-target) Host Date Content-length Content-type
       X-Copernica-ID Digest X-nonce"
     signature="vSdrb+dS3EceC9bcwHSo4MlyKS59iFIrhgYkz8+oVLEEzmYZZvRs
       8rgOp+63LEM3v+MFHB32NfpB2bEKBIvB1q52LaEUHFv120V01IL+TAD48XaERZF
       ukWgHoBTLMhYS2Gb51gWxpeIq8knRmPnYePbF5MOkR0Zkly4zKH7s1dE="
```
### Handtekening & Private key
De handtekening wordt aangemaakt met een *private key* waar alleen Copernica 
toegang tot heeft. De *public* key kan gebruikt worden om deze te decoderen. 
Onze *public key* wordt in DNS gepubliceerd op dezelfde manier als we onze 
DKIM keys publiceren, zie ook [RFC 6367](https://tools.ietf.org/html/rfc6376#section-3.6.1 "DomainKeys Identified Mail Signatures") 
voor de [DKIM-specificatie](./dkim "DKIM in Copernica"). De keys worden 
eens per maand vervangen, dus je kunt deze key niet direct opslaan. Vraag 
deze in plaats hiervan op met een DNS-query. De locatie van de key 
is opgeslagen in de header en zal altijd op een copernica.com subdomein staan.

In de handtekening staat ook de request target (het pad naar je 
script), de Host, Date, X-Copernica-ID en Digest headers. Als de handtekening 
valide lijkt, maar niet deze headers bevat komt deze niet van ons en 
raden we je aan deze te negeren.

### Checklist
Om te verzekeren dat jouw script veilig wordt aangeroepen raden wij 
aan de volgende checks te implementeren in je code:

* Check of het verzoek binnenkwam via HTTPS (niet HTTP)
* Check of er een 'Date' header bestaat en deze recent is om *replay attacks* te voorkomen.
* Check of er een 'Host' header bestaat en deze jouw hostname matcht.
* Check of er een 'Digest' header bestaat en deze overeenkomt met de inhoud van het verzoek.
* Check of er een 'Signature' header bestaat die de juiste waarden bevat:
    * Deze moet tenminste de request-target bevatten en de Host, Date, X-Copernica-ID en Digest headers
    * De keyId moet een subdomein zijn van copernica.com
* Vraag de *public key* op met een DNS verzoek en gebruik deze om de handtekening 
te verifiëren.

### Voorbeeld script
Onderstaand vind je een voorbeeldscript waardoor je kunt zien of een call afkomstig is vanuit je Copernica-account. Voordat je het script kunt gebruiken, download je [hier](https://github.com/CopernicaMarketingSoftware/http-signatures-php/tree/master/src) eerst de benodigde PHP-bestanden.

**Script:**  
```
<?php

require_once('Copernica/CopernicaRequest.php');

// an exception is thrown if the call did not come from Copernica or is invalid
try
{
    // check if this is a valid request from Copernica (it throws if it isn't)
    $result = new Copernica\CopernicaRequest(
        apache_request_headers(),   // available HTTP headers
        'Account_1234',           	// Copernica customer ID
        $_SERVER['REQUEST_METHOD'], // request method
        $_SERVER['REQUEST_URI']     // request location
    );

    // get the incoming body data
    $data = $result->getBody();

    // get the content-type
    $type = $result->getHeader('content-type');

    // message has been verified
    echo "Call is afkomstig vanuit je Copernica-account";
}
catch (Exception $exception)
{
    // the call did not come from Copernica
    echo "Call is NIET afkomstig vanuit je Copernica-account";
}

?>
```

In bovenstaand script zal je het `Copernica customer ID` moeten vervangen met je eigen unieke account ID. Mocht deze nog niet bekend zijn, kun je deze opvragen met [deze](restv3/rest-get-identity) REST API-call.

## SFTP of REST API voor imports / exports
Bij imports en export kunnen wij geen digitale handtekening meegeven. Om de data veilig van en naar Copernica te krijgen, raden wij aan om gebruik te maken van een SFTP-connectie of onze [REST API](https://www.copernica.com/nl/documentation/restv3/rest-api). 

Bij het opzetten van een SFTP-import of export heb je de mogelijkheid om gebruik te maken van zogeheten *private keys*. Deze kun je instellen onder [geheime sleutels](https://ms.copernica.com/#/admin/account/private-keys) binnen je account. Hiermee zorg je ervoor dat enkel calls met deze sleutel uitgevoerd mogen worden van en naar je server.

### Importeren via SFTP
Voor het instellen van een SFTP-import voer je de volgende stappen uit:
1. Kies voor 'Imports' in de juiste [database](https://ms.copernica.com/#/profiles).
2. Nadat je voor 'Een import aanmaken' hebt gekozen, kun je de instellingen van de import opgeven.
3. Bij 'Type import' kies je voor 'Haal bestand van een externe locatie met gebruik van een geheime sleutel'.
4. Geef een locatie van het bronbestand en een gebruikersnaam op.
5. Bij 'Geheime sleutel' kies je voor de eerder [ingestelde sleutel](https://ms.copernica.com/#/admin/account/private-keys).

### Exporteren via SFTP
Voor het instellen van een SFTP-export voer je de volgende stappen uit:
1. Kies voor 'Exports -> Exports naar externe locatie' in de juiste [database](https://ms.copernica.com/#/profiles).
2. Nadat je voor 'Aanmaken' hebt gekozen, kun je de instellingen van de export opgeven.
4. Bij 'Protocol' kies je voor 'SFTP' en bij 'Authenticatietype' voor 'Geheime sleutel'.
5. Bij 'Geheime sleutel' kies je voor de eerder [ingestelde sleutel](https://ms.copernica.com/#/admin/account/private-keys).

### REST API import
Voor het uitvoeren van een import met de REST API gebruik je een POST-call naar het volgende endpoint: `https://api.copernica.com/v3/imports?access_token=xxxx`

**Voorbeeld JSON input:**  
```
{
    "action":"update or add",
    "autostart":true,
    "database":1,
    "keyFields":[
        "Email"
    ],
    "name":"Test import",
    "rebuild":true,
    "source":[{
        "Email":"jan.jansen@copernica.com",
        "Voornaam":"Jan",
        "Achternaam":"Jansen"
    }]
}
```

Voor meer informatie over deze call, kun je [hier](https://www.copernica.com/nl/documentation/restv3/rest-post-imports) terecht.

### REST API exporteren
Voor het ophalen van klantgegevens kun je gebruik maken van verschillende API calls. Het is mogelijk om alle profieldata uit een [database](https://www.copernica.com/nl/documentation/restv3/rest-get-database-profiles), [selectie](https://www.copernica.com/nl/documentation/restv3/rest-get-view-profiles), [collectie](https://www.copernica.com/nl/documentation/restv3/rest-get-collection-subprofiles) of [miniselectie](https://www.copernica.com/nl/documentation/restv3/rest-get-miniview-subprofiles) op te vragen. 

In onze [REST API-documentatie](https://www.copernica.com/nl/documentation/restv3/rest-methods) vind je een overzicht van alle API-methodes.

## Whitelisten van IP-adressen is niet de juiste oplossing
Een aantal van onze klanten heeft onze IP-adressen gewhitelist om ervoor te zorgen dat enkel calls vanuit onze IP-adressen worden geaccepteerd. Dit lijkt veilig te zijn, maar is dat allerminst. 

Wij voeren regelmatig aanpassingen door aan onze infrastructuur, bijvoorbeeld wanneer een nieuwe server in gebruik wordt genomen. Hierdoor worden de calls mogelijk vanuit een ander IP-adres uitgevoerd. Als dit IP-adres niet bekend is in je firewall, zorgt dit ervoor dat je data niet opgehaald of verzonden kan worden. 

Naast dat wij regelmatig van IP-adressen kunnen wisselen, is het voor iedereen mogelijk om een trial account aan te maken. Omdat je vanaf dat moment de data ophaalt vanaf een Copernica IP-adres, is de data beschikbaar voor iedereen met wetenschap van de juiste locatie van je data.

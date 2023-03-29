## Digitale handtekening voor uitgaande HTTP-verzoeken naar eigen server
Wanneer er in Copernica gebruik wordt gemaakt van webhooks of downloads van externe content in mailings (fetch- en loadfeed-tags) wordt er door Copernica een uitgaand HTTP verzoek gedaan naar je eigen server. Aan deze verzoeken wordt een digitale handtekening meegegeven zodat je kunt verifiëren of deze verzoeken vanaf de servers van Copernica worden gedaan en of deze uit je eigen account afkomstig zijn.

De digitale handtekening bestaat uit een "Digest", "X-Copernica-ID" en een "Signature" header. Deze headers bevatten een gehashte waarde van je bericht, de identifier van je Copernica account en een digitale handtekening. 

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

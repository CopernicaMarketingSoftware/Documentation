# Webhook veiligheid

Aangezien er via Webhooks vertrouwelijke data verstuurd kan worden 
raden wij sterk aan om HTTPS te gebruiken en je Webhook goed te beveiligen. 
Daarmee verzeker je dat alle verzoeken van SMTPeter naar jouw netwerk 
veilig zijn en niet onderschept kunnen worden door anderen. Het is echter ook 
mogelijk dat andere partijen jou data doorsturen die niet in jouw systeem 
thuishoort. Om dit te voorkomen bevatten al onze HTTP verzoeken een aantal 
headers met je account ID en een digitale handtekening, waardoor jij kunt 
verifiëren dat deze van SMTPeter komen.

## Extra headers

Alle uitgaande HTTP verzoeken bevatten een "Digest", "X-Copernica-ID" en 
een "Signature" header. Deze headers bevatten een gehashte waarde van je 
bericht, de identifier van je SMTPeter account en een digitale handtekening. 
We raden sterk aan om checks te implementeren die ervoor zorgen dat deze 
headers aanwezig en correct zijn. We raden aan om verzoeken met missende 
of incorrecte headers volledig te negeren, aangezien deze met slechte intenties 
kunnen zijn verstuurd.

Het formaat van de headers is gespecificeerd (links in het Engels):

* De "Digest" header houdt zich aan de [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2 "Instance Digests in PHP") 
en [RFC 5843](https://tools.ietf.org/html/rfc5843 "Additional Hash Algorithms for HTTP Instance Digests") richtlijnen.
* De "Signature" header is gedefinieerd in [een IETF draft](https://tools.ietf.org/html/draft-cavage-http-signatures-11 "Signing HTTP Messages").
* De "X-Copernica-ID" header staat gelijk aan "environment-XXX" (waar XXX de ID van je account is)

Een HTTP header ziet er bijvoorbeeld zo uit:
```
POST /path/to/your/script HTTP/1.1
Host: yourserver.yourdomain.com
Date: Sun, 05 Jan 2014 21:31:40 GMT
X-Copernica-ID: environment-1234
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
## Handtekening & Private key

De handtekening wordt aangemaakt met een *private key* waar alleen SMTPeter 
toegang toe heeft. De *public* key kan gebruikt worden om deze te decoderen. 
Onze *public key* wordt in DNS gepubliceerd op dezelfde manier als we onze 
DKIM keys publiceren, zie ook [RFC 6367](https://tools.ietf.org/html/rfc6376#section-3.6.1 "DomainKeys Identified Mail Signatures") 
voor de [DKIM specificatie](./dkim "DKIM in SMTPeter"). De keys worden 
eens per maand vervangen, dus je kunt deze key niet direct opslaan. Vraag 
deze in plaats hiervan op met een DNS query. De locatie van de key 
is opgeslagen in de header en zal altijd op een copernica.com subdomein staan.

In de handtekening staat ook de request target (het pad naar je 
script) en de Host, Date, X-Copernica-ID en Digest headers. Als de handtekening 
valide lijkt maar niet deze headers bevat komt deze niet van ons en 
raden we je aan deze te negeren.

## Checklist

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

## Voorbeeld

Je kunt een voorbeeld van zo'n implementatie vinden op onze 
[GitHub](https://github.com/CopernicaMarketingSoftware/webhook-security "Message verification on Copernica's GitHub).

## Meer informatie

* [Webhooks](./webhooks)
* [DKIM signatures](./dkim)


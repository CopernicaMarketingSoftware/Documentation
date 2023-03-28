# Dataveiligheid
In je Copernica-account staat veel data. Er zijn verschillende manieren om de veiligheid van je data te waarborgen. In dit artikel leggen we per onderdeel uit wat je kunt doen om je data zo veilig mogelijk te houden.

## Accounttoegang
De Copernica-software bestaat uit twee interfaces: Marketing Suite en Publisher. De Publisher-interface is het langst bestaande Copernica-product. De Marketing Suite-interface is gebruiksvriendelijker en maakt gebruik van verbeterde technologieën. Nieuwe modules worden enkel nog aan Marketing Suite toegevoegd.

### Bereikbaarheid interfaces
De interfaces zijn bereikbaar via:
- Marketing Suite: [ms.copernica.com](https://ms.copernica.com) en [ms.copernica.nl](https://ms.copernica.nl)
- Publisher: [publisher.copernica.com](https://publisher.copernica.com) en [publisher.copernica.nl](https://publisher.copernica.nl)

Beide interfaces zijn enkel te bereiken via een beveiligde HTTPS-verbinding.

### Twee-factor-authenticatie
Om te voorkomen dat anderen toegang tot je account krijgen als ze achter je wachtwoord komen is het verstandig om twee-factor-authenticatie in te stellen. Hiermee voeg je een extra beveiligingslaag toe aan je account. Een spaciale app op je smartphone, zoals Google Authenticator of Authy, genereert iedere 30 seconden een nieuwe code die vervolgens ook maar 30 seconden geldig is. Enkel de combinatie van een juist wachtwoord en de juiste code vanaf de smartphone waarop twee-factor-authenticatie is ingesteld geeft toegang tot het account.

Om twee-factor-authenticatie in te stellen ga je naar [deze pagina](https://ms.copernica.com/#/admin/user/authentication) binnen je gebruikersaccount. 

Als bedrijfsbeheerder is het ook mogelijk om het gebruik van twee-factor-authenticatie te verplichten voor alle bedrijfsgebruikers. Dit kun je instellen bij de [beveiligingsinstellingen](https://ms.copernica.com/#/admin/company/security) van je bedrijf.

### Sessieduur
Om ervoor te zorgen dat gebruikers automatisch uitgelogd worden na een bepaalde tijd, kun je als bedrijfsbeheerder een [sessieduur](https://ms.copernica.com/#/admin/company/security) opgeven voor alle bedrijfsgebruikers. Hiermee voorkom je dat anderen toegang tot je data krijgen als per ongeluk een computer aan blijft staan.

### Toegangsbeperking op basis van IP-adres
Je kunt je account beveiligen door het alleen toegankelijk te maken vanaf bepaalde IP-adressen. Het is dan niet langer mogelijk om vanaf andere IP-adressen in te loggen. Je kunt hiermee bijvoorbeeld instellen dat je alleen vanaf je kantoorlocatie toegang hebt.

Je kunt dit toevoegen onder [IP-restrictie](https://ms.copernica.com/#/admin/account/restrict-access) in de configuratie van je account.

## Sender domain voor het versturen van mailings
Voordat je mailings kunt versturen dien je een [sender domain](https://www.copernica.com/nl/documentation/sender-domains) in te stellen in je account. Dit zijn een aantal [DNS-records](https://www.copernica.com/nl/documentation/dns) die je moet aanmaken.

Onderdeel van je sender domain zijn je [SPF](https://www.copernica.com/nl/documentation/spf)-, [DKIM](https://www.copernica.com/nl/documentation/dkim)- en [DMARC](https://www.copernica.com/nl/documentation/dmarc)-record. Dit stelt ontvangers in staat om te zien dat Copernica toestemming heeft om vanuit jouw domein te versturen.

Naast het valideren of wij gemachtigd zijn om te versturen vanaf jouw domein wordt er binnen je sender domain ook een tracking URL aangemaakt. Alle hyperlinks en afbeeldingen in e-mailings worden vervangen door zogenaamde 'tracking URLs'. Hierdoor kan Copernica bijhouden welke berichten worden geopend en op welke links wordt geklikt. Elke klik of download van een afbeelding wordt gelogd voordat de ontvanger doorgestuurd wordt naar de oorspronkelijke URL.

Nadat je een sender domain hebt ingesteld, maakt Copernica automatisch binnen 24 uur een certificaat aan zodat je tracking URLs beveiligd zijn via een HTTPS-verbinding.

Een sender domain kun je instellen via de optie [sender domains](https://ms.copernica.com/#/admin/account/senderdomains) in de configuratie van je account.

## Gevalideerde domeinen voor webhooks en websites
Voordat je een domein kunt gebruiken als [webhook](https://www.copernica.com/nl/documentation/webhooks) of voor je [Copernica-website](https://www.copernica.com/nl/documentation/websites) moet je eerst bewijzen dat je de rechtmatige eigenaar bent van het domein. Dit is nodig om te voorkomen dat andere bedrijven Copernica's diensten gebruiken om je domein te misbruiken.

Je kunt een domein valideren door deze toe te voegen aan de [gevalideerde domeinen](https://ms.copernica.com/#/admin/company/domains) binnen je bedrijf. Nadat je het domein hebt toegevoegd, krijg je een TXT-record die je toe moet voegen aan je DNS-configuratie. Zodra het record is toegevoegd kun je binnen je gevalideerde domein onder 'Validatie' het domein laten valideren.

## API-services
Er zijn twee API's beschikbaar: een [REST-API](https://www.copernica.com/nl/documentation/restv3/rest-api) en een [SOAP-API](https://www.copernica.com/nl/documentation/soap-api-documentation) waarmee je Copernica kunt koppelen aan andere applicaties. Omdat de REST-API nieuwer, sneller en simpeler is, raden wij aan om hiervan gebruik te maken.

Beide API's zijn te bereiken via een eigen beveiligde HTTPS-verbinding:
- SOAP-API: https://soap.copernica.com 
- REST-API: https://api.copernica.com

Als je gebruik maakt van [grote datasets](https://www.copernica.com/nl/documentation/restv3/rest-paging) is de REST-API ook bereikbaar via: https://rest.copernica.com. In principe werken beide URL's hetzelfde, maar voor *een aantal methodes* (met name methodes om profielen op te vragen) geldt dat https://rest.copernica.com limieten groter dan 1000 items ondersteunt.

### IP-restrictie instellen per API-applicatie
Voor het gebruik van de API heb je enkel een [access-token](https://ms.copernica.com/#/admin/account/access-tokens) nodig. Vanaf dat moment kan iedereen met deze access-token gegevens van en naar je account synchroniseren. 

Om ervoor te zorgen dat enkel calls vanaf je eigen IP-adressen worden geaccepteerd, kun je een IP-restrictie instellen op je [API-applicatie](https://ms.copernica.com/#/admin/company/applications). Dit doe je door de betreffende API-applicatie te openen en te kiezen voor 'IP-restricties'.

## Digitale handtekening voor uitgaande HTTP-verzoeken naar eigen server
Wanneer er in Copernica gebruik wordt gemaakt van webhooks of downloads van externe content in mailing (fetch- en loadfeed-tags) wordt er een uitgaande HTTP verzoek gedaan naar je eigen server. Aan deze verzoeken wordt een digitale handtekening meegegeven zodat je kunt verifiëren of deze verzoeken vanaf de servers van Copernica worden gedaan en of deze uit je eigen account afkomstig zijn.

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

## Importeren en exporteren van data
Bij imports en exports kunnen wij geen digitale handtekening meegeven. Om de data veilig van en naar Copernica te krijgen, raden wij aan om gebruik te maken van een SFTP-connectie of onze [REST API](https://www.copernica.com/nl/documentation/restv3/rest-api). 

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

Wij raden het gebruik van IP-whitelisting af om de volgende redenen:
- Wanneer wij aanpassingen aan onze infrastructuur doen, bijvoorbeeld wanneer een server uitvalt of wij opschalen, worden de calls mogelijk vanuit een niet bekend IP-adres uitgevoerd. Dit zorgt ervoor dat je data niet opgehaald of verzonden kan worden.
- Onze IP-adressen worden door meerdere klanten gebruikt. Door een IP-adres te whitelisten kun je niet uitsluiten dat andere Copernica-gebruikers via de servers van Copernica toegang krijgen tot jouw gegevens.
- Indien we diensten afschalen of herstructureren kunnen IP-adressen vrijkomen en worden toegewezen aan heel andere bedrijven.

In dit artikel geven wij een overzicht van verbeteringen die u kunt
doorvoeren wanneer u gebruik maakt van de SOAP API om verbinding te
maken met Copernica Marketing Software. Deze verbeteringen helpen u het
aantal gemaakte calls te verminderen, waardoor de uitwisseling van
informatie sneller verloopt. De verbeteringen in dit artikel zijn
gebaseerd op de meest voorkomende fouten waar developers tegenaan lopen.
Dit helpt u zeker in een optimaal gebruik van uw API verbinding.

Caching
-------

Het snelste verzoek is een verzoek dat niet wordt gedaan. Dus zorg
ervoor dat u zoveel mogelijk data cached. Dit geldt vooral voor het
WSDL-bestand dat vrij groot is.  Maakt u gebruik van PHP als
programmeertaal en gebruikt u de
ingebouwde [SoapClient](http://php.net/manual/en/soapclient.soapclient.php "PHP Soap Client") klasse,
geef dan de WSDL\_CACHE\_BOTH optie aan de constructor om het object het
WSDL-bestand te laten cachen.

Updaten (sub)profielen
----------------------

Wanneer u (sub)profielen update is het niet nodig het (sub)profiel eerst
op te zoeken. Als u de requirements parameter toevoegt aan de
'updateProfiles' of 'updateSubprofiles' call, zoals bij de search call,
worden de (sub)profielen die overeenkomen met de opgegeven vereisten
geupdate. Daarnaast is het ook mogelijk een nieuw (sub)profiel aan te
maken wanneer er geen match is gevonden voor de opgegeven vereisten.
Voeg de 'create' parameter toe met een non-zero waarde en een nieuw
(sub)profiel wordt aangemaakt.

Database\_searchProfiles
------------------------

Wanneer u zoekt naar een profiel in een database wilt u ook graag de
inhoud van dat profiel zien. We zien vaak een call naar
'Database\_searchProfiles' om profielen te vinden, gevolgd door een call
naar 'Profile-fields' om de data uit het profiel te verkrijgen. Echter
heeft de call 'Database\_searchProfiles de parameter 'allproperties'.
Wanneer deze parameter wordt gegeven en een non-zero waarde meekrijgt,
zal de 'Database\_searchProfiles' call alle data van het gevonden
profiel terugsturen in plaats van enkel het ID van het profiel. Dit
geldt ook bij de 'Collection\_searchSubProfiles' call.

'allproperties' parameter
-------------------------

Alle verzoeken die een collectie terugsturen hebben ook in een
'allproperties' parameter in het verzoek. Als deze parameter de waarde
'true' heeft, wordt het antwoord op de call gevuld met de inhoud van de
collectie en niet alleen de ID's van de elementen in de collectie. Dit
kan u een hoop calls schelen om de data van alle elementen uit een
collectie te verkrijgen. Gebruik deze parameter alleen wanneer u de
database nodig hebt want deze parameter vertraagt de call op de server
site.

Session cookies opslaan
-----------------------

Het is vrij duur om in te loggen voor elk verzoek dat u maakt. Zorg er
daarom voor dat u de session cookie opslaat om te voorkomen dat u voor
elk verzoek moet inloggen. De nieuwe PHP SOAP client voorbeeldcode doet
dit automatisch voor u.

Compression
-----------

In versie 2.12 van Copernica Marketing Software wordt het mogelijk de
SOAP respons in [gzip
encoding](http://www.w3.org/Protocols/rfc2616/rfc2616-sec3.html#sec3.5 "gzip encoding") te
verzoeken. Dit zal de grootte van de respons van de server naar de
client verkleinen. Om gebruik te maken van deze feature moet u
de Accept-Encoding: gzip in uw http-header mee sturen. U kunt dit al
aanmaken in uw client. Het zal geen invloed hebben op de huidige versie
van de API maar het zal automatisch gebruikt worden wanneer de versie
2.12 wordt gereleased.

Asynchrone calls
----------------

Het is vaak niet nodig te wachten op een antwoord van een request
gestuurd naar de server. U kunt een van de voorbeeldclients beschikbaar
voor PHP gebruiken om asynchrone calls the maken naar de SOAP server.
Als u bijvoorbeeld meerdere subprofielen moet toevoegen aan een profiel,
kunt u alle verzoeken starten op hetzelfde moment. Als u geen interesse
hebt in het resultaat, kunt u doorgaan zonder te moeten wachten op de
afronding van het verzoek.

Indexen op databases and collecties
-----------------------------------

Wanneer u zoekt naar (sub)profielen is het belangrijk dat u de juiste
indexen instelt voor de velden die u zoekt. Als de index niet is
ingesteld, kan de zoekopdracht minuten duren. Als u op de juiste manier
zoekt in correct geindexeerde databases/collecties neemt dit slechts een
fractie van een seconde in beslag. Zorg er daarom voor dat alle velden
die u opneemt in een zoekopdracht, beschikken over een index.

Voorbeeldclients
----------------

We hebben de [SOAP
API](http://www.copernica.com/nl/ondersteuning/soap-api-documentatie "SOAP API") voorbeeldclients
geupdate waarin deze veranderingen zijn opgenomen.

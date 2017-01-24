# Feedback loops

Via het dashboard van de Marketing Suite kun je *feedback loops* configureren.
Hiermee kun je instellen dat Copernica je real time notificaties via HTTP POST
stuurt als er een event als een klik, open of error plaatsvindt. Je kunt dit 
bijvoorbeeld gebruiken als je de gegevens in je eigen applicatie wilt bijwerken
naar aanleiding van dergelijke events. Op je eigen server plaats je hiervoor 
een script dat de aanroepen van Copernica opvangt, en in het dashboard van de 
Marketing Suite stel je in wanneer het script moet worden aangeroepen. De rest
gaat vanzelf.

Het aardige van de feedback loops is dat de data die Copernica naar jou
stuurt veel rijker is dan de data die in eerste instantie bij Copernica 
binnenkomt. Als Copernica een klik of een open registreert, dan zien we alleen
het IP adres en de HTTP headers van het binnenkomende request. Het emailadres, 
de profieldata en de aan de mailing gekoppelde tags zoeken we er snel bij
voordat we de feedback loop aanroepen. De data die jouw script ontvangt bevat
hierdoor alle data die het makkelijk maakt om de terugmelding te koppelen
aan gegevens in jouw systeem.


## Feedback loops van Microsoft, Gmail, Yahoo, enzovoort

Als je je al wat langer met email en emailmarketing bezighoudt, ben je wellicht
op de hoogte van het bestaan van feedback loops van emailproviders als
Microsoft, Gmail en Yahoo. Dit zijn echter een ander soort feedback loops dan
de technologie die we in dit artikel beschrijven.

De feedback loops van deze emailproviders worden gebruikt om verzenders (zoals
Copernica) op de hoogte te brengen dat een ontvanger op een "dit is spam" knop
drukt of op een andere manier met de ontvangen email omgaat. Het gaat dus om 
een terugmelding van een emailprovider naar ons, die bovendien vaak 
geaggregeerd is: meerdere acties van gebruikers zijn gebundeld tot één enkele, 
meestal geanonimiseerde, terugkoppeling naar ons.

Dit in tegenstelling tot de feedback loops die we hier bespreken. Dit zijn 
terugkoppelingen van ons naar jou. Deze terugkoppelingen worden niet 
geanonimiseerd of gebundeld, en gebeuren in *real time*.


## Feedback loop instellen

Het instellen van een feedback loop kan via het dashboard van de Marketing
Suite. Via het configuratiemenu kun je het adres instellen waar de HTTP
POST call naar toe wordt gestuurd. Het wijst zich eigenlijk vanzelf: je geeft
aan in welke events je geïnteresseerd bent, en wat het adres van je script is.

We hebben een veiligheidssysteem ingebouwd in de feedback loops. Om te 
voorkomen dat we per ongeluk data naar een server sturen die niet aan jou
toebehoort, en dat jouw gegevens hierdoor in handen van anderen vallen, moet 
je eerst bewijzen dat je toegang hebt tot de ingestelde server. Nadat je een 
feedback loop hebt aangemaakt moet je daarom een klein verificatiebestandje
op de server plaatsen. Pas als het Copernica is gelukt om precies dit 
verificatiebestand te downloaden weten we zeker dat de server aan jou 
toebehoort en gaan we de calls maken.


## Data

Copernica stuurt alle data in HTTP POST formaat naar jouw script. Je hoeft
dus slechts een enkel script op je server te plaatsen die deze data opvangt
en er iets mee doet. De volgende gegevens worden, indien beschikbaar, worden
met de calls meegegeven:

- *ip*
- *useragent*
- *referer*
- *timestamp*
- *tags*
- *recipient*
- *type*


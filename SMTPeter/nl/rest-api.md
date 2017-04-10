#  REST API Overzicht

SMTPeter is een betrouwbare REST API die gebruik maakt van het HTTPS 
protocol. De REST API kan als alternatieve optie worden gebruikt om 
toepassingen te injecteren in je e-mails. De SMTP API mist een aantal 
functionaliteiten die de REST API wel heeft. Zoals bijvoorbeeld het 
ophalen van statistieken of het omzetten van e-mails naar JSON formaat. 

Nogmaals, er kan alleen gebruik worden gemaakt van 'calls' die via 
het HTTPS protocol worden gedaan. Onveilige HTTP 'calls' worden niet
geaccepteerd en geven dan ook een '400 BAD Request' antwoord terug.
Om toegang te krijgen tot de REST API heb je een een 'API access token' 
nodig. Deze kan vind je terug in het SMTPeter 'dashboard'.


## REST vs SMTP

Het versturen van e-mails door middel van SMTPeter kan via de REST 
en de SMTP API. Zoals in de voorgaande tekst al duidelijk werd gemaakt, 
raden we je sterk aan om, als je de keuze hebt, te gaan voor de 
REST API. Deze API geeft je zoveel meer opties, vrijheid en gebruiksgemak. 
Denk bijvoorbeeld aan de complexe en tijdrovende SMTP handshake die gedaan 
moet worden om e-mails te versturen van de ene naar de andere server.
Bij de REST API is deze overbodig. 


## Afhandeling van fouten

De REST API heeft een heldere manier om fouten te communiceren. Namelijk, 
het teruggeven van de reguliere '[HTTP error code](https://nl.wikipedia.org/wiki/Lijst_van_HTTP-statuscodes)'
in kwestie. Het opgeven van verkeerde data of andere foutmeldingen maakt 
niet uit, omdat je ook altijd een textuele uitleg terugkrijgt over wat
precies fout is gegaan. Een succesvolle 'call' geeft je altijd een status
code terug van '200' tot en met '202'.


## Voorbeelden

Van een aantal programeertalen zijn voorbeeldscripts en 'classes' beschikbaar.
Je kunt deze voorbeelden gebruiken om een verbinding op te zetten met de 
REST API. Zo hoef je geen 'low-level calls' te schrijven en kun je direct
van start.

* [PHP example](php-example)
* [Python example](python-example)

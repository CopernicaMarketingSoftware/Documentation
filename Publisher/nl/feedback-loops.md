# Feedback loops

In het menu van de Marketing Suite zie je een kopje met `FEEDBACK LOOPS` staan.
Hier kun je instellen dat Copernica je real-time notificaties via HTTP POST
stuurt als er een events zoals kliks, opens of errors plaatsvinden.

WAARSCHUWING: Sommige feedback loops veroorzaken grote aantallen calls. 
Zorg er dus voor dat je server de lading aankan voordat je een feedback loop 
instelt.

## Feedback loops met Marketing Suite

Onder `FEEDBACK LOOPS` kun je al je loops instellen. Je kunt ze 
bijvoorbeeld gebruiken als je de gegevens in je eigen applicatie wilt bijwerken
naar aanleiding van dergelijke events. Op je eigen server plaats je hiervoor 
een script dat de calls van Copernica opvangt, en onder het kopje feedback loops
(in de Marketing Suite) stel je in wanneer het script moet worden aangeroepen. 
De rest gaat vanzelf.

Het aardige van de feedback loops is dat de data die Copernica naar jou
stuurt veel rijker is dan de data die in eerste instantie bij Copernica 
binnenkomt. Als Copernica een klik of een open registreert, dan zien we alleen
het IP adres en de HTTP headers van de binnenkomende request. Het emailadres, 
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
geanonimiseerd of gebundeld, en gebeuren in *real time*. Wanneer een
spam rapportage ons bereikt kun je deze ontvangen met een 
[failure feedback loop](./feedback-failures). We handelen deze melding 
ook af volgens jouw [uitschrijfgedrag](./database-unsubscribe-behavior).

## Calls afhandelen

Controleer voordat je feedback loops instelt of je server de inkomende datastroom 
wel aankan. Vooral de feedback loop die afgaat [wanneer iemand een mail opent](feedback-opens),
ontvangt grote aantallen notificaties.

Als je niet zeker weet of je server al deze notificaties aankan,
of als je geen behoefte hebt aan real-time terugkoppeling,
is het beter om de [algemene statistieken](./statistics) te gebruiken.

## Feedback loops instellen

Klik op het kopje `FEEDBACK LOOPS` binnen de Marketing Suite. Via het 
configuratiemenu kun je het adres instellen waar de HTTP POST call naar
toe wordt gestuurd. Het wijst zich eigenlijk vanzelf: je geeft aan in 
welke events je geïnteresseerd bent, en wat het adres van je script is.

Je kunt gebruik maken van de volgende feedback loops:

* [Feedback loops voor bounces](feedback-bounces)
* [Feedback loops voor failures](feedback-failures)
* [Feedback loops voor clicks](feedback-clicks)
* [Feedback loops voor opens](feedback-opens)
* [Feedback loops voor creates](feedback-creates)
* [Feedback loops voor updates](feedback-updates)
* [Feedback loops voor deletes](feedback-deletes)

## Feedback loops voor specifieke database of collectie

De Marketing Suite geeft je de mogelijkheid om alle feedback loops zien
die bij een specifieke database of collectie behoren. Het is nu dus ook 
makkelijke om te zien welke feedback loops zijn ingesteld.

## URL validatie

We hebben een veiligheidssysteem ingebouwd in de feedback loops. Om te 
voorkomen dat we per ongeluk data naar een server sturen die niet aan jou
toebehoort, en dat jouw gegevens hierdoor in handen van anderen vallen, moet 
je eerst bewijzen dat je toegang hebt tot de ingestelde server. Nadat je een 
feedback loop hebt aangemaakt moet je daarom een klein verificatiebestandje
op de server plaatsen. Pas als het Copernica is gelukt om precies dit
verificatiebestand te downloaden weten we zeker dat de server aan jou 
toebehoort en gaan we de calls maken.

De naam en inhoud van het bestand is uniek voor elke feedback loop en kan
vanaf het dashboard opgevraagd worden. Je moet het bestand ofwel naar de root
van je server kopiëren ofwel naar dezelfde folder waar ook het feedback script
zich bevindt.
Als je dus "https://domein.nl/dir/script.php" als feedback script hebt opgesteld,
dan moet je het bestand "smtpeter-xxxxx.txt" zodanig op je webserver plaatsen
dat het via "https://domein.nl/dir/smtpeter-xxxxx.txt"
of via "https://domein.nl/smtpeter-xxxxx.txt" beschikbaar is.

Nadat je feedback loop is gevalideerd, kan het bestand weer verwijderd worden.

## De feedback loop testen

Het dashboard beschikt over een krachtige tool om je feedback loops mee te testen.
Vul simpelweg de post data in die je feedback loop moet ontvangen en verstuur direct een voorbeeldnotificatie.

## Meer informatie

* [Statistieken](./statistics)
* [Uitschrijfgedrag](./database-unsubscribe-behavior)

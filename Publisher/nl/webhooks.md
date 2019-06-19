# Webhooks
In het menu van de Marketing Suite zie je een kopje met `WEBHOOKS` staan.
Hier kun je instellen dat Copernica je real-time notificaties via HTTP POST
stuurt als er events zoals kliks, opens of errors plaatsvinden.

**Waarschuwing**: sommige Webhooks kunnen grote aantallen calls veroorzaken.
Zorg er dus voor dat je server de lading aankan voordat je een Webhook instelt.

## Webhooks met Marketing Suite
Onder `WEBHOOKS` kun je al je loops instellen. Je kunt ze
bijvoorbeeld gebruiken als je de gegevens in je eigen applicatie wilt bijwerken
naar aanleiding van dergelijke events. Op je eigen server plaats je hiervoor
een script dat de calls van Copernica opvangt, en onder het kopje `WEBHOOKS`
(in de Marketing Suite) stel je in wanneer het script moet worden aangeroepen.
De rest gaat vanzelf.

Het aardige van de Webhooks is dat de data die Copernica naar jou
stuurt, veel meer informatie bevat dan de data die in eerste instantie bij
Copernica binnenkomt. Als Copernica een klik of een open registreert, dan zien
we alleen het IP adres en de HTTP headers van de binnenkomende request.
Het e-mailadres, de profieldata en de aan de mailing gekoppelde tags zoeken
wij er daarna bij voordat wij de Webhook aanroepen. De data die jouw script
ontvangt bevat hierdoor alle data die het makkelijk maakt om de terugmelding
te koppelen aan gegevens in jouw systeem.

## Webhook instellen
Klik op het kopje `WEBHOOKS` binnen de Marketing Suite. Via het
configuratiemenu kun je het adres instellen waar de HTTP POST call naartoe
wordt gestuurd. Het wijst zich eigenlijk vanzelf: je geeft aan in
welke events je geïnteresseerd bent, en wat het adres van je script is.

Je kunt gebruik maken van de volgende Webhooks:

* [Webhooks voor bounces](webhook-bounces)
* [Webhooks voor failures](webhook-failures)
* [Webhooks voor clicks](webhook-clicks)
* [Webhooks voor opens](webhook-opens)
* [Webhooks voor creates](webhook-creates)
* [Webhooks voor updates](webhook-updates)
* [Webhooks voor deletes](webhook-deletes)

## URL validatie

We hebben een veiligheidssysteem ingebouwd in de Webhooks. Om te
voorkomen dat we per ongeluk data naar een server sturen die niet aan jou
toebehoort en dat jouw gegevens hierdoor in handen van anderen vallen, moet
je eerst bewijzen dat je toegang hebt tot de ingestelde server. Nadat je een
Webhook hebt aangemaakt moet je daarom een verificatiebestand
op de server plaatsen. Pas als het Copernica is gelukt om precies dit
verificatiebestand te downloaden, weten we zeker dat de server aan jou
toebehoort en gaan we de data versturen door middel van calls.

De naam en inhoud van het bestand is uniek voor elke Webhook en kan
vanaf het dashboard opgevraagd worden. Je moet het bestand ofwel naar de root
van je server kopiëren ofwel naar dezelfde folder waar ook het Webhook script
zich bevindt.
Als je dus "https://domein.nl/dir/script.php" als Webhook script hebt
opgesteld, dan moet je het bestand "smtpeter-xxxxx.txt" zodanig op je
webserver plaatsen dat het via "https://domein.nl/dir/smtpeter-xxxxx.txt"
of via "https://domein.nl/smtpeter-xxxxx.txt" beschikbaar is.

Nadat je Webhook is gevalideerd, kan het bestand weer verwijderd worden.

## De Webhook testen
Het dashboard beschikt over een krachtige tool om je Webhook mee te testen.
Vul simpelweg de post data in die je Webhook moet ontvangen en verstuur direct
een voorbeeldnotificatie.

## Calls afhandelen
Controleer voordat je Webhook instelt of je server de inkomende datastroom
wel aankan. Vooral de Webhook die geactiveerd wordt [wanneer iemand een mail
opent](webhook-opens), stuurt grote aantallen notificaties.

Als je niet zeker weet of je server al deze notificaties aankan,
of als je geen behoefte hebt aan real-time terugkoppeling,
is het beter om de [algemene statistieken](./statistics) te gebruiken.

## Meer informatie
* [Statistieken](./statistics)
* [Uitschrijfgedrag](./database-unsubscribe-behavior)

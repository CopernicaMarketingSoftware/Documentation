# Een bulkmailing versturen
Het mailen van meerdere relaties in een keer noemen wij een bulkmailing. Bij [profielen](https://ms.copernica.com/#/profiles) en [HTML-templates](https://ms.copernica.com/#/design) vind je in de toolbar de optie **_Mailing versturen_** om een bulkmailing te versturen. 

Het versturen van een bulkmailing verloopt in 3 stappen:  
1. Kies het template of document die je wilt gaan versturen.
2. Kies de bestemming van je e-mail. 
3. Kies wanneer de e-mail verzonden moet worden

Naast deze verplichte stappen heb je nog de mogelijkheid om labels toe te voegen of instellingen te wijzigen.
In onderstaand artikel zullen we dit uitgebreider beschrijven.

## Template of document instellen
De eerste optie in het verzendscherm is het instellen van je template of document. Als je de mailing wilt versturen vanuit een template of document is deze automatisch ingevuld. Bij het versturen vanuit een database, collectie of (mini)selectie kun je hier handmatig een template of document selecteren.

## Bestemming instellen
Na het instellen van je template of document dien je een doelgroep voor je mailing te selecteren. Dit kan een database, collectie of (mini)selectie zijn. Nadat je de bestemming hebt gekozen krijg je te zien hoeveel profielen deze doelgroep bevat en hoeveel van deze uniek zijn. Het kan voorkomen dat er dubbele profielen in je doelgroep aanwezig zijn. In dit geval wordt de e-mail verzonden naar het profiel met het laagste ID (oudste profiel) van dit e-mailadres.

Tevens dient er een [intentie](./database-intentions) aanwezig te zijn voor de doelgroep. Hiermee geef je aan dat deze doelgroep gebruikt mag worden als bestemming voor je mailing. Daarmee wordt voorkomen dat mailings verstuurd worden aan de verkeerde doelgroep (bijvoorbeeld inactieve profielen of bounces). Mocht je bestemming deze intentie nog niet hebben, wordt er een melding zichtbaar waarbij je deze alsnog toe kunt kennen.

## Tijdstip instellen
Naast het template, document en de bestemming is het instellen van een tijdstip van de mailing een vereiste waaraan een mailing moet voldoen. Standaard staat dit ingesteld op _de mailing zo snel mogelijk versturen_. 

Er zijn drie verschillende types om een tijdstip in te stellen:

1. **Eenmalig**: hier geef je een tijdstip op wanneer de mailing verzonden moet worden. Dit kan het huidige tijdstip zijn of een tijdstip in de toekomst.  
2. **Terugkerend schema**: hier kun je een mailing inroosteren voor meerdere dagen. Zo is het mogelijk om de mailing bijvoorbeeld iedere dag te versturen, enkel op woensdag of om de week op dinsdag en vrijdag. Aan de linkerkant worden de dagen omcirkeld in de _planning voorvertoning_ waarop de mailing verzonden zal worden.
3. **Geavanceerde RRule**: hier kun je gebruik maken van [RRULE-strings](https://www.copernica.com/nl/blog/post/slim-mailings-herhalen-met-rrules). Dit is een specificatie die allerlei krachtige herhaalpatronen mogelijk maken (bijvoorbeeld elke tweede dinsdag van de maand).

![Bulkmailing schema](../images/nl/bulkmailing_schema.png)

## Labels instellen

## Opties instellen

## Mailing versturen

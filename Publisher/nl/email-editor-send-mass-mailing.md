# Een bulkmailing versturen
Het mailen van meerdere relaties in een keer noemen wij een bulkmailing. Bij [profielen](https://ms.copernica.com/#/profiles) en [HTML-templates](https://ms.copernica.com/#/design) vind je in de toolbar de optie **_Mailing versturen_** om een bulkmailing in te plannen of direct te versturen.

Het versturen van een bulkmailing verloopt in 3 stappen:  
1. Kies het template of document die je wilt gaan versturen.
2. Kies de bestemming van je e-mail. 
3. Kies wanneer de e-mail verzonden moet worden.

Naast deze verplichte stappen heb je de mogelijkheid om labels toe te voegen of instellingen te wijzigen.
In onderstaand artikel komen we hier uitgebreid op terug.

## Template of document instellen
De eerste optie in het verzendscherm is het instellen van je template of document.

## Bestemming instellen
Na het instellen van je template of document dien je een doelgroep voor je mailing te selecteren. Dit kan een database, collectie of (mini)selectie zijn. Nadat je de bestemming hebt gekozen zie je hoeveel profielen deze doelgroep bevat en hoeveel unieke profielen dit zijn. Het kan voorkomen dat er dubbele profielen in je doelgroep aanwezig zijn. In dit geval wordt de e-mail verzonden naar het profiel met het laagste ID (het profiel met de meeste geschiedenis) van dit e-mailadres.

Tevens dient er een [intentie](./database-intentions) aanwezig te zijn voor de doelgroep. Hiermee geef je aan dat deze doelgroep gebruikt mag worden als bestemming voor je mailing. Daarmee wordt voorkomen dat mailings verstuurd worden aan de verkeerde doelgroep (bijvoorbeeld inactieve profielen of bounces). Mocht je bestemming deze intentie nog niet hebben, wordt er een melding getoond waarbij je deze alsnog toe kunt kennen.

## Tijdstip instellen
Naast een template of document en de bestemming is het instellen van een tijdstip van de mailing een vereiste waaraan een mailing moet voldoen. Standaard staat ingesteld dat de mailing direct wordt verzonden. 

Er zijn drie verschillende opties om een tijdstip in te stellen:

1. **Eenmalig**: hier geef je een tijdstip op wanneer de mailing verzonden moet worden. Dit kan het huidige tijdstip zijn als je wilt dat de mail direct verzonden wordt of een tijdstip in de toekomst.  
2. **Terugkerend schema**: hier kun je een mailing inroosteren voor meerdere dagen. Zo is het bijvoorbeeld mogelijk om de mailing iedere dag te versturen, enkel op woensdag of om de week op dinsdag en vrijdag. Aan de linkerkant, in de _planning voorvertoning_, worden de dagen omcirkeld waarop de mailing verzonden zal worden.  
3. **Geavanceerde RRule**: hier kun je gebruik maken van [RRULE-strings](https://www.copernica.com/nl/blog/post/slim-mailings-herhalen-met-rrules). Dit is een specificatie die allerlei krachtige herhaalpatronen mogelijk maken (bijvoorbeeld elke tweede dinsdag van de maand).  

![Bulkmailing schema](../images/nl/bulkmailing_schema.png)

## Labels instellen
Voor drag-and-drop templates is het mogelijk om (meerdere) labels mee te geven aan je verzending. Op basis van deze labels (tags) kun je filteren in de statistieken van je verzonden mailings. 

_Voorbeeld:_ Je verstuurt meerdere campagnes rondom Black Friday, maar ook je normale mailings lopen door. Door een tag 'BlackFriday' mee te geven aan de specifieke mailings over Black Friday kun je achteraf enkel de statistieken van deze mailings ophalen om de resultaten te analyseren.

## Opties instellen
Hier vind je de geavanceerde opties voor je verzending. 

**Aantal berichten per minuut limiteren**: met deze optie kun je de verzending verspreiden. De laagst mogelijke afleversnelheid is 100 berichten per minuut.  
**Content type**: templates en documenten kunnen een HTML- een AMP- en een tekstversie bevatten. Mailings kunnen ingesteld worden om alleen de opgemaakte versie (HTML en optioneel AMP) te gebruiken, alleen de tekstversie of beide versies.  
**Maximale duur**: de maximale duur beperkt de looptijd van de mailing. Er worden geen berichten meer verzonden of opnieuw geprobeerd na de maximale duur sinds de starttijd is verstreken. Dit kan bijvoorbeeld worden gebruikt bij een actie met een korte looptijd.  
**Statistieken**: hier kun je aangeven dat er geen impressies, kliks, fouten of klachten mogen worden geregistreerd op je mailings. In dit geval tracken wij deze gegevens niet en is dit niet inzichtelijk in de statistieken van de verzonden mailing.


## Mailing versturen
Na het instellen van bovenstaande stappen vind je aan de linkerkant de button **_Mailing versturen_**. Deze optie is aanklikbaar zodra alle vereiste opties zijn opgegeven.  

_Let op:_ Als het een mailing betreft die direct wordt verzonden is er geen optie meer om de mailing te annuleren nadat je op de verzendknop hebt gedrukt.

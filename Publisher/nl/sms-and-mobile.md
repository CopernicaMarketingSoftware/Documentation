# SMS

Copernica kan worden ingezet voor het versturen van bulk sms-mailings. Ook is het mogelijk individuele berichten te versturen, bijvoorbeeld in een opvolgactie. Sms-berichten kunnen worden gepersonaliseerd met behulp van Smarty code.

Je beheert je sms campagnes in het onderdeel Mobile.

Voor het versturen van sms-campagnes, beschik je vanzelfsprekend over
het mobiele nummer van de relaties die je wilt bereiken. Sms-nummers sla
je op in een speciaal hiervoor bedoeld veld.

### Database telefoonveld

Voor het opslaan van mobiele telefoonnummers gebruik je een [database-
of
collectieveld](./database-and-collection-field-types.md)
van het type telefoonnummer -\> **SMS**

![](../images/telefoonveld-sms.png)

### Selectie authoriseren voor sms-bulkmailings

Bij elke selectie of miniselectie waaraan je een mailing wilt richten,
dient apart te worden aangegeven dat deze voor dit doel gebruikt mag
worden. Zo voorkom je dat een mailing per ongeluk aan een verkeerde
(mini)selectie wordt verzonden.

Om de selectie of miniselectie te authoriseren, ga je in het onderdeel
**Profielen** naar **Databasebeheer** -> **Gebruiksmogelijkheden**.
Kies de selectie die je wilt gebruiken, en vink het vakje bij **SMS
mailings** aan.

## Een SMS bericht schrijven

Een nieuw document voor sms verzendingen maak je aan vanuit het menu
**Document** in het onderdeel **Mobile**

-   Geef het document een duidelijke naam en omschrijving, waarbij je
    alleen gebruik maakt van letters en cijfers. Het eerste teken mag
    geen cijfer zijn.
-   Kies de versie van smarty die je wilt gebruiken voor eventuele
    personalisatie in het bericht. Wij raden aan smarty versie 3 te
    gebruiken.

Direct nadat je het document hebt aangemaakt, kan je deze van tekst
voorzien. In principe heeft een sms-bericht maximaal 160 tekens. Onderin
beeld zie je hoeveel tekens het bericht heeft.

### Gebruik van smarty personalisatie

Je kan in het bericht gebruik maken van [smarty
personalisatie](./personalize-campaigns.md).
Houdt hierbij wel rekening met het maximum van 160 tekens. Met namen als
Pieter-Cornelis de Roy van Zuiderwijn zit je zo op het maximale aantal
tekens. Klik onderin beeld op 'gepersonaliseerd' om het bericht weer te
geven met gegevens uit de standaardbestemming.

### Grote berichten opsplitsen

Je kan ervoor kiezen om langere berichten op te splitsen. Relaties
ontvangen dan 2 of meer berichten indien meer dan 160 karakters zijn
gebruikt in het bericht.

### Afzender bericht instellen

De afzender is de naam of het nummer dat de ontvanger ziet als afzender
van het sms-bericht. Je stelt de afzender in via Mobile \> Document \>
**Afzender...**

## Testen

Wanneer je een mobiel document gereed hebt voor verzending, is het
verstandig deze eerst te testen.

Testen kan vanuit het menu *Mailings* \> **Testmail verzenden**.

-   Bij een testmail kun je aan- of uitvinken of het bericht
    gepersonaliseerd moet worden. Wanneer je in het bericht gebruik
    maakt van personalisatiecode moet deze uiteraard aan staan.
-   Ook kies je zelf of de verzending zichtbaar moet zijn in de
    geschiedenis van verzonden berichten.
-   De testmail wordt verzonden naar het mobiel nummer uit de
    standaardbestemming.In de database heb je aangegeven welk (sub)profielveld het mobiele nummer voor sms-berichten bevat.
    
## SMS verzenden 

De software is ook geschikt voor het versturen van bulk sms-mailings. De
werking hiervan verschilt niet heel erg van het versturen van
e-mailings.

Voor het versturen van bulk sms-mailings gelden dezelfde opt-in-regels
als voor het versturen van commerciele e-mails.

Om een sms-mailing te versturen, dien je over het onderstaande te
beschikken

-   Een database of een collectie waarin een telefoonveld voor mobiele
    nummers bestaat. Hierin zijn de GSM-nummers van jouw relaties
    opgeslagen.
-   Je hebt een selectie aangemaakt met hierin de relaties waaraan je de
    mailing wilt richten. Voor deze (mini)selectie heb je de juiste
    gebruiksmogelijkheden ingesteld.
-   De nummers zijn op een geldige manier opgeslagen. Als je naar het
    buitenland verstuurd, heb je ook de landcodes voor de nummers. De
    nummers heb je op een legale manier verkregen.
-   Een sms-document. Het is mogelijk om een document te personaliseren
    dmv smarty code.
-   Je hebt voor het document een afzenderadres ingesteld via *Mobiel \>
    Document menu \>***Afzender**

## Een SMS-document maken

Sms-documenten maak en beheer je in het onderdeel **Mobiel**van de
applicatie

-   Ga naar het onderdeel **Mobiel**
-   Kies in het *Document menu*voor **Nieuw document**
-   Voer het bericht dat je wilt versturen in
-   Een sms-bericht kan maximaal 160 tekens bevatten. Houd hier ook
    rekening mee als je personalisatie gebruikt in je bericht. Een
    bericht met meerdere tekens kan eventueel worden opgesplitst. Er
    worden dan twee berichten verstuurd naar de zelfde ontvanger. De
    optie voor het splitsen van berichten vind je in het dialoogvenster
    **Sms-mailing versturen**.

**Tip:** selecteer Personaliseren onderaan het sms-document om het
bericht te bekijken met gegevens van de standaardbestemming.

## Bulk SMS-mailing versturen

Het versturen van sms-mailings is vrijwel identiek aan het versturen van
e-mailings. Bij het versturen van sms-mailings zijn minder opties
beschikbaar.

Open in het onderdeel **Mobile** het document dat je wilt versturen en
kies in het **Sms-mailings**menu **Bulkmailing versturen**.

-   Allereerst word je gevraagd akkoord te gaan met de regels en
    nettiquette
-   In de volgende stap kies de selectie of miniselectie waaraan je de
    mailing wilt richten
-   Stel in het tabblad **Wanneer** de **datum** en **tijdstip** in
    waarop de mailing verstuurd moet worden
-   Klik op **volgende** om naar de laatste stap te gaan waar je de
    mailing definitief kunt versturen.

Nadat je op verzenden hebt geklikt en bevestigd, zal de mailing worden
verstuurd.

## Inroosteren

Bulkmailings van mobiele documenten kunnen worden ingeroosterd om op een
later tijdstip te versturen. Dit doe je door een Bulkmailing te
verzenden, en dan bij stap 2 aan te geven wanneer de mailing verstuurd
moet worden en eventueel hoe vaak.

Om een mailing die reeds is ingeroosterd aan te passen volg je een
aantal stappen.

-   Kies in het menu **Mailings** voor **Ingeroosterde mailings**.
    Selecteer in de lijst de mailing die je wilt bewerken.
-   Kies vervolgens in het menu **Mailings** voor **Ingeroosterde
    mailing bewerken**.

### Interval en instellingen aanpassen

In het dialoogvenster vind je twee tabbladen: **Interval** en
**Instellingen**

-   In het tabblad **Interval** kan je de datum, tijdstip en de interval
    van het ingeroosterde document wijzigen.
-   In het tabblad **Instellingen** kan je de instellingen van de
    mailing wijzigen.

### Mailing uitschakelen

Om een ingeroosterde mailing niet te versturen (te annuleren), klik je
onderaan op **Uitschakelen**.


### SMS mailing annuleren

Een mailing die aan het versturen is kan niet meer worden geannuleerd.

### Ingeroosterde mailing bewerken

Indien je hebt gekozen om de mailing te verzenden op een later tijdstip,
dan kan je de mailing tussentijds nog annuleren. Kies in het menu
**Sms-mailings** voor '**Ingeroosterde mailing bewerken**'.

### Opvolgacties

Aan het versturen van sms-mailings kunnen geen opvolgacties worden
gekoppeld.

### Resultaten van de mailing bekijken

Nadat je de mailing hebt verstuurd, kan je de resultaten ervan
terugvinden via het **Sms-mailings**menu \> **Statistieken**

## Kosten

De prijs per verzonden bericht is 10 eurocent.

Sms-berichten die je verstuurt met de applicatie worden alleen in
rekening gebracht wanneer er een daadwerkelijke poging is geweest het
bericht af te leveren. Dit houdt in: als er in het sms databaseveld een
waarde aanwezig is, zal er een poging worden ondernomen.

Veronderstel dat je een sms-mailing verstuurt naar een selectie met 2000
profielen. 1500 profielen uit deze selectie hebben een geldig of
ongeldig sms-nummer in het aangewezen
sms-veld.
Er zullen dan 1500 pogingen worden gedaan om de sms af te leveren, en
dus 1500 berichten gefactureerd a 10 eurocent per bericht.

### Berichten afleveren in buitenland

Er zijn **geen** extra kosten verbonden aan het afleveren van berichten
naar het buitenland.

## Een valide nummer

In een database sms-veld kunnen telefoonnummers op diverse wijzen worden
opgeslagen. Alleen sms-berichten aan telefoonnummers die op de
onderstaande wijze worden opgemaakt kunnen worden afgeleverd.

-   0031612345678 (internationaal, met landcode)
-   +31612345678 (internationaal, met plusteken en zonder nullen)
-   0031 6 1234 5678 or +31 6 1234 5678 (met spaties)
-   0612345678 (zonder landcode, alleen mogelijk met Nederlandse
    nummers)

Nummers die op een andere wijze zijn opgeslagen zullen waarschijnlijk
niet worden afgeleverd.

Niet-Nederlandse telefoonnummers moeten altijd voorzien zijn van een
landcode. Ook als je vanuit bijvoorbeeld Frankrijk naar Franse nummers
sms't.

## Tijdzone

Je kan zelf een taal- en tijdzone instellen voor een sms-document.

Dit is soms nodig wanneer je gebruik maakt van bijzondere tekens of van de smarty functie {smarty.now}. Deze worden anders mogelijk niet goed weergegeven.

Je vindt de optie voor het instellen van een taal in het menu 'Document'.

## Statistieken

De statistieken bieden een beknopt overzicht op de resultaten van alle mailings van de betreffende sms.

Je vind de resultaten van sms-mailings onder Mobiel > Document > Statistieken

Bij sms is het helaas alleen mogelijk om te registreren of een bericht succesvol is afgeleverd.

-   **Succesvol**: het bericht is succesvol afgeleverd
-   **Fout**: het bericht kon niet worden afgeleverd
-   **Overig**: het is niet bekend of het bericht is afgeleverd.

### Exporteren

Ook voor sms-mailings worden statistieken bijgehouden. Deze kan je
vinden via *Mobiel \> Mailings \>***Statistieken**. Selecteer in het
overzicht de mailing waarvan je de statistieken wilt bekijken.

Deze statistieken kunnen worden geëxporteerd naar een
spreadsheet-bestand.

-   Ga naar *Mobiel \> Mailings \>***Statistieken**. Selecteer in het
    overzicht de mailing waarvan je de statistieken wilt bekijken.
-   Kies in het menu *Sms-mailings*voor **Resultaten exporteren**
-   Kies de velden die je wilt opnemen in het exportbestand
-   Kies bij exportopties of je ook data wilt exporteren over profielen
    die niet meer bestaan in de database.
-   Kies of profielen die de mailing meerdere malen hebben ontvangen
    slechts eenmaal moeten worden opgenomen in het exportbestand.
-   In het volgende scherm zal een downloadlink verschijnen zodra het
    exportbestand klaar is.

### Selectie op basis van verstuurde berichten

Het is mogelijk om een selectie te maken op basis van verstuurde
sms-berichten. Er kan alleen onderscheid worden gemaakt tussen
(sub)profielen aan wie wel/geen bericht is verzonden.

**Maak** bij een nieuwe of een bestaande selectie een nieuwe conditie
aan en kies als conditietype **Check op de resultaten van
sms-campagnes**.

Het is niet mogelijk om profielen te selecteren waarbij een specifiek
resultaat is gemeten in een sms-campagne.






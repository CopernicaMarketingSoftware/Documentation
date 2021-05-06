# Opwarmen van verzendreputatie

Grote schommelingen in e-mailvolume hebben een negatieve impact op je
[verzendreputatie](./send-reputation.md).
Het versturen van je eerste e-mails vanuit een nieuw IP-adres veroorzaakt
zo'n schommeling.

De ontvangende mailservers moeten wennen aan het nieuwe e-mailverkeer
en het volume dat vanuit jouw afzenderdomein wordt verstuurd. We bouwen
het volume daarom geleidelijk op. Dit noemen we het 'opwarmen van
verzendreputatie'.

## Relevante factoren

De snelheid waarmee je verzendreputatie wordt opgewarmd is onder andere
afhankelijk van het beoogde e-mailvolume en de verwachte verzendfrequentie.
Daarnaast spelen ook de onderstaande factoren een rol:

### De IP-structuur

Verstuur je vanuit een dedicated (niet-gedeeld) IP-adres of vanuit een
pool met meerdere (gedeelde) IP-adressen? Een 'koud' dedicated IP-adres
moet voorzichtiger worden opgewarmd dan een gedeeld IP-adres waarover al
e-mailverkeer verstuurd wordt. Wanneer je start met Copernica krijg je
automatisch gedeelde IP-adressen toegewezen.

### Eerdere e-mails vanuit het afzenderdomein

Als je al e-mails vanuit het betreffende afzenderdomein verstuurd hebt is
er doorgaans sprake van een opgebouwde domeinreputatie.

### De kwaliteit van de verzendlijst

Hebben profielen in de verzendlijst een dubbele opt-in gegeven? Zijn de
e-mailadressen recentelijk toegevoegd of staan deze er al jaren (ongemaild)
in? Wat waren de openratios van eerder verstuurde mailings via andere ESPs?

### Opwarmresultaten

Wanneer de resultaten van het opwarmproces tegenvallen moet er mogelijk
gas terug worden genomen. De opwarming van je verzendreputatie is dus een
doorlopend proces: de eerstvolgende mailing is afhankelijk van de resultaten 
van de voorgaande mailing.

Door de verscheidenheid aan factoren is het opstellen van een generiek
opwarmschema niet eenvoudig. Om die reden vragen we je gedurende het
onboardingproces om zoveel mogelijk informatie aan te leveren.
Het is daarbij belangrijk om alle verzendingen goed te evalueren en onze
hulp in te schakelen bij calamiteiten. Ons deliverability-team ontwikkelt
zo een verantwoord opwarmtraject.

## Verschillen tussen mailboxproviders

Je verzendreputatie wordt per mailboxprovider bepaald. De resultaten van
het opwarmproces verschillen dus per provider. Achterblijvende resultaten
bij Hotmail hoeven geen invloed te hebben op de opschaling bij Gmail.
Bepaalde problemen (zoals het gebruik van een verouderde verzendlijst)
beïnvloeden het opwarmproces wel voor alle providers.

## Verzenden in batches

De opwarming vindt plaats in batches. Deze spreiden we uit over
verschillende verzenddagen.

Stel dat je een verzendlijst van 20.000 e-mailadressen hebt. Je mailt de
verzendlijst vanaf een pool met gedeelde IP-adressen. Het opwarmschema zou
er dan als volgt uit kunnen zien:

| Verzenddag | Volume | Aantal gemailde adressen |
|------------|--------|--------------------------|
| 1          | 1000   | 1000                     |
| 2          | 2000   | 3000                     |
| 3          | 3000   | 6000                     |
| 4          | 5000   | 11000                    |
| 5          | 9000   | 20000                    |


**Let op:** Het bovenstaande schema betreft een voorbeeld. Stel je eigen opwarmschema
altijd op in overleg met je accountmanager.

## Opbouw van batches

Bij het verzenden van batches houd je altijd een tussentijdse wachttijd
van 24 uur aan. Dat geeft je de tijd om het volume van de volgende batch af te stemmen
op eventuele foutmeldingen (bounces). 

Wanneer de inhoud zich ervoor leent kan de content voor elke batch gelijk blijven. 
Daarbij is het extra belangrijk om ervoor te zorgen dat profielen de e-mails niet 
meerdere keren ontvangen.

Stel dat je dagelijks e-mails verstuurt waarvan de content steeds verschillend is.
In dat geval kun je profielen die op de eerste verzenddag een mail hebben ontvangen
ook weer meenemen in de batch van de tweede verzenddag. Je voegt dan per keer x-aantal
profielen toe.

## Sorteer op kwaliteit en activiteit

Wanneer je informatie hebt over de kwaliteit van een profiel (bijvoorbeeld in de vorm
van een leadscore) raden we aan om het opwarmproces met de meeste actieve
adressen te beginnen. Deze bieden namelijk de grootste kans op opens en
interactie. Spamfilters worden zo op positieve wijze vertrouwd gemaakt met
jouw verzendingen. Ook vergroot je hiermee de kans dat e-mailverkeer naar
minder betrokken ontvangers in de inbox wordt geplaatst, wat op zijn beurt
weer meer opens tot gevolg heeft.

**Let op:** Wanneer je alle actieve profielen gemaild hebt kan het zijn dat je een groot aantal
inactieve profielen overhoudt. Het is belangrijk dat je deze profielen niet in één keer mailt. 
Je kunt hierover advies vragen bij je accountmanager.

## Het spreiden van batches

Bij het opwarmen van het e-mailvolume raden we aan om batches
te spreiden over de verzenddag. In plaats van 10.000 e-mails binnen enkele
minuten af te leveren doe je dat bijvoorbeeld gedurende een uur. Zo zorg
je ervoor dat mailboxproviders niet in één keer overspoeld worden met de
gehele batch, zelfs al is deze nog relatief klein. 

In Copernica kan de afleversnelheid geleidelijk en per verzenddag worden
verhoogd. Bij het versturen van een Publisher-mailing tref je deze optie
aan bij stap 3 van het verzendproces (onder **'Geavanceerde opties'**):

![](../images/afleversnelheid-publisher.png)

Je stelt de afleversnelheid van Marketing Suite-mailings in bij het aanmaken
van een mailing. Je vindt de benodigde optie in de slider onder **'Mailingopties'**.
Hier heb je de mogelijkheid om het aantal berichten per minuut te limiteren.

![](../images/afleversnelheid-ms.png)

Wanneer er geen afleverlimieten zijn ingesteld wordt de mailing zo snel
mogelijk afgeleverd. Daarbij wordt er rekening gehouden met de voorgeschreven
richtlijnen van mailboxproviders.

## Aanmaken van opwarmselecties

Wanneer het opwarmschema is vastgesteld zet je de desbetreffende batches om naar 
selecties.

In het onderstaande voorbeeld gaan we uit van het eerdergenoemde voorbeeldschema.
Het gaat daarbij om een opwarmtraject op basis van één verzending per dag.
Wanneer je opwarmschema hiervan afwijkt (bijvoorbeeld als je meerdere
batches per dag verstuurt) raden we aan om advies te vragen bij jouw
accountmanager.

Om te beginnen hanteren we het standaard databasemanagement. In Copernica
ziet de selectiestructuur er dan als volgt uit:

![](../images/selectiestructuur-opwarmbatches.png)

Onder **'B_VerzendSelectie'** is de selectie **'Mail_nog_niet_ontvangen'**
zichtbaar. Daarmee selecteren we alle profielen die de mail nog niet ontvangen
hebben. De opwarmselecties (inclusief het bijbehorende volume) worden hierin
ondergebracht. Dat doen we door gebruik te maken van de **'Check op
e-mailresultaten'**-conditie. Het is hierbij belangrijk dat je voor
Publisher-mailings en Marketing Suite-mailings een afzonderlijke conditie
aanmaakt.

In dit geval gaan we uit van een eerste verzending op 1 maart 2021. Om de
benodigde conditie aan te maken stel je eerst de **'Verstuurd na'**-datum
in. Deze datum gaat vooraf aan het eerste verzendmoment. Bij **'Resultaat'**
selecteer je **'Het resultaat van de mailing is niet relevant'**. Onder
**'Berichten'** selecteer je **'gelijk aan 0'**.

**Let op:** We raden het checken op een document- of templatenaam
af. Wanneer de naam van het document of template wordt aangepast voldoen
alle profielen aan deze check. Het proces is daarmee foutgevoelig. 

![](../images/check-emailconditie-nul-ontvangen.png)


Binnen de **'Mail_nog_niet_ontvangen'**-selectie kunnen we nu aantallen
selecteren zonder het risico te lopen dat een profiel dubbel gemaild wordt.

Het selecteren van aantallen doen we met de conditie **'Sorteer en/of
selecteer profielen'**. Onder **'Sorteren op velden'** vullen we onder
**'Selecteer vanaf positie'** altijd '0' in. Het **'Aantal profielen dat
geselecteerd moet worden'** komt overeen met de omvang van batches in het
voorbeeldschema. Voor batch 1 is dat dus '1000'.

![](../images/sort-select-profile-batch-1-1000.png)

Omdat de **'Mail_nog_niet_ontvangen'**-selectie nachtelijks ververst kan
je **'Selecteer vanaf positie'** ook bij de tweede batch op '0' laten staan.
Het **'Aantal profielen dat geselecteerd moet worden'** zet je dan op '2000'.

Gebruik je een leadscoringveld waarbij een hoge score een actief profiel
representeert? Sorteer de profielen dan oplopend op basis van dat veld.
Je kunt de standaardwaarden laten staan wanneer een dergelijk veld ontbreekt.

Heb je je eerste mailing naar alle profielen verstuurd en wil je
vervolgens een tweede mailing verzenden? Dan werk je de selectie 
**'Mail_nog_niet_ontvangen'** bij. Dat doe je door de **'Verstuurd na'**-datum 
in te stellen op een tijdstip ná de verzending van de laatste batch van je eerste 
mailing en vóór de verzending van de eerste batch van je tweede mailing. 

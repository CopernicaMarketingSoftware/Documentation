# Opwarmen van de verzendreputatie

(Grote) schommelingen in e-mailvolume hebben een negatieve impact op je
[verzendreputatie](./send-reputation.md).
Het versturen van je eerste e-mails vanuit een nieuw IP-adres veroorzaakt
zo’n schommeling.

De ontvangende mailservers moeten wennen aan het nieuwe e-mailverkeer
en het volume dat vanuit jouw afzenderdomein wordt verstuurd. We bouwen
het volume daarom geleidelijk op. Dit noemen we het ‘opwarmen van de
verzendreputatie’.

## Relevante factoren

De snelheid waarmee je verzendreputatie wordt opgewarmd is onder andere
afhankelijk van het beoogde e-mailvolume en de verwachte verzendfrequentie.
Daarnaast spelen ook de onderstaande factoren een rol:

### De IP-structuur

Verstuur je vanuit een dedicated (niet-gedeeld) IP-adres of vanuit een
pool met meerdere (gedeelde) IP-adressen? Een ‘koud’ dedicated IP-adres
moet voorzichtiger worden opgewarmd dan een gedeeld IP-adres waarover al
e-mailverkeer verstuurd wordt. Wanneer je start met Copernica krijg je
automatisch gedeelde IP-adressen voor de verzending van e-mail toegewezen.

### Eerdere e-mails vanuit het afzenderdomein

Als je al e-mails vanuit het betreffende afzenderdomein verstuurd hebt is
er doorgaans sprake van een eerder opgebouwde domeinreputatie.

### De kwaliteit van de verzendlijst

Hebben profielen in de verzendlijst een dubbele opt-in gegeven? Zijn de
e-mailadressen recentelijk toegevoegd of staan deze er al jaren (ongemaild)
in? Wat waren de openratios van eerder verstuurde mailing met andere ESPs?

### De resultaten tijdens het opwarmen

Wanneer de resultaten van het opwarmproces tegenvallen moet er mogelijk
gas terug worden genomen. De opwarming van je verzendreputatie is dus een
iteratief proces; de komende actie (mailing) wordt bepaald door de
resultaten van de vorige mailing.

Door de verscheidenheid aan factoren is het opstellen van een generiek
opwarmschema niet eenvoudig. Om die reden vragen we je gedurende het
onboardingproces om hierover zoveel mogelijk informatie aan te leveren.
Het is daarbij belangrijk om alle verzendingen goed te evalueren en onze
hulp in te schakelen bij calamiteiten. Ons deliverability-team ontwikkelt
zo een verantwoord opwarmtraject.

## Verschillen tussen mailboxproviders

Je verzendreputatie wordt per mailboxprovider bepaald. De resultaten van
het opwarmproces verschillen dus per provider. Achterblijvende resultaten
bij Hotmail hoeven daarom geen invloed te hebben op de opschaling van Gmail.
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


*Let op: bovenstaand schema betreft een voorbeeld. Stel je eigen opwarmschema
altijd op in overleg met jouw accountmanager.*

## Opbouw van de batches

Bij het verzenden van batches houd je altijd een tussentijdse wachttijd
van 24 uur aan. Binnen vierentwintig uur zijn alle mogelijke foutmeldingen
(bounces) binnen en deze zijn nodig om eventueel in te grijpen in het volume
van de volgende geplande mailing. Wanneer de inhoud zich ervoor leent kan
de content voor elke batch gelijk blijven. Het is daarbij extra belangrijk
om ervoor te zorgen dat profielen de e-mails niet meerdere keren ontvangen.

Stel je bent een dagaanbieder en je verstuurt iedere dag verschillende
content, dan kan je de profielen die op de eerste verzenddag een mail
hebben ontvangen, weer meenemen in de batch van de tweede verzenddag. Je
voegt dan per keer een x-aantal profielen toe. De profielen die vanaf
verzenddag 1 de mail ontvangen, ontvangen die vanaf dan iedere verzenddag.

## Sorteer op kwaliteit en activiteit

Wanneer je informatie hebt over de kwaliteit van een profiel (bijvoorbeeld
een leadscore) raden we aan om het opwarmproces met de meeste actieve
adressen te beginnen. Deze bieden namelijk de grootste kans op opens en
interactie. Spamfilters worden zo op positieve wijze vertrouwd gemaakt met
jouw verzendingen. Ook vergroot je hiermee de kans dat e-mailverkeer naar
minder betrokken ontvangers in de inbox wordt geplaatst, wat op zijn beurt
weer meer opens tot gevolg heeft.

Let bij bovenstaande wel op dat wanneer je alle actieve profielen hebt
gemaild en je hebt nog een groot deel inactieve profielen over, dat je
deze niet in een keer mailt. Win ook hiervoor advies in bij je accountmanager.

## Het spreiden van batches

Bij het opwarmen van het e-mailvolume is het een goede praktijk om batches
te spreiden over de verzenddag. In plaats van 10.000 e-mails binnen enkele
minuten af te leveren doe je dat bijvoorbeeld gedurende een uur. Zo zorg
je ervoor dat mailboxproviders niet in één keer overspoeld worden met de
gehele batch, zelfs al is deze nog relatief klein. 

In Copernica kan de afleversnelheid geleidelijk en per verzenddag worden
verhoogd. Bij het versturen van een Publisher-mailing tref je deze optie
aan bij stap 3 van het verzendproces (onder ‘Geavanceerde opties’):

![](../images/afleversnelheid-publisher.png)

Je stelt de afleversnelheid van Marketing Suite-mailings in bij het aanmaken
van een mailing. Je vindt de benodigde optie in de slider onder ‘Mailingopties’.
Hier heb je de mogelijkheid om het aantal berichten per minuut te limiteren.

![](../images/afleversnelheid-ms.png)

Wanneer er geen afleverlimieten zijn ingesteld wordt de mailing zo snel
mogelijk afgeleverd. Daarbij wordt er rekening gehouden met de voorgeschreven
richtlijnen van mailboxproviders.

## Aanmaken van opwarmselecties

Wanneer het opwarmschema is vastgesteld, moeten de betreffende batches
naar selecties in Copernica worden omgezet.

In het onderstaande voorbeeld gaan we uit van het eerdergenoemde voorbeeldschema.
Het gaat daarbij om een opwarmtraject op basis van één verzending per dag.
Wanneer je opwarmschema hiervan afwijkt (bijvoorbeeld als je meerdere
batches per dag verstuurt) raden we je aan om advies te vragen bij jouw
accountmanager.

Om te beginnen hanteren we het standaard databasemanagement. In Copernica
ziet de selectiestructuur er dan als volgt uit:

![](../images/selectiestructuur-opwarmbatches.png)

Onder **‘B_VerzendSelectie’** is de selectie **‘Mail_nog_niet_ontvangen’**
zichtbaar. Daarmee selecteren we alle profielen die de mail nog niet ontvangen
hebben. De opwarmselecties (inclusief het bijbehorende volume) worden hierin
ondergebracht. Dat doen we door gebruik te maken van de **‘Check op
e-mailresultaten’**-conditie. Het is hierbij belangrijk dat je voor
Publisher-mailings en Marketing Suite-mailings een afzonderlijke conditie
aanmaakt.

In dit geval gaan we uit van een eerste verzending op 1 maart 2021. Om de
benodigde conditie aan te maken stel je eerst de **‘Verstuurd na’**-datum
in. Deze datum gaat vooraf aan het eerste verzendmoment. Bij **‘Resultaat’**
selecteer je **‘Het resultaat van de mailing is niet relevant’**. Onder
**‘Berichten’** selecteer je **‘gelijk aan 0’**.

**Let op:** Let op: We raden het checken op een document- of templatenaam
af. Wanneer de naam van het document of template wordt aangepast voldoen
alle profielen aan deze check. Het proces is daarmee foutgevoelig. 

![](../images/check-emailconditie-nul-ontvangen.png)


Onder deze **‘Mail_nog_niet_ontvangen’**-selectie kunnen we nu aantallen
selecteren, waarbij we ons geen zorgen meer hoeven te maken dat een profiel
dubbel wordt gemaild.

Het selecteren van de aantallen doen we met de conditie **‘Sorteer en/of
selecteer profielen’**. Onder **‘Sorteren op velden’** vullen we onder
**‘Selecteer vanaf positie’** altijd ‘0’ in. Het **‘Aantal profielen dat
geselecteerd moet worden’** komt overeen met de omvang van batches in het
voorbeeldschema. Voor batch 1 is dat dus ‘1000’.

![](../images/sort-select-profile-batch-1-1000.png)

Omdat de **‘Mail_nog_niet_ontvangen’**-selectie nachtelijks ververst kan
je **‘Selecteer vanaf positie’** ook bij de tweede batch op ‘0’ laten staan.
Het **‘Aantal profielen dat geselecteerd moet worden’** zet je dan op ‘2000’.

Gebruik je een leadscoringveld waarbij een hoge score een actief profiel
representeert? Sorteer de profielen dan oplopend op basis van dat veld.
Wanneer je niet zo'n veld hebt, dan kan je de standaardwaarden laten staan.

Wanneer je je eerste mailing naar alle profielen hebt gestuurd en je wilt
een tweede mailing versturen, dan dien je de selectie **‘Mail_nog_niet_ontvangen’**
bij te werken. Je zet nu de **‘Verstuurd na’**-datum op een tijdstip na
de verzending naar de laatste batch van de eerste mailing. Dit tijdstip
moet liggen voor de verzending van de eerste batch van je tweede mailing.

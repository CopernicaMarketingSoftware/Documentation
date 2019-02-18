# Database selecties
Naast velden en collecties, kun je in Copernica ook gebruik maken van selecties.
Met een selectie groepeer je een deel van de profielen in je database, zodat je
ze als bestemming kunt behandelen in mailings en opvolgacties. Deze selecties
maak je op basis van bepaalde eigenschappen die een profiel moet hebben. Neem
bijvoorbeeld een selectie van iedereen die zich heeft aangemeld voor de
nieuwsbrief; Deze nieuwsbriefselectie kun je dan als bestemming instellen voor
je nieuwsbrief, zodat je niet handmatig hoeft te kijken naar wie je moet mailen.

Met selecties kun je je database nauwkeurig segmenteren, waardoor je gerichte
mailings kunt sturen. De inhoud van selecties wordt automatisch bijgewerkt,
zodat je selecties altijd de profielen bevatten die aan de voorwaarden van de
selectie voldoen.

Naast 'gewone' selecties bestaan er ook
[miniselecties](./database-collections.md) en subselecties.

## Subselecties
Een subselectie is een selectie van profielen uit een bestaande selectie.
Bijvoorbeeld een selectie van mensen onder de 30, in de selectie van vrouwen.
De profielen in een subselectie moeten aan alle condities van de selectie
voldoen, alsmede die van de subselectie. In ons voorbeeld betekent dit dus dat
het profiel zowel vrouwelijk als onder de 30 moeten zijn.

Dit is niet alleen handig voor het overzicht in je database, het kan je
database ook een stuk sneller maken. Als je namelijk een subselectie van mensen
onder de 30 maakt onder de selectie van vrouwen, hoeft Copernica alleen de
profielen die al in de selectie "Vrouwen" staan te doorzoeken in plaats van
alle profielen in de database.

Het maken van subselecties is alleen mogelijk op profielniveau:
"subminiselecties" maken in een collectie is dus niet mogelijk. Subselecties
maak je op dezelfde manier aan als selecties, maar je geeft daarbij
aan waar de subselectie onder dient te vallen.

## Regels en condities
Zoals hierboven vermeld, moeten profielen in een selectie bepaalde
eigenschappen hebben om bij die selectie te horen. Deze voorwaarden stel je in
Copernica in door middel van selectieregels en -condities. Je kunt op van alles
filteren, van een geboortedatum tot clicks in mailings in een bepaalde periode.

Regels en condities verschillen wel degelijk van elkaar. Een conditie is een
onderdeel van een regel; er kunnen namelijk meerdere condities in een regel
zitten. Oftewel, binnen een **OF**- of **OF NIET**-regel worden
**EN**-condities aan elkaar gelinkt. De profielen worden toegekend aan een
selectie als aan één van de verschillende regels wordt voldaan.

Als profielen in een selectie moeten voldoen aan een of meerdere voorwaarden,
gebruik je een **OF**-regel met **EN**-conditie(s). Als profielen juist niet
moeten voldoen aan een of meerdere voorwaarden, gebruik je een
**OF NIET**-regel met **EN**-conditie(s).

Je kunt op een aantal manieren bepalen hoe profielen worden toegevoegd aan
selecties. Deze filters worden binnen Copernica selectiecondities genoemd.
Hieronder zijn de verschillende opties uiteengezet:

### Check op Veldwaarde
Dit is de meest voorkomende conditie. Als er een conditie op veldwaarde wordt
gedaan, dan vergelijk je een waarde uit een databaseveld. Stel dat er gekeken
dient te worden of een klant ingeschreven staat, dan wordt de veldwaarde van
het databaseveld Nieuwsbrief gecontroleerd op waarde "Ja". Alle profielen met
waarde "Ja" in het veld Nieuwsbrief zullen dan in de selectie terecht komen.

### Check op interessegebied
Stelt een selectie samen aan de hand van een bepaalde interessevelden uit de
database. Deze interesse kan bijvoorbeeld gaan over een bepaald product. Alle
interesses die gelijk zijn aan dat product komen dan in de selectie.

### Check op datum
Stelt een selectie samen aan de hand van een specifieke tijdsperiode. De datum
kan bijvoorbeeld worden toegekend aan een bepaalde gebeurtenis. Denk hierbij
aan de datum waarop de garantie afloopt, de datum van de eerste aankoop, of de
datum waarop iemand zich aangemeld heeft voor de nieuwsbrief. Alle datums die
binnen een gespecificeerd aantal dagen van vandaag zijn, komen dan in de
selectie.

### Check op resultaten e-mail/sms/faxcampagnes
Stelt een selectie samen aan de hand van het opgegeven campagneresultaat. Dit
campagneresultaat kan gaan over e-mailcampagnes, sms-campagnes, faxcampagnes en
enquÃªtes. Denk bijvoorbeeld aan de ontvangers van een e-mail die op een
hyperlink hebben geklikt. Alle profielen met hetzelfde campagneresultaat komen
dan in een selectie. Hier wordt een onderscheid gemaakt tussen de Publisher en
de Marketing Suite, daar zijn verschillende condities voor. Voor Marketing Suite
campagnes dient er een gekozen te worden voor 'controleer op Marketing Suite
resultaten'.

### Check op dubbele of unieke profielen
Stelt een selectie samen op basis van hoe vaak profielen voorkomen in de
database. Er kan voor gekozen worden om unieke profielen of dubbele profielen in
deze selectie voor te laten komen.

### Check op wijziging
Het is mogelijk om velden te checken op veranderingen en vervolgens het
bijbehorende profiel in een selectie te plaatsen. Zo kun je bijvoorbeeld
iedereen die onlangs is verhuisd een mailing sturen. Er kan ook gekeken worden
of profielen aangemaakt zijn in een opgegeven periode.

### Check op inhoud van (mini)selectie
Stelt een selectie samen aan de hand van een eerder aangemaakte (mini)selectie.
Het combineren van (mini)selecties geeft je nog meer flexibiliteit in het doen
van aanbiedingen aan je klanten. Profielen die voorkomen in de twee opgestelde
selecties, ontvangen dan bijvoorbeeld een mailing. Het is ook mogelijk om
klanten uit te sluiten die in een (mini)selectie voorkomen.

### Eerdere exports
Het is mogelijk om profielen te selecteren die zijn geÃ«xporteerd gedurende een
bepaalde periode.

### Sorteren en selecteren
Je kunt ook een aantal profielen selecteren uit een gesorteerde lijst.

## Aanmaken of wijzigen (mini)selectie Marketing Suite
Klik op het **blauwe tandwiel** in de rechterbovenhoek, hierna volgt een menu,
klik in dit menu op **Selecties aanmaken**. Geef de selectie een naam en kies
of de selectie direct onder de database valt (reguliere selectie) of dat deze
onder een andere selectie valt (subselectie). Deze selectie kan vervolgens
aangepast worden door regels en condities toe te voegen.

Om een selectie aan te passen dient er weer naar hetzelfde menu gegaan te
worden en aan de linkerkant de aan te passen selectie te selecteren. Klik
vervolgens op  **Selectieregels bewerken**. In dit overzicht kunnen nieuwe
regels of condities toegevoegd worden aan de selecties.

## Aanmaken of wijzigen (mini)selectie Publisher
Klik op **Databasebeheer > Selecties beheren**. Om een nieuwe selectie te maken
dient er geklikt te worden op **selectie aanmaken**. Kies de naam van de
selectie en klik op **onder** om aan te geven onder welke selectie of database
de nieuwe selectie zal vallen. Klik vervolgens op het tweede tabblad
**Selectie condities**, hier kunnen extra regels en condities toegevoegd worden.
Om een conditie aan dezelfde regel toe te voegen, klik op
**Voeg een nieuwe 'EN' conditie toe aan deze 'OF' regel**. Wil je een nieuwe
regel maken met een nieuwe conditie? Klik dan op
**Voeg een nieuwe 'EN' conditie toe aan een nieuwe 'OF' regel**.

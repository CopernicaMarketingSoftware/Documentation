# Selecties
Naast velden en collecties, kun je in Copernica ook gebruik maken van selecties.
Met een selectie groepeer je een deel van de profielen in je database, zodat je
ze als bestemming kunt behandelen in mailings en opvolgacties. Deze selecties
maak je op basis van bepaalde eigenschappen die een profiel moet hebben. Neem
bijvoorbeeld een selectie van iedereen die zich heeft aangemeld voor de
nieuwsbrief; Deze nieuwsbriefselectie kun je dan als bestemming instellen voor
je nieuwsbrief, zodat je niet handmatig hoeft te kijken naar wie je moet mailen.

Met selecties kun je je database nauwkeurig segmenteren, waardoor je gerichte
mailings kunt sturen. De inhoud van selecties wordt automatisch bijgewerkt,
zodat je selecties altijd de profielen bevatten die op dat moment aan de voorwaarden van de
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
filteren, van een geboortedatum tot kliks in mailings in een bepaalde periode.

Regels en condities verschillen wel degelijk van elkaar. Een conditie is een
onderdeel van een regel; er kunnen namelijk meerdere condities in een regel
zitten. De profielen moeten aan alle condities binnen een regel voldoen om in de selectie te vallen.

Voorbeeld:  
```
-Regel 1, conditie 1, check op veldwaarde: de waarde van het veld 'Geslacht' moet gelijk zijn aan 'Vrouw'
-Regel 1, conditie 2, check op veldwaarde: de waarde van het veld 'Leeftijd' moet gelijk zijn aan '30'
```
In dit geval dient het profiel zowel de waarde 'vrouw' als '30' te hebben.  

Als profielen in een selectie moeten voldoen aan één of meerdere voorwaarden,
gebruik je meerdere regels met verschillende condities. 

Voorbeeld:  
```
-Regel 1, conditie 1, check op veldwaarde: de waarde van het veld 'Postcode' moet gelijk zijn aan '1101 AB'
-Regel 2, conditie 1, check op veldwaarde: de waarde van het veld 'Postcode' moet gelijk zijn aan '1101 AC'
```
In bovenstaand voorbeeld komen zowel profielen met postcode '1101 AB' als '1101 AC' in je selectie terug.

## Vergelijkingscondities
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
enquêtes. Denk bijvoorbeeld aan de ontvangers van een e-mail die op een
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
Het is mogelijk om profielen te selecteren die zijn geëxporteerd gedurende een
bepaalde periode.

### Sorteren en selecteren
Je kunt ook een aantal profielen selecteren uit een gesorteerde lijst.

## Aanmaken of wijzigen (mini)selectie
Om een selectie aan te maken kies je in de linkerbovenhoek voor *Aanmaken > Maak een selectie aan*.
Geef de selectie een naam en kies
of de selectie direct onder de database valt (reguliere selectie) of dat deze
onder een andere selectie valt (subselectie). Deze selectie kan vervolgens
aangepast worden door regels en condities toe te voegen.

Om een selectie aan te passen dien je naar de betreffende selectie te gaan en te klikken op de optie **Regels** in de toolbar.

## Selectietester
Als je wilt weten aan welke voorwaarden je profiel voldoet van één of bovenliggende selecties kun je gebruik maken van de selectietester. Hiervoor zoek je een profiel op in je database en kies je voor **Configuratie > Selectietester**. Je klik hier op éen van je selecties en ziet direct aan welke voorwaarden het profiel wel en aan welke voorwaarden het profiel niet voldoet.

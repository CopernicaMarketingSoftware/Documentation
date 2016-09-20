In Copernica gebruik je selecties om onderscheid te maken tussen
gegevens in je database(s). Selecties zijn actieve filters op je
gegevens (profielen), en de filtercriteria waaruit je kan kiezen zijn al
even talrijk als de bomen in een bos. De ene selectie is zwaarder dan de
ander en het slim inrichten van je database kan het doorzoeken van je
profielgegevens siginificant sneller maken.

In dit artikel geven we een aantal tips om de prestatie van je database
en selecties te verhogen.

### Verwijder selecties die je nooit meer gebruikt

Selecties worden door ons dagelijks meermaals opgebouwd. Ook wanneer een
profiel wordt toegevoegd of gewijzigd, wordt gekeken in welke selecties
het profiel thuishoort. Je zult begrijpen; hoe meer selecties er zijn,
hoe langer het uiteindelijk duurt voordat alle selecties zijn
bijgewerkt. Selecties die je nooit (meer) gebruikt kan je om deze reden
beter verwijderen. Let natuurlijk wel op dat je geen selecties
verwijdert waarnaar vanuit andere selecties wordt gerefereerd.

In Copernica kan je selecties ook archiveren. Gearchiveerde selecties
worden nog steeds regelmatig opgebouwd en het archiveren van selecties
levert dan ook geen performancewinst op.

### Deactiveer selectiecondities die je nauwelijks gebruikt

Selectiecondities kunnen worden gedeactiveerd. Condities die je
(tijdelijk) deactiveert, hoeven niet dagelijks opnieuw te worden
opgebouwd.

Het is helaas nog niet mogelijk om een hele selectie in een keer te
deactiveren.

### Verwijder databases die je nooit meer gebruikt

Sommige gebruikers maken wekelijks een nieuwe database aan voor het
versturen van een nieuwsbrief of zelfs een klein persbericht. Hoewel wij
dit natuurlijk afraden (beter kan je alles binnen een enkele database
organiseren) verbieden we het ook niet. Als je dan toch behoeftig bent
om voor iedere mailing een nieuwe database te gebruiken, gooi ze dan na
verloop van tijd ook weer weg.

Ook hier geldt: beter verwijderen dan archiveren.

### Zoek alleen op velden die je daadwerkelijk nodig hebt

Verwijder de selectiecondities die je niet nodig hebt om je doel te
bereiken. Hoe meer er moet worden doorzocht, hoe langer het opbouwen van
de selectie duurt.

### Indexeer je velden slim

In een geindexeerd veld wordt slimmer gezocht naar de opgevraagde
informatie. Normaliter wordt een databasekolom van A tot Z doorzocht. In
een geindexeerd veld kan sneller worden vastgesteld waar de informatie
zich ongeveer bevindt, en hoeft er uiteindelijk veel minder te worden
doorzocht, wat het zoeken natuurlijk in zijn geheel sneller maakt. 

Je kan het beste alleen de velden indexeren die je regelmatig in
selecties gebruikt. Het aanmaken van te veel indexvelden zal weer
vertragend werken voor de database als geheel. 

Je kan het beste numerieke velden indexeren, velden waarop je sorteert
(sorteer en selecteer conditie) en velden waar je veldcondities op
loslaat (waarde in veld X is gelijk aan Y).

Je vindt de optie 'indexeer dit veld' bij de eigenschappen van het
databaseveld.

### Doe eerst het lichte werk, dan pas het zware

De ene selectie is de ander niet. Een eenvoudige selectie die een
numeriek veld doorzoekt is veel makkelijker en sneller uitgevoerd dan
een selectie die zoekt naar profielen die in een bepaalde periode hebben
geklikt in een willekeurig emailing. Je kan daarom het beste werken met
subselecties, waarmee je het aantal te doorzoeken profielen steeds
kleiner maakt.

Veronderstel, je wilt in een database met 100.000 profielen een selectie
maken op actieve klanten tussen die zijn geboren in het jaar 1980 en in
het afgelopen jaar minimaal 3 keer een impressie hebben geregistreerd.

Je maakt dan het beste eerst een selectie die alle profielen selecteert
die de waarde 1980 in het veld geboortejaar hebben.

Onder deze selectie maak je vervolgens een subselectie, zodat alleen de
profielen die voldoen aan bovenliggende selectie worden doorzocht op de
e-mailresultaten. De zware selectie hoeft dan misschien nog maar te
worden uitgevoerd op een paar duizend profielen, in plaats van 100.000.

Lichte selectiecondities zijn:

-   simpele zoekacties zoals 'Waarde in veld X is gelijk aan Y'
-   check op interesses
-   datumcondities op datumvelden

Zware selectiecondities zijn:

-   sorteer of selecteer profielen
-   check op resultaten campagnes
-   check op wijzigingen in het profiel
-   check op dubbele of unieke profielen

### Selecties groeperen met lege selectie? Hanteer deze vorm

Veel gebruikers gebruiken lege ouderselecties om andere selecties te
groeperen. De ouderselectie heeft alleen als doel om visueel overzicht
te creeren. Prima allemaal, maar gebruik dan niet een actieve
selectieregel als 'de waarde in het veld ID moet groter zijn dan 0'.

Beter kan je een enkele selectieconditie maken, en deze uitschakelen
(deze optie vind je bij de conditie). Nu voldoen alle profielen
automatisch en hoeft er niks meer te worden doorzocht.

### Zorg dat je geen duplicate condities hebt

We zien nog wel eens dat gebruikers in subselecties onder elkaar
dezelfde filtercriteria toevoegen. Dit is vanzelfsprekend verspilde
moeite. Verwijder dus de dubbel aangemaakte condities. Scheelt weer wat
zoekwerk.

### Gebruik de juiste veldtypes

Sla numerieke waardes op in een numeriek veld. Sla je het toch in een
tekstveld op, geef dan in de selectieconditie aan dat het veld numeriek
moet worden doorzocht.

Heb je een veld waarin je postcodes opslaat? Beperkt de grootte van het
tekstveld dan tot de 6 karakters die je nodig hebt voor een Nederlandse
postcode (0000AB). Hoe kleiner een tekstveld, hoe lichter een zoekactie
op dit veld is.

Werkt je veel met datums? Gebruik dan datumvelden. Datumcondities zijn
sneller (en betrouwbaarder) wanneer wordt gezocht in een datumveld.

### Selecties met referenties

Refereer alleen naar andere selecties als dit niet anders kan. Als een
selectie afhankelijk is van 10 andere selecties, moeten deze 10
selecties eerst worden opgebouwd alvorens de eigenlijke selectie kan
worden opgebouwd. Natuurlijk is het aan elkaar koppelen van selecties
soms noodzakelijk en maakt het je database makkelijker beheerbaar, maar
als het anders kan worden opgelost (zonder deze referenties), heeft dit
absoluut onze voorkeur.

### Selecties op basis van e-mailcampagnes; liever niet

Dit is veruit het zwaarste conditietype. De conditie wordt meestal
ingezet om hardbounces te zoeken en filteren uit andere selecties. Beter
kan je door middel van document opvolgacties de fouten registreren en
direct opslaan in het profiel. Je bounce selectie kan je dan maken op
basis van een lichte veldconditie. Toegegeven, het is niet ideaal
(document opvolgacties kunnen bijvoorbeeld nog niet worden gekopieerd
naar andere documenten), maar je selecties worden wel een stuk sneller.
En dat is de insteek van dit artikel :)

### Gebruik je de sorteer / selecteer selectieconditie?

Indexeer het veld of de velden waarop je sorteert. Het beste wijs je
geen velden aan waarop je sorteert. Dan wordt automatisch het profiel ID
gebruikt. Dit is absoluut het snelst.

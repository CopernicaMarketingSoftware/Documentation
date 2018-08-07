# Databasevelden
De structuur van een databases bestaat uit velden, interesses en collecties. Velden en interesses zijn enkelvoudige velden waar bijvoorbeeld een tekst,
datum of getal in kan worden opgeslagen. In het geval van interesses wordt hier alleen een "ja/nee" waarde geaccepteerd. Door een collectie aan een database toe te voegen creëer je een extra laag in de database. Een collectie bestaat ook weer uit enkelvoudige velden.

Er zijn verschillende veldtypes beschikbaar voor het opslaan van specifieke gegevens. Bijvoorbeeld velden voor het opslaan van tekst, getallen en datums. Hieronder is een tabel weergegeven met alle beschikbare veldtypes.



| Veldtype           | Omschrijving                                                                                  |
|--------------------|-----------------------------------------------------------------------------------------------|
| Tekstveld          | Letters [A-Z], numerieke waardes [0-9] en/of underscores. Maximaal aantal karakters is 225.  |
| Numeriek veld      | Alleen numerieke waardes [0-9]. Kan geen leeg veld zijn. Geef bijvoorbeeld standaardwaarde 0 op.    |
| E-mailveld         | E-mailveld is een tekstveld, bedoeld voor het opslaan van e-mailadressen.                     |
| Telefoonveld       | Kan worden gespecificeerd voor fax, mobiele en andere telefoonnummers.                        |
| Datum- en tijdveld | Het datumveld bevat de datum (yyyy-mm-dd) en het tijdveld bevat de uren, minuten en seconden. |
| Meerkeuzeveld      | Kan worden gebruikt om meerdere opties te tonen, bovenste optie is standaardwaarde.           |
| Landcode veld      | Accepteert landcodes volgens de ISO 3166 standaard. NL, BE etc.                               |
| Grote velden       | Tekstveld tot 16 mln. tekens. Wordt niet aangeraden, omdat je niet kunt indexeren.             |

## Extra opties

Als je velden aan het bewerken bent kun je per veld een aantal extra opties selecteren. Je kunt bijvoorbeeld aangeven dat een veld standaard gesorteerd is, of dat het verborgen moet blijven. Hieronder een korte uitleg van al die opties.


### Verborgen velden

Verborgen velden zijn niet zichtbaar in het dialoogvenster om een profiel te bewerken. Gebruik deze optie voor velden die je niet meer wilt tonen of kunt bewerken via de interface. De gegevens uit een verborgen veld kunnen wel gewoon geïmporteerd en geëxporteerd worden, zoals alle andere velden.


### Veld tonen op overzichtspagina's

Deze toepassing kun je gebruiken op plaatsen in de applicatie waar een lijst van profielen wordt getoond. Er worden dan alleen velden gebruikt waarvoor deze optie is geactiveerd. In een database staan vaak veel meer velden dan dat je wilt laten zien in een profielenlijst. Deze optie stelt je in staat om zelf te bepalen wat de belangrijke velden zijn.


### Gesorteerde velden

Met deze optie kun je invoeren welk veld wordt gesorteerd. Deze optie kan slechts bij één veld tegelijkertijd worden geactiveerd.


### Geïndexeerde velden

Het indexeren van velden kan het zoeken van profielen en het maken van selecties versnellen. Het is dus verstandig om velden die je vaak opzoekt in selecties te indexeren. Je kan maximaal 64 velden indexeren, maar het is ook niet nodig er veel te indexeren. Velden van het type "Groot veld" kunnen niet worden geïndexeerd.

## Interesses
Interesses zijn velden die aan of uitgezet kunnen worden. Een profiel kan meerdere interesses hebben per groep. Denk hierbij aan dat de groep Inschrijven de waardes nieuwsbrief op ja, aanbiedingen op nee en facturen op ja kan bevatten. Interesses kunnen aangemaakt worden in het databasevelden menu door op interesse toevoegen te drukken. 

## Databasevelden aanpassen of aanmaken Marketing Suite
Om de structuur van je databasevelden aan te passen klik je rechtsboven op het **blauwe tandwiel**, hiermee kom je in het menu om de database aan te passen in de Marketing Suite. Ga vervolgens naar **structuur bewerken** om de velden aan te maken/passen. 
Er zal een lijst getoond met alle velden uit de database, klik op **bewerken** achter een veld om dit veld aan te passen. Klik op **veld toevoegen** om een nieuw veld aan te maken. Er zal aan de rechterkant van het venster een menu verschijnen waar het veld aangepast of aangemaakt kan worden. Geef het veld een naam, een van de bovengenoemde types en zet eventueel extra opties aan. 

## Databasevelden aanpassen of aanmaken Publisher
Om de structuur van je databasevelden aan te passen klik je op **Databasebeheer > Databasevelden wijzigen**. Klik op een veld om deze aan te passen of klik op **veld toevoegen** om een nieuw veld aan te maken. Er zal een venster verschijnen waar het veld aangepast of aangemaakt kan worden. Geef aan het veld onder welke database of collectie hoor en geef het veld een naam, een van de bovengenoemde types en zet eventueel extra opties aan. 


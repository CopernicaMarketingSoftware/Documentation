# Velden en collecties

De structuur van een databases bestaat uit velden, interesses en collecties.
Velden en interesses zijn enkelvoudige velden waar bijvoorbeeld een tekst,
datum of getal in kan worden opgeslagen. In het geval van interesses wordt
hier alleen een "ja/nee" waarde geaccepteerd. Door een collectie aan een 
database toe te voegen creëer je een extra laag in de database. Een 
collectie bestaat ook weer uit enkelvoudige velden.

Er zijn verschillende veldtypes beschikbaar voor het opslaan van 
specifieke gegevens. Bijvoorbeeld velden voor het opslaan van 
tekst, getallen en datums. Hieronder is een tabel weergegeven met alle
beschikbare veldtypes.


| Veldtype           | Omschrijving                                                                                  |
|--------------------|-----------------------------------------------------------------------------------------------|
| Numeriek veld      | Alleen numerieke waardes [0-9]. Kan geen leeg veld zijn. Geef altijd standaardwaarde 0 op.    |
| Tekstveld          | Letters [A-Z], nummerieke waardes [0-9] en/of underscores. Maximaal aantal karakters is 225.  |
| Grote velden       | Tekstveld tot 16 mln. tekens. Word niet aangeraden, omdat je niet kunt indexeren.             |
| Datum- en tijdveld | Het datumveld bevat de datum (yyyy-mm-dd) en het tijdveld bevat de uren, minuten en seconden. |
| E-mailveld         | E-mailveld is een tekstveld, bedoelt voor het opslaan van e-mailadressen.                     |
| Telefoonveld       | Kan worden gespecificeerd voor fax, mobiele en andere telefoonnummers.                        |
| Meerkeuzeveld      | Kan worden gebruikt om meerdere opties te tonen, bovenste optie is standaardwaarde.           |
| Landcode veld      | Accepteert landcodes volgens de ISO 3166 standaard. NL, BE etc.                               |


## Extra opties

Als je velden aan het bewerken bent kun je per veld een aantal extra opties
selecteren. Je kunt bijvoorbeeld aangeven dat een veld standaard gesorteerd is,
of dat het verborgen moet blijven. Hieronder een korte uitleg van al die opties.


### Verborgen velden

Verborgen velden zijn niet zichtbaar in het dialoogvenster om een profiel
te bewerken. Gebruik deze optie voor velden die je niet meer wilt tonen of 
kunt bewerken via de interface. De gegevens uit een verborgen veld kunnen 
wel gewoon geïmporteerd en geëxporteerd worden, zoals alle andere velden.


### Veld tonen op overzichtspagina's

Deze toepassing kun je gebruiken op plaatsen in de applicatie waar een lijst
van profielen wordt getoond. Er worden dan alleen velden gebruikt waarvoor 
deze optie is geactiveerd. In een database staan vaak veel meer velden dan dat 
je wilt laten zien in een profielenlijst. Deze optie stelt je in staat om zelf 
te bepalen wat de belangrijke velden zijn.


### Gesorteerde velden

Met deze optie kun je invoeren welk veld wordt gesorteerd. Deze 
optie kan slechts bij één veld tegelijkertijd worden geactiveerd.


### Geïndexeerde velden

Het indexeren van velden kan het zoeken van profielen en het maken van 
selecties versnellen. Het is dus verstandig om velden die je vaak opzoekt 
in selecties te indexeren. Je kan maximaal 64 velden indexeren, 
maar het is ook niet nodig er veel te indexeren. Velden van het type 
"Groot veld" kunnen niet worden geïndexeerd.


## Meer informatie

* [Database management](./database-introduction)

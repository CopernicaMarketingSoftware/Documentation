# Velden en collecties

De structuur van een databases bestaat uit velden, interesses en collecties.
Velden en interesses zijn enkelvoudige velden waar bijvoorbeeld een tekst,
datum of getal in kan worden opgeslagen, of, in het geval van interesses, een 
"ja/nee" waarde. Door een collectie aan een database toe te voegen creëer je 
een extra laag in de database. Een collectie op zichzelf bestaat ook weer uit 
enkelvoudige velden.

Er zijn verschillende veldtypes beschikbaar, geschikt voor het opslaan van 
specifieke gegevens. Er zijn bijvoorbeeld velden voor het opslaan van 
tekst, en velden voor getallen en datums (we schrijven en spreken altijd over *datums* in 
plaats van *data*, omdat *data* ook een andere, meer algemene, betekenis heeft).
Als je je database aan het inrichten bent, dan spreekt het formulier om een
veld toe te voegen grotendeels voor zich, maar voor de volledigheid zullen we 
elk type veld verderop in dit artikel de revue laten passeren.

## Collecties

Met collecties kun je een extra laag aan de database toevoegen. Reguliere
velden en interesses kunnen alleen worden gebruikt voor enkelvoudige data,
zoals teksten en getallen. Als je ook geneste gegevens wilt opnemen in de
database, kun je daar collecties voor gebruiken. Zo kun je in de database met 
klantgegevens een collectie met bestellingen opnemen. Van elke klant sla je 
dan niet alleen de velden "voornaam", "achternaam" en "emailadres" op, maar 
ook de in het verleden bestelde producten in de collectie "bestellingen".

## Interesses

Naast velden kun je ook interesses aan een database toevoegen. Een interesse
is eigenlijk ook gewoon een soort veld, maar kan slechts twee mogelijke waardes
hebben: "aan" of "uit". Je kunt deze waarde natuurlijk ook interpreteren als 
"ja" of "nee", "true" of "false" of "1" en "0". Als je een sportwinkel beheert,
dan zou je aan je database bijvoorbeeld interesses als "voetbal", "hockey" en
"tennis" kunnen toevoegen.

Als je een interesse toevoegt, moet je ook de naam van een groep opgeven. Deze
groepsnaam is niet zo relevant voor campagnes, maar wordt door Copernica 
gebruikt om formulieren om profielen te bewerken wat netter op te maken. 
Interesses die bij dezelfde groep horen, worden in dergelijke formulieren
netjes bij elkaar geplaatst. 

## Velden

Binnen Copernica kan gebruik worden gemaakt van verschillende types
velden voor het opslaan van gegevens. Zowel databases als collecties bestaan
uit velden. Als je een veld toevoegt aan de database, moet je daarom kiezen
of je het veld aan de database zelf wil toevoegen, of aan een collectie
een laag dieper.

![Typen velden](../images/edit_database_fields.png)

Als je een veld toevoegt moet je kiezen wat voor type veld het is. Teksten
sla je op in tekstvelden, datums in datumvelden, enzovoort. De volgende 
veldtypes worden ondersteund:

### Numerieke velden

Dit veld kan alleen numerieke waarden [0-9] bevatten. Gebruik dit
veldtype om informatie zoals lengte of gewicht op te slaan. Numerieke
velden moeten altijd ten minste één cijfer bevatten (een leeg veld kan
niet worden opgeslagen). Tip: maak de standaardwaarde een 0 (nul).

**Let op:** numerieke velden kunnen geen decimalen bevatten (,34). Als je
toch decimalen wilt opslaan (bijvoorbeeld voor het opslaan van prijzen),
gebruikt dan in plaats van een numeriek veld een tekstveld. SOAP API
gebruikers kunnen eventueel het veldtype 'float' gebruiken om getallen
met decimalen op te slaan.

### Tekstveld

Tekstvelden zijn velden voor tekstuele inhoud en kunnen letters [A-Z], 
numerieke waardes [0-9] of underscores bevatten. Een tekstveld kan
tot 5 regels (multiline) hoog zijn. De standaardlengte van een tekstveld
is 50 tekens. Je kunt dit aantal indien gewenst verhogen tot 255. Als je
meer dan 255 karakters in een databaseveld kwijt wilt, gebruikt dan een
"groot veld" (zie hieronder).

Het is het beste om een tekstveld niet groter te maken dan strict noodzakelijk.
Beperk de standaardlengte van database velden tot wat nodig is. Dit
komt ten goede van de performance van de database. Het aantal rijen dat je kunt 
instellen wordt alleen gebruikt in dialoogvensters om een profiel te bewerken 
en in het profieloverzicht. Het heeft geen invloed op de weergave van 
webformulieren.


### Grote velden

Grote velden zijn in principe hetzelfde als tekstvelden, op een klein verschil 
na: ze kunnen tot 16 miljoen tekens bevatten (genoeg om een bestseller in op 
te slaan). Het is beter om dit soort velden niet te gebruiken, en al helemaal
niet om selecties te maken op basis van grote velden. Grote velden zijn de 
enige velden die niet kunnen worden geïndexeerd.


### Datumveld

Datumvelden worden (uiteraard) gebruikt voor het opslaan van
datumgegevens. Een datumveld moet een geldig opgemaakte datum bevatten
(yyyy-mm-dd). Een datumveld wordt automatisch gevuld met nullen indien
deze niet leeg mag zijn (0000-00-00). Een datum wordt meestal weergegeven als
jaar-maand-dag. Dit is voor computers de handigste manier om met datums te 
werken, omdat datums daardoor eenvoudig kunnen worden gesorteerd.

### Datum + tijdveld

Datum + tijdvelden zijn normale datumvelden, maar uitgebreid met uren,
minuten en seconden, bijvoorbeeld "1980-09-03 08:56:36"

### Emailveld

Een emailveld is hetzelfde als een tekstveld, maar dan speciaal voor 
emailadressen. Als je Copernica voor mailings gebruikt (en dat is bijna altijd
het geval), dan moet je zorgen dat je in ieder geval een dergelijk veld in je
database opneemt, anders kunnen er geen mailings worden verstuurd.
Een database kan maar één emailveld bevatten. Als een tweede emailveld wordt
toegevoegd, wordt het eerste veld automatisch omgezet naar een tekstveld.

Emailvelden kunnen in principe alleen legitieme e-mailadressen bevatten. Dat 
wil zeggen: de adressen moeten correct zijn opgemaakt, zoals "naam@bedrijf.nl"
of "a.bcdfg@bedrijf.co.uk". Bij het invoeren of bewerken van profielen wordt de
ingevoerde waarde gevalideerd. Als een emailadres niet goed is opgemaakt, dan
wordt een waarschuwing gegeven. Deze waarschuwing kan echter worden genegeerd
als je het adres ondanks de fout toch in de database wilt opslaan. 

Daarnaast wordt gecontroleerd of het adres daadwerkelijk bestaat door een
proefconnectie met de ontvangende server te maken. Wanneer een emailadres 
volgens deze controle niet bestaat, ontvang je hierover ook een melding. Maar 
let op: de controle is niet waterdicht. Het emailadres kan tijdens de controle
bijvoorbeeld tijdelijk onbereikbaar zijn. Je moet het daarom zien als
een hulpmiddeltje.

### Telefoonveld

Een telefoonveld kan worden gespecificeerd voor fax, mobiele en andere
telefoonnummers. Wanneer je een database gebruikt om faxen te verzenden, zal
het nummer in het faxveld worden gebruikt voor het versturen van deze
faxberichten. Het veld GSM wordt gebruikt voor mobiele campagnes. 

Net als bij emailadressen, kan een database slechts één veld voor mobiele
nummers en één veld voor faxnummers bevatten. Het creëren van een tweede
veld zal het oorspronkelijke veld veranderen naar een tekstveld.

### Meerkeuzeveld

Een meerkeuzeveld wordt bij het bewerken van profielen en op diverse
andere plaatsen in de applicatie getoond als een uitklapmenu. Hierin
zijn dan alleen de vooraf ingevoerde waarden beschikbaar. Typ de opties
in het veld 'waarde'. De bovenste waarde wordt automatisch de
standaardwaarde voor nieuwe profielen. Als je een andere standaardwaarde
wil gebruiken, kan je gebruik maken van een asterisk (\*). In het
volgende voorbeeld, is de stad Haarlem de standaardwaarde:

-   Amsterdam
-   Rotterdam
-   Den Haag
-   Haarlem \*

Deze asterisk wordt niet getoond in webformulieren of tijdens het
bewerken van profielen. Een meerkeuzeveld kan ook een lege optie krijgen. 
Gebruik hiervoor gewoon een lege regel (enter).

Een meerkeuzeveld wordt niet automatisch getoond als een drop-down box als 
het wordt gebruikt in webformulieren. Dit kan onafhankelijk worden ingesteld 
bij het webformulier zelf.

### Landcode

Dit veld accepteert alleen landcodes volgens de ISO 3166 standaard. De
landcode voor Nederland is NL en die van België BE. Voor een volledige
lijst met landencodes kan je terecht op de website van ISO.org.

[Bekijk alle
landcodes](http://www.iso.org/iso/country_codes/iso_3166_code_lists/country_names_and_code_elements.htm)


## Extra opties

Als je velden aan het bewerken bent, kun je per veld een aantal extra opties
selecteren. Je kunt bijvoorbeeld aangeven dat een veld standaard gesorteerd is,
of dat het verborgen moet blijven. Hieronder een korte uitleg van al die opties.

### Bij het bewerken verborgen velden

Verborgen velden zijn niet zichtbaar in het dialoogvenster om een profiel
te bewerken. Gebruik deze optie voor velden die je niet meer wilt tonen of 
kunnen bewerken via de interface. De gegevens uit een verborgen veld kunnen 
wel gewoon geïmporteerd en geëxporteerd worden, zoals alle andere velden.

### Veld tonen op overzichtspagina's

Op plaatsen in de applicatie waar een lijst van profielen wordt getoond, worden
alleen de velden gebruikt waarvoor deze optie is geactiveerd. In een database
staan vaak veel meer velden dan dat je wilt laten zien in zo'n profielenlijst.
Deze optie stelt je in staat om zelf te bepalen wat de belangrijke velden zijn.

### Gesorteerde velden

Als een lijst van profielen wordt getoond, is deze lijst alvast gesorteerd
op een specifiek veld. Met deze optie kun je invoeren welk veld dat is. Deze 
optie kan slechts bij één veld tegelijkertijd worden geactiveerd.

### Geïndexeerde velden

Gebruik deze optie voor velden die je vaak gebruikt voor het zoeken van
profielen, en waarmee je selecties hebt gemaakt. Het indexeren van deze velden
versnelt het zoeken binnen je database en het opbouwen van selecties en 
miniselecties. Indexeer niet te veel velden. Je kan maximaal 64 velden indexeren.
Velden van het type "Groot veld" kunnen niet worden geïndexeerd.


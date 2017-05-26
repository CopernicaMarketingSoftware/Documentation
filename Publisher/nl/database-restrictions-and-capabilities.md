# Database restricties en gebruiksmogelijkheden

Copernica is uitgerust met een aantal veiligheidssystemen om te voorkomen
dat ongeldige gegevens in je database belanden. Tegelijkertijd voorkomt het
ook dat je een mailing verstuurt naar een verkeerd adressenbestand. Je kunt met
behulp van *databaserestricties* regels maken om inputdata te filteren, zodat
ongeldige data niet in de database belandt. Het overzicht van deze systemen 
is te vinden in de Marketing Suite.


## Gebruiksmogelijkheden instellen

Copernica verkomt dat een nieuwe database of selectie direct gebruikt kan worden.
Hiermee voorkom je dat per ongeluk mailings worden verstuurd naar een selectie of 
database, terwijl dat niet de bedoeling was. De databases en selecties die gebruikt
mogen worden voor mailings moeten specifiek ingeschakeld worden. 


## Databaserestricties

Databaserestricties zijn regels die je kunt toevoegen aan een database 
of collectie. Wijzigingen en toevoegingen aan een database, moeten dan
aan de vooropgestelde regels voldoen om te worden doorgevoerd.  
Je kunt bijvoorbeeld de minimumleeftijd instellen of zorgen dat de
gebruikersnaam altijd uniek is. Er bestaat daarnaast een optie 
"dubbele veldwaarden blokkeren" waarmee je vervuiling van de database 
tegengaat.

Je kunt restricties ook koppelen met "AND" en "OR" operators. Deze spreken 
vrijwel voor zich: als je een restrictie maakt met meerdere "AND" regels,
kunnen alleen profielen worden opgeslagen die aan alle regels voldoen. 
Bij een "OR" regel hoeft het profiel, maar aan één van de voorwaarden te 
voldoen om toegelaten te worden.


## Reguliere expressies

Reguliere expressies (vaak afgekort naar *regex*) is een krachtig methode 
om restricties in te stellen. Deze expressies kunnen patronen herleiden en
de uitkomst goed of afkeuren. De volgende regex laat alleen postcodes toe
die bestaan uit 4 getallen, gevolgd door twee letters (0000AA).

```javascript
var rege = /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i;
```
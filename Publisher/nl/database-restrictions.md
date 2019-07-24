# Databaserestricties
Copernica is uitgerust met een aantal veiligheidssystemen om te voorkomen
dat ongeldige gegevens in je database belanden. Tegelijkertijd voorkomt het
ook dat je een mailing verstuurt naar een verkeerd adressenbestand. Je kunt met
behulp van *databaserestricties* regels maken om inputdata te filteren, zodat
ongeldige data niet in de database belandt. Het overzicht van deze systemen
is te vinden in de Marketing Suite.

## Gebruiksmogelijkheden instellen
Copernica voorkomt dat een nieuwe database of selectie direct gebruikt kan
worden. Hiermee voorkom je dat er per ongeluk mailings worden verstuurd naar
een selectie of database, terwijl dat niet de bedoeling was. De databases en
selecties die gebruikt mogen worden voor mailings moeten specifiek ingeschakeld
worden.

## Databaserestricties
Databaserestricties zijn regels die je kunt toevoegen aan een database
of collectie. Wijzigingen en toevoegingen aan een database moeten dan
aan de vooropgestelde regels voldoen om te worden doorgevoerd.
Je kunt bijvoorbeeld de minimumleeftijd instellen of zorgen dat de
gebruikersnaam altijd uniek is. Er bestaat daarnaast een optie
"dubbele veldwaarden blokkeren" waarmee je vervuiling van de database
tegengaat.

**Let op:** deze restricties worden alleen toegepast op nieuwe profielen en
wijzigingen aan bestaande profielen. Om bestaande foutieve profielen te
verwijderen, zal je voor deze een selectie moeten aanmaken met dezelfde
voorwaarden als de databaserestricties en deze profielen te verwijderen met de
functionaliteit **meerdere (sub-)profielen wijzigen/verwijderen...**.

## Reguliere expressies
Reguliere expressie (vaak afgekort naar *regex*) is een krachtig methode
om restricties in te stellen. Deze expressies kunnen patronen herleiden en
de uitkomst goed- of afkeuren. De volgende regex laat alleen postcodes toe
die bestaan uit 4 getallen, gevolgd door twee letters (1000AA).

`^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$`

## Meer informatie
Om restricties toe te voegen heb je een database en een aantal velden nodig.
Als je deze nog niet hebt aangemaakt kun je in onderstaande artikelen lezen
hoe je dit doet.

* [Database management](./database-introduction)
* [Database velden](./database-fields)
* [Database collecties](./database-collections)
* [Database uitschrijfgedrag](./database-unsubscribe-behavior)

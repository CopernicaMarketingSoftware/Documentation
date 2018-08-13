# Restricties

Copernica is uitgerust met een aantal veiligheidssystemen om te voorkomen
dat ongeldige gegevens in je database belanden. Tegelijkertijd voorkomt het
ook dat je een mailing verstuurt naar een verkeerd adressenbestand. Je kunt met
behulp van *databaserestricties* regels maken om inputdata te filteren, zodat
ongeldige data niet in de database belandt. Het overzicht van deze systemen 
is te vinden in de Marketing Suite.


## Gebruiksmogelijkheden instellen

Copernica voorkomt dat een nieuwe database of selectie direct gebruikt kan worden.
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
die bestaan uit 4 getallen, gevolgd door twee letters (1000AA).

```javascript
^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$
```

Wat deze regex doet:

1. `^` komt overeen met het begin van een string (tekenreeks)
2. `[1-9]` komt overeen met een reeks van 1 tot 9
3. `[0-9]{3}` gevolgd door drie keer een cijfer van 0 tot 9. 
4. `?` komt overeen met 0 of 1 spaties
5. `(?!sa|sd|ss)` kijkt vooruit om te controleren of de rest niet "sa", "sd" of "ss" bevat.
6. `[a-z]{2}` komt overeen met 2 letters
7. `$` komt overeen met het einde van de string

## Meer informatie

Om restricties toe te voegen heb je een database en een aantal velden nodig. 
Als je deze nog niet hebt aangemaakt kun je in onderstaande artikelen lezen 
hoe je dit doet.

* [Database management](./database-introduction)
* [Database velden en collecties](./database-fields-and-collections)
* [Database uitschrijfgedrag](./database-unsubscribe-behavior)

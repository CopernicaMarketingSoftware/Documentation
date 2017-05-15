# Database restricties en gebruiksmogelijkheden

Copernica is uitgerust met een aantal veiligheidssystemen om te voorkomen
dat ongeldige gegevens in je database belanden, maar ook om te voorkomen dat je
een mailing verstuurt naar een verkeerd adressenbestand. Je kunt met
behulp van *databaserestricties* regels maken om inputdata te filteren en
te voorkomen dat er ongeldige data in de database belandt.
Het overzicht van deze systemen is te vinden in de Marketing Suite.

## Gebruiksmogelijkheden instellen

Als je een nieuwe database of een nieuwe selectie aanmaakt dan kan deze
nog niet direct worden gebruikt voor het versturen van mailings. De databases 
en selecties die gebruikt mogen worden voor mailings moeten specifiek 
ingeschakeld worden in het dialoogvenster. Hiermee voorkom je dat je 
bijvoorbeeld mails stuurt naar je hele database als niet iedereen mails 
wil ontvangen.

## Databaserestricties

Door databaserestricties zijn regels die je kunt toevoegen aan een database 
of collectie. Wanneer iemand de data hierin aanpast of nieuwe data toevoegt 
zal deze aan de regels moeten voldoen. Je kunt bijvoorbeeld een minimumleeftijd 
hiermee instellen, of zorgen dat de waarden van een gebruikersnaam altijd 
uniek is. Er bestaat daarnaast een optie "dubbele veldwaarden blokkeren" 
waarmee je vervuiling van de database tegengaat. Alle waardes die al in 
je database stonden blijven hun originele waarde behouden, maar zullen 
bij de volgende aanpassing aan de restricties moeten voldoen.

Je kunt restricties ook koppelen met "AND" en "OR" operators. Deze spreken 
vrijwel voor zich: als je een restrictie maakt met meerdere "AND" regels 
kunnen alleen profielen worden opgeslagen die aan alle regels voldoen. 
Bij een "OR" regel hoeft het profiel maar aan één van de 
voorwaarden te voldoen om toegelaten te worden.

### Reguliere expressies

Reguliere expressies (vaak afgekort naar *regex*) zijn een krachtig middel 
om restricties in te stellen door het herkennen van patronen. Bijvoorbeeld: 
"alle woorden die beginnen met de letter A" of "alle telefoonnummers 
bestaande uit 10 karakters" of "elke zin met twee kommas en een hoofdletter Q". 

De volgende regex laat alleen postcodes toe die bestaan uit 4 getallen,
gevolgd door twee letters (0000AA).

**/\^[0-9]4[a-z|A-Z]2\$/**

Met deze regex als databaserestrictie voorkom je dat foutieve postcodes
kunnen worden ingevoerd. Op het internet zijn goede tutorials en
uitgebreide libraries beschikbaar om met reguliere expressies te leren werken.

-   [http://regexlib.com/](http://regexlib.com/)
-   [http://www.regular-expressions.info/](http://www.regular-expressions.info/)

Let op: reguliere expressies beginnen en eindigen altijd met een slash (/)

[Terug naar database beheer](./database-introduction).

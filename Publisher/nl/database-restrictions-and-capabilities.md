# Database restricties en gebruiksmogelijkheden

Copernica is uitgerust met een aantal veiligheidssystemen om te voorkomen
dat ongeldige gegevens in je database belanden, en om te voorkomen dat je
een mailing verstuurt naar een verkeerd adressenbestand. Je kunt met
behulp van *databaserestricties* regels maken om inputdata te filteren en
te voorkomen dat er ongeldige data in de database belandt.
Het overzicht van deze systemen zijn te vinden in de Marketing Suite.


## Gebruiksmogelijkheden instellen

Als je een nieuwe database of een nieuwe selectie aanmaakt, dan kan deze
nog niet direct worden gebruikt voor het versturen van mailings. Dit is een 
veiligheidssysteem waarmee we voorkomen dat iemand per ongeluk een mailing 
stuurt naar zijn hele database, terwijl het de bedoeling was om alleen de 
nieuwsbriefabonnees te mailen.

In het dialoogvenster kan je voor elke database en selectie, en ook voor 
elke collectie en miniselectie, aangeven of die mag worden gebruikt voor mailings. 
Zo weet je zeker dat je nooit per ongeluk een mail stuurt naar de selectie "afmeldingen", 
of dat je alleen kunt mailen naar de selectie "nieuwsbrief" en niet naar de hele database.


## Databaserestricties

Databaserestricties zijn regels die je kunt instellen op een database of
collectie. Wanneer iemand data wil toevoegen of wijzigen (via de applicatie of 
via een webformulier), dan moet de ingevoerde waarde voldoen aan deze regels 
anders kan het profiel niet opgeslagen of gewijzigd worden. Zo kun je bijvoorbeeld
instellen dat de waarde van het databaseveld "Leeftijd" niet lager mag zijn dan
18 het veld "emailadres" nooit leeg mag zijn en de waarde in het het
veld "gebruikersnaam" uniek moet zijn.

Als je een databaserestrictie toevoegt aan een database waar al profielen in 
staan, dan zou het kunnen dat de reeds opgeslagen data niet voldoet aan de 
restrictie die je net hebt ingevoerd. Dit kan gebeuren en heeft geen invloed
of bestaande data. De reeds ingevoerde profielen behouden hun illegale waarde. 
Echter, wanneer je een dergelijk (sub)profiel opnieuw zou bewerken, dan moet 
de oude waarde worden vervangen door een waarde die niet in strijd is met de 
databaserestricties.

De mogelijkheden van databaserestricties gaan redelijk ver. Een enkele restrictie
kan uit meerdere regels bestaan die door middel van "AND" en "OR" operators worden
samengevoegd. Het spreekt eigenlijk voor zich: als je een restrictie maakt met
meerdere "AND" regels, dan kan een profiel alleen worden opgeslagen als het aan
al die regels voldoet. Bij een "OR" regel hoeft het profiel maar aan één van de 
voorwaarden te voldoen om toegelaten te worden.

Je kunt ook regels toevoegen om te voorkomen dat een database vervuild raakt 
met dubbele data. De optie "dubbele veldwaarden blokkeren" kan hiervoor worden
gebruikt. Als een nieuw profiel wordt aangemaakt, of als een profiel wordt
bewerkt wordt eerst gecontroleerd of er al een ander profiel met gelijke
waardes in de database staat. Als dat zo is, wordt het nieuwe profiel niet 
opgeslagen.


### Reguliere expressies

Als je een restrictie op veldwaarde maakt, kun je allerlei operators gebruiken
om velden te checken. Je kunt bijvoorbeeld eisen dat een bepaalde waarde gelijk
of ongelijk moet zijn aan een string, of dat een bepaalde *substring* in een
veld moet voorkomen. Het meest krachtig is het echter om gebruik te maken
van reguliere expressies.

Reguliere expressies (vaak afgekort naar *regex*) zijn een zeer krachtig middel 
om een patroon in tekst te beschrijven. Bijvoorbeeld: "alle woorden die beginnen 
met de letter A" of "alle telefoonnummers bestaande uit 10 karakters" of "elke 
zin met twee kommas en een hoofdletter Q". Het is zelfs mogelijk alleen 
priemgetallen te onderscheppen.

De volgende regex laat alleen postcodes toe die bestaan uit 4 getallen,
gevolgd door twee letters (0000AA).

**/\^[0-9]4[a-z|A-Z]2\$/**

Met deze regex als databaserestrictie voorkom je dat foutieve postcodes
kunnen worden ingevoerd. Op het internet zijn goede tutorials en
uitgebreide libraries beschikbaar om met reguliere expressies te leren werken.

-   [http://regexlib.com/](http://regexlib.com/)
-   [http://www.regular-expressions.info/](http://www.regular-expressions.info/)

Let op: reguliere expressies beginnen en eindigen altijd met een slash (/)


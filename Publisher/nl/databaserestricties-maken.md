Databaserestricties zijn regels die je kunt instellen op een database of
collectie. Wanneer iemand data wilt toevoegen of wijzigen in een
database met restricties (via de applicatie en via webformulieren), moet
de ingevoerde waarde voldoen aan deze regels. Anders kan het profiel
niet opgeslagen of gewijzigd worden. Zo kun je bijvoorbeeld instellen
dat de waarde van het databaseveld ‘Leeftijd’ niet lager mag zijn dan
‘18’, het veld ‘e-mailadres’ nooit leeg mag zijn en de waarde in het het
veld ‘gebruikersnaam’ uniek moet zijn.

Databaserestricties kunnen onafhankelijk op zowel databases als op haar
collecties worden ingesteld.

Deze functie vind je onder *Profielen \> Database management \> Velden
bewerken \> Databaserestricties*

### **Wat gebeurt er met bestaande (sub)profielen nadat ik een databaserestrictie heb ingesteld?**

Deze (sub)profielen behouden hun eventueel ‘illegale’ waarde. Echter,
wanneer u het (sub)profiel opnieuw bewerkt, zal de oude waarde moeten
worden vervangen door een waarde die niet strijdig is met de
databaserestricties.

**Een databaserestrictie maken**
--------------------------------

Ga naar Profielen \> Database management \> Velden bewerken \>
**Databaserestricties**

Voeg een nieuwe restrictie toe en geef deze een omschrijvende naam. Klik
op opslaan. Het tabblad condities wordt automatisch geladen.

Klik op “Voeg een nieuwe 'EN' conditie toe aan een nieuwe 'OF' regel”. U
kunt vervolgens kiezen uit twee opties.

-   **Bepaalde veldwaarden blokkeren:** kies deze optie wanneer je wil
    voorkomen dat in een veld bepaalde waardes worden ingevuld
-   **Dubbele veldwaarden blokkeren:** kies deze optie wanneer van een
    bepaald veld een waarde maar een keer mag voorkomen in de database.

**Bepaalde veldwaardes blokkeren**
----------------------------------

Stel een regel in zodat bepaalde waarden worden geblokkeerd.
Bijvoorbeeld: het veld leeftijd moet groter zijn dan 18, of het veld GSM
moet altijd beginnen met 06 OF +31 06.

**EN/OF**\
 Voeg een nieuwe en/of voorwaarde toe aan een regel. Net als bij
selecties kan je diverse restricties combineren. Als je een voorwaarde
EN nog een voorwaarde toevoegt aan 1 regel, moet een profiel aan beide
voorwaarden voldoen om opgeslagen te kunnen worden. Als je twee
voorwaarden aan verschillende regels toevoegt, hoeft het profiel slechts
aan een van de regels te voldoen (de één OF de ander).

Kies het veld en hoe deze moet worden vergeleken met de waarde. De
vergelijkingen behoeven geen uitleg. Scroll naar beneden voor meer
informatie over reguliere expressies.

Afb. Waarschuwing in profieloverzicht wanneer veldwaarde wordt gewijzigd
naar een waarde die niet is toegestaan door een databaseresrictie\

**Dubbele veldwaarden blokkeren**
---------------------------------

Voeg een regel toe die er voor zorgt dat een bepaalde veldwaarde maar
een keer in de database mag voorkomen (uniek moet zijn). Bijvoorbeeld:
de waarde in het veld *emailadres*mag maar een keer voorkomen. Selecteer
twee velden wanneer de combinatie van deze velden uniek moet zijn
(bijvoorbeeld Straat en Adres).

**Het tijdelijk uitschakelen van databaserestricies of restrictieregels**
-------------------------------------------------------------------------

Net zoals met selecties en miniselecties kunnen databaserestricties en
haar regels worden uitgeschakeld, zonder dat je ze hoeft te verwijderen.

**Een databaserestrictie uitschakelen:** Selecteer *‘Deze
databaserestrictie tijdelijk niet gebruiken (uitschakelen).*

**Een restrictie conditie uitschakelen:** Selecteer ‘*Deze conditie
tijdelijk uitschakelen*’ in het tabblad **Condities**.

Let op, wanneer een regel een enkele conditie heeft welke (tijdelijk) is
uitgeschakeld voldoen alle (sub)profielen aan deze databaserestrictie.
Elke veldwaarde wordt geblokkeerd.

### **Databaserestricties met content webformulieren**

Ook webformulieren die werken met een database waarop restricties staan
ingesteld worden geblokkeerd wanneer een foutieve waarde wordt
ingevoerd. In de instellingenwizard van het formulier kan je aangeven
welke foutmelding moet worden gegeven wanneer de ingevoerde waarde in
strijd is met de databaserestrictie.

Reguliere expressies
--------------------

Bij het valideren van databasevelden kan gebruik worden gemaakt van
reguliere expressies. Reguliere expressies (vaak afgekort naar ‘regex’)
zijn een zeer krachtig middel om een patroon in tekst te beschrijven.
Bijvoorbeeld: ‘alle woorden die beginnen met de letter A’ of ‘alle
telefoonnummers bestaande uit 10 karakters’ of elke zin met twee kommas
en een hoofdletter Q. Het is zelfs mogelijk alleen priemgetallen te
onderscheppen.

De volgende regex laat alleen postcodes toe die bestaan uit 4 getallen,
gevolgd door twee letters (0000AA).

**/\^[0-9]4[a-z|A-Z]2\$/**

Met deze regex als databaserestrictie voorkom je dat foutieve postcodes
kunnen worden ingevoerd.

Het zelf maken van reguliere expressies is erg lastig, tenzij je goed
bent in puzzelen. Op het internet zijn gelukkig goede tutorials en
uitgebreide libraries beschikbaar met reguliere expressies.

-   [http://regexlib.com/](http://regexlib.com/)
-   [http://www.regular-expressions.info/](http://www.regular-expressions.info/)

Let op: reguliere expressies beginnen en eindigen altijd met een slash
(/)

# Importeren van profielgegevens
Er zijn verschillende manieren om nieuwe gegevens in te voeren of te importeren.
Zo kun je profielen niet alleen met de hand toevoegen, maar kun je ze ook
aanmaken of bewerken met de API, of importeren vanuit een CSV- of TXT-bestand
(dit zijn bestanden die je onder meer in spreadsheetprogramma's kunt maken).

Het importeren van CSV- of TXT-bestanden is krachtig en kan ook worden gebruikt
voor gelaagde databases met collecties en subprofielen. Ook kun je periodieke
imports maken die automatisch worden herhaald.

## Importbestand voorbereiden
Het bestand dat je wilt importeren moet aan een specifiek formaat voldoen.
Het moet een tab-, komma of puntkommagescheiden bestand zijn, waarvan de bovenste regel
de kolommen (de veldnamen) bevat die je gaat importeren. Het bestand moet een
UTF-8 encoding hebben en wij raden het aan om quotes om veldwaardes te plaatsen.
Hieronder geven we een voorbeeld van hoe dit bestand eruit kan zien.

    Voornaam,Achternaam,Email,Stad,Telefoonnummer
    'Jan','de Jong','jan.dejong@voorbeeld.nl','Amersfoort','0612456631'
    'Roos','Schippers','roos.schippers@voorbeeld.nl','Groningen','0612222444'

Deze bestanden kunnen in bijna alle spreadsheetprogramma's gegenereerd worden.

## Kolommen koppelen
Nadat je een bestand hebt geüpload, moet je de kolommen koppelen. Als het
systeem overeenkomstige namen vindt, zullen die kolommen en velden automatisch
gekoppeld worden. De overige kolommen kun je handmatig koppelen. Meestal
spreekt deze koppeling voor zich: het veld "Voornaam" in het importbestand
koppel je aan het veld "Voornaam" in de database. Als het benodigde veld nog
niet aanwezig is in de database, kun je die ter plekke laten aanmaken.

## Sleutelvelden
Je kunt tijdens het koppelen van de kolommen ook *sleutelvelden* instellen.
Sleutelvelden worden gebruikt om te zoeken binnen alle profielen in je database. 

**Voorbeeld:**  
In de meeste gevallen wordt het veld waar het e-mailadres in staat gekozen als sleutelveld. Met het voorbeeld van hierboven zal dit het veld 'Email' zijn. Bij het uitvoeren van de import wordt vervolgens gekeken of 'jan.dejong@voorbeeld.nl' al in de database staat. Als dit het geval is, dan wordt dit profiel aangepast op basis van de opgegeven instellingen.

## Instellingen
Onder het tabblad 'Instelling' is het mogelijk om een aantal instellingen op te geven voor de import. 
Hieronder vind je per optie een korte uitleg:

**Type:**  
Bij 'Type' kun je kiezen voor twee opties:  
* geen matches zoeken, altijd nieuwe (sub)profielen aanmaken
* zoek naar matches op basis van het sleutelveld

Bij de eerste optie worden (sub)profielen altijd aangemaakt, ondanks dat het (sub)profiel misschien al bestaat.  

Bij de tweede optie wordt er gezocht op basis van het opgegeven sleutelveld. Je kunt vervolgens bij 'Matches' aangeven of de gevonden (sub)profielen wel of niet bijgewerkt moet worden of dat deze verwijderd moeten worden. Het maximum wat je hier aan kunt geven is het aantal gevonden (sub)profielen die gewijzigd/verwijderd moeten worden. Het kan namelijk voorkomen dat het e-mailadres *jan.dejong@voorbeeld.nl* drie keer in de database voorkomt. Als je deze allen wilt aanpassen zal het maximum op 3 moeten worden gezet. 

Onder 'Niet-Matches' kun je aangeven of de ontbrekende (sub)profielen, waarvan op basis van het sleutelveld geen profiel is gevonden in de database, moeten worden aangemaakt of dat deze niet moeten worden toegevoegd. Tot slot is het mogelijk om de huidige waardes in het profiel niet te overschrijven met lege velden in het import bestand.

**Database:**  
Hier kun je aangeven of de selecties, collecties en miniselecties na de import opnieuw worden opgebouwd zodat je selecties direct up-to-date en bruikbaar zijn. Deze optie staat standaard aan.

**Schakel opvolgacties uit:**
Omdat een import veel profielen aanmaakt en/of aanpast is het in een aantal gevallen verstandig om de opvolgacties tijdelijk uit te zetten. 

## Subprofielen importeren
Je kunt ook imports in gelaagde databases (databases met subprofielen) doen.
In de header van het bestand geef je met een punt als scheidingsteken aan dat
een kolom voor subprofielen wordt gebruikt. Als je een dierenwinkel hebt met
een database met klanten en bij elke klant een collectie van huisdieren, dan
zou je het volgende bestand kunnen uploaden:

    Voornaam,Achternaam,Stad,Dieren.Naam,Dieren.Type
    'Jan','Bakker','Apeldoorn','Blacky','Hond'
    'Jan','Bakker','Apeldoorn','Minoes','Kat'

Zoals je ziet wordt "Jan Bakker" twee keer genoemd. Dit moet je doen, omdat
Jan twee huisdieren heeft en elk huisdier (elke subprofiel dus) op een aparte
regel moet staan. De profieldata ("Jan Bakker") wordt herhaald om aan te geven
dat de twee dieren bij hetzelfde profiel horen. Let wel op dat je goed de
sleutelvelden instelt (ook als je alleen maar nieuwe profielen wilt toevoegen),
omdat Copernica anders niet herkent dat de twee "Jan Bakker"-regels bij elkaar
horen.

**Let op:** als je een import gebruikt om subprofielen te updaten, zal je ook
een sleutelveld moeten toevoegen om

## Periodieke imports
Je kunt de importmodule ook gebruiken voor periodieke imports. Je moet dan
geen bestand uploaden, maar het adres (de URL) van een bestand opgeven.
Copernica zal dan periodiek jouw importbestand van het opgegeven adres
downloaden en importeren. Dit kan over het FTP-protocol, maar de beveiligde
varianten SFTP en FTPS worden beide ook ondersteund.

Voor de rest zijn de importinstellingen voor periodieke imports gelijk aan
de instellingen bij geüploade bestanden. Ook hier kun je kolommen koppelen
en sleutelvelden opgeven. Het enige verschil is dat er een extra tabblad
"interval" beschikbaar is om in te stellen hoeveel tijd er tussen twee
imports moet zitten.

## Converteren van datumnotatie
De datumnotatie in Copernica is de JJJJ-MM-DD uu:mm:ss. Dit is een handige
notatie, omdat datums hierdoor makkelijk zijn te sorteren. Let wel op
dat je dezelfde notatie gebruikt in je invoerbestand en dat je in je
importbestand niet per ongeluk datums in DD-MM-JJ notaties hebt staan.

De importmodule heeft een optie om datums die in de verkeerde volgorde staan
automatisch te converteren zodat ze toch goed in Copernica komen te staan.
Dit is echter wel foutgevoelig: de datum 03-09-1980 kan immers zowel worden
geïnterpreteerd als 9 maart 1980 en als 3 september 1980. Ongeldige datums
worden genegeerd en als leeg bestand opgeslagen. Lege datumvelden mogen echter
niet bestaan in datumvelden, dus worden ze automatisch omgezet naar
0000-00-00 (00:00:00).

## Verkeerde import terugdraaien
Als je iets verkeerd doet, kun je zomaar je hele database overschrijven met
verkeerde gegevens. Goed opletten dus. Als het toch verkeerd is gegaan, kun
je dit met het volgende stappenplan herstellen:

Na een verkeerde import kun je een selectie aanmaken waarin je alle nieuwe
profielen opneemt. Je maakt hiervoor een selectie met een conditie van het
type "check op wijzigingen". Als type verandering kies je voor "het profiel
is aangemaakt" waarbij je de periode instelt waarin de import heeft
plaatsgevonden. Als de selectie klaar is met opbouwen kun je alle profielen
in deze selectie verwijderen via de optie "wijzigen/verwijderen meerdere
profielen".

Zijn er door de import bestaande profielen verkeerd gewijzigd? Het
terughalen van profieldata kan alleen per individueel profiel met de rollback
functie. Eventueel kun je Copernica vragen om een back-up van
de database terug te zetten. Hier zijn wel kosten aan verbonden.

## Importeren in de Marketing Suite
Klik op de database of collectie waar de import gestart voor dient te worden.
Klik op het **tandwiel** rechtsboven > **Importeren** >
**Nieuwe import aanmaken**. Geef de import een naam, kies het juiste
scheidingsteken en upload het bestand. Kies vervolgens de juiste opties zoals
hierboven beschreven.

## Importeren in de Publisher
Om een bestand te importeren dien je eerst een database te selecteren onder
**Profielen**. Je kunt daarna onder **Huidige weergave** de optie vinden om te
**exporteren of importeren**.

## Meer informatie
Je database zal nu correct zijn toegevoegd aan Copernica. Nu zal je
wellicht deze willen restricteren voor bepaarde gebruikers of data moeten
filteren. Zie hierover meer in de volgende artikelen:

* [Databasebeheer](./database-introduction)
* [Data exporteren](./database-export)
* [Databasevelden](./database-fields)
* [Database selecties](./database-selections-introduction)
* [Database restricties](./database-restrictions)

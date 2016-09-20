Met Copernica kan je gemakkelijk en snel een bestand met relaties (of
andere gegevens) importeren naar een database. Ook is het mogelijk
bestaande gegevens bij te werken met behulp van een import
(synchronisatie).

1. Klaarzetten importbestand
----------------------------

Het importbestand bevindt zich op jouw computer, of is beschikbaar vanaf
een online locatie (FTP).

### Waar moet een importbestand aan voldoen?

Het importbestand bevat alle gegevens die je wilt importeren. Een
correct opgemaakt importbestand kan bijvoorbeeld met Excel worden
gemaakt en voldoet aan de volgende eisen:

-   Het bestand heeft een of meerdere rijen. Een rij bevat verschillende
    gegevens over een relatie (profiel), opgedeeld in meerdere velden.
-   Het bestand heeft één of meerdere kolommen. Iedere kolom bevat
    gelijksoortige informatie over alle relaties. Bijvoorbeeld de
    e-mailadressen.
-   De eerste rij bevat de kolomnamen. Deze hoeven niet perse overeen te
    komen met de databaseveldnamen in uw database. Deze kunnen straks
    bij het instellen van de import aan elkaar worden gekoppeld. De
    kolom waarin de e-mailadressen staan noem je bijvoorbeeld ‘email’.
-   Het is een tab-, komma-, of puntkommagescheiden .txt of .csv bestand

2. Uploaden van het importbestand
---------------------------------

![Database
importeren](../images/database-importeren.png "Database importeren")

Selecteer de database waarnaartoe je de gegevens wilt importeren. Kies
vervolgens voor Importeren / exporteren in het *Huidige* weergave menu.

Lokaliseer het bestand op je computer of voer de online locatie van het
bestand in. Kies voor de in het importbestand gebruikte scheidingsteken.

3. Koppelen van kolommen aan databasevelden
-------------------------------------------

Wanneer het bestand succesvol is geüpload verschijnt automatisch het
vervolgvenster. Dit dialoogvenster heeft 4 tabbladen. Bij een import
waarbij altijd nieuwe profielen moeten worden aangemaakt, is eigenlijk
alleen het eerste tabblad *Kolommen* van belang. Hier koppel je de
kolommen uit het importbestand koppelen aan de databasevelden.

-   Namen van kolommen die overeenkomen met veldnamen in de database,
    worden automatisch gekoppeld.
-   Gegevens uit kolommen die niet gekoppeld zijn, worden niet
    geïmporteerd.
-   Om een verkeerd gekoppelde kolom weer te ontkoppelen, druk je op
    **ontbind**

![Koppelen van kolommen aan
databasevelden](../images/velden-koppelen.png "Koppelen van kolommen aan databasevelden")

Ontbrekende databasevelden kunnen direct worden gecreëerd door op ‘zoek
of creëer veld’ te drukken. Standaard is een databaseveld van het type
Tekstveld. Kies vervolgens voor **eigenschappen** om het nieuw aan te
maken veld van de juiste instellingen te voorzien. Hier kan je instellen
dat in het veld bijvoorbeeld alleen numerieke waardes mogen worden
opgeslagen. De eigenschappen van de databasevelden kunnen uiteraard ook
op een later moment worden gewijzigd vanuit Databasebeheer.

In een **tekstveld** kunnen alle soorten waardes worden opgeslagen, dus
ook alfanumerieke, datums, Chinese tekens en wiskundige formules.

Let op, met deze tutorial maak je altijd nieuwe profielen aan. Wanneer
je bestaande gegevens uit je database wilt bijwerken met gegevens uit
het importbestand, maak je gebruik van sleutelvelden en nog enkele extra
instellingen.

Veel gestelde vragen
--------------------

Mocht je ergens tegenaanlopen tijdens het importeren, kijk dan even of
je vraag hieronder beantwoord is. Mocht dit niet het geval zijn, kan je
altijd contact opnemen met onze [hulpdiensten](./ondersteuning.md).

***Ik krijg bij het instellen van de veldeigenschappen een
'niet-passende data' waarschuwing.***\
 Een numeriek veld kan alleen numerieke waardes bevatten. Een datumveld
alleen datums, et cetera. Indien in het importbestand waardes aanwezig
zijn die onverenigbaar zijn met het gekozen type veld, zal deze
waarschuwing worden weergegeven.\
 De waarschuwing kan worden genegeerd. De waarde uit het importbestand
zal dan echter niet worden opgeslagen in de database. Indien je de
waarde toch wilt opslaan, kan je het databaseveld om te zetten naar het
type Tekstveld.

***Ik wil een reeds draaiende import afbreken. Kan dat?***\
 Nee. Als een import is gestart, kan deze niet meer worden geannuleerd.

***Het bestand is geïmporteerd, maar nu heb ik allemaal dubbele
profielen in mijn database***\
 Mogelijk heb je voor het verkeerde importtype gekozen. Raadpleeg het
artikel over het ontdubbelen van een database, verwijder vervolgens de
dubbele profielen en kies voor een nieuwe import met sleutelvelden,
waarmee bestaande profielen worden bijgewerkt.

***Ik heb het bestand geïmporteerd, maar de database lijkt wel leeg.
Alleen het veld ID is zichtbaar.***\
 Ga naar Databasebeheer \> Velden wijzigen. Klik op een veld, en vink de
optie 'Toon dit veld op overzichtspagina' aan. Het veld zal nu worden
getoond naast de kolom ID. Herhaal dit voor alle velden die je wilt
tonen op de overzichtspagina.

In dit artikel lees je de stappen die nodig zijn voor een import van
zowel profiel als subprofielgegevens.

In Copernica kunnen databases worden uitgebreid met een tweede niveau
met subgegevens. Dit noemen wij een collectie. Middels een collectie kun
je meerdere datasets koppelen aan één profiel. Bijvoorbeeld
een collectie **contactpersonen** bij een database met **bedrijven**.
Elke dataset binnen een collectie heet een **subprofiel**.

Een database kan meerdere collecties hebben. In dit voorbeeld gaan we
uit van één collectie.

Voordat je een database met collectie gaat importeren, moet in de
database een collectie beschikbaar zijn. Een nieuwe collectie maak je
aan bij Databasebeheer \> Databasevelden wijzigen
\> **Nieuwe collectie aanmaken**.

Stap 1 - Het importbestand voorbereiden en uploaden
---------------------------------------------------

Subprofielen zijn altijd gekoppeld aan een profiel. In uw importbestand
plaats je een profiel daarom op dezelfde regel als het profiel waartoe
deze behoort.

De naam van het veld in het importbestand kan door de applicatie direct
als collectieveld worden herkend als deze vooraf gaat door de naam van
de collectie gevolgd door een punt.

Veronderstel, je hebt een veld **voornaam** in
de collectie **contactpersonen**, dan wordt deze door de applicatie
automatisch als zijnde een veld behorende tot deze collectie herkend als
de column in het importbestand **contactpersonen.voornaam** is geheten.

![Excel bestand opslaan](Documentation/excel-bestand.png)

-   Sla de Excel map als tab gescheiden TXT of als CSV bestand op en
    upload het bestand naar Copernica.

Stap 2 - Kolommen linken en sleutelvelden kiezen
------------------------------------------------

Nadat je het importbestand hebt geüpload, belandt je automatisch in het
tabblad **Kolommen**.  Koppel hier de velden die je wilt importeren.
Wijs hierbij op zowel profiel als op subprofielniveau één of meerdere
sleutelvelden aan. 

**LET OP:** wanneer een subprofiel niet gekoppeld kan worden aan
een profiel, zal voor het subprofiel een nieuw profiel worden
aangemaakt. Wijs daarom altijd (minstens een) sleutelveld aan op
zowel profiel- als op subprofielniveau.

![Kolommen linken en sleutelvelden
kiezen](Documentation/import-dialog-tab1.png)

Stap 3 - Import instellingen
----------------------------

Nadat je de kolommen hebt gekoppeld, en de sleutelvelden hebt
aangewezen, kan je verder gaan met het instellen van de import.

-   Ga naar het tabblad **'Instellingen**'
-   Kies bij type voor ‘**zoek naar matches op basis van de
    sleutelvelden.**’

Hiermee geef je aan dat het systeem de importregels moet matchen aan de
gegevens in jouw database. Deze instelling dient te allen tijde te
worden gebruikt wanneer je subprofielen wilt koppelen aan profielen.

### Datumnotatie

Mocht je straks bij het starten van de import een melding krijgen over
onverenigbare datumvelden, [raadpleeg dan dit
artikel](http://beta.copernica.nl/index.php?pxc=113251&current=help&pxd=.p.help.article&article=examples.dataimport.normalimport&language=nl_NL&article=profiles.dialogs.import.dateformat "Date format").

### Notificatie

Indien gewenst kun je instellen dat er een e-mail notificatie moet
worden verstuurd zodra de import gereed is.

Stap 4 - Import starten
-----------------------

Wanneer alles is ingesteld, kan de import gestart worden. Het bestand
wordt dan direct geimporteerd. Let wel, dit kan afhankelijk van de
grootte van het importbestand enige tijd duren. Het dialoogvenster kan
je na het importeren sluiten. Dit heeft geen gevolgen voor het verloop
van de verdere import. 

Klik op *Start import* om de import te starten. 

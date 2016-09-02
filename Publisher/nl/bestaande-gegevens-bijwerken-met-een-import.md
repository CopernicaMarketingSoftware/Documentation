In deze handleiding lees je hoe je met een import zowel nieuwe profielen
kan aanmaken en bestaande profielen kan bijwerken met gegevens uit het
importbestand.

Let op, deze handleiding gaat uit van een bestaande database ZONDER
collectie(s).

-   Als je een normale import wilt uitvoeren in een nieuwe database,
    [raadpleeg dan dit
    artikel](https://www.copernica.com/nl/ondersteuning/database-maken-en-gegevens-importeren).
-   Als je een of meerdere collecties met subprofielen wilt importeren,
    [raadpleeg dan dit
    artikel](https://www.copernica.com/nl/ondersteuning/import-naar-database-met-collectie).

LET OP: Met behulp van deze importfunctionaliteit kan je in een klap de
gegevens van meerdere, zo niet alle, profielen in uw database wijzigen.
Deze actie kan niet worden ongedaan gemaakt. Er is daarom extra
voorzichtigheid geboden. Loop voordat je de import start alle
instellingen nog eens goed na. Oefen desnoods eerst op een kopie van de
database.

### Het instellen van de import

Het import dialoogvenster heeft 4 tabbladen.

![](importer5.png)

-   In het tabblad **Kolommen** koppel je de importkolommen aan de
    velden in de database.
-   In het tabblad **Instellingen** kan je de import verder
    configureren.
-   Als je **datums** importeert, dan kunnen deze in sommige gevallen
    automatisch worden omgezet naar het systeemformaat, dat wordt
    gebruikt in de software.
-   Kolomnamen in uw importbestand die overeenkomen met de namen van
    velden in uw database, worden automatisch aan elkaar gekoppeld. Deze
    kan je indien gewenst ontkoppelen door op **ontbind**te drukken.
-   Gegevens uit kolommen die niet gekoppeld zijn, worden niet
    geïmporteerd.

Eventueel ontbrekende databasevelden kunnen direct worden aangemaakt met
de functie zoek of creëer veld. Het databaseveld wordt dan bij het
importeren aangemaakt. Standaard is een databaseveld in van het type
**Tekstveld**. In een tekstveld kunnen alle soorten waardes worden
opgeslagen, dus ook alfanumerieke, datums, Chinese tekens en wiskundige
formules.

Kies vervolgens voor eigenschappen om het nieuw aan te maken veld van de
juiste instellingen te voorzien. Je kan hier bijvoorbeeld instellen dat
in het veld alleen numerieke waardes mogen worden opgeslagen. De
eigenschappen van de databasevelden kunt u uiteraard ook op een later
moment wijzigen vanuit Databasebeheer \> *Databasevelden wijzigen*.

### Kies de juiste sleutelvelden

Een import waarbij je bestaande gegevens overschrijft of nieuwe gegevens
toevoegt aan bestaande profielen, heeft sleutelvelden nodig. Met het
sleutelveld wordt een verband gelegd tussen het bestaande profiel en de
regels uit het importbestand.

Het sleutelveld dient een unieke waarde te bevatten, zodat één
importregel gekoppeld kan worden aan één profiel. Dit kan ook een
combinatie van sleutels zijn die elke regel uniek maken. Geschikte
sleutelvelden zijn bijvoorbeeld het profiel ID, een klantnummer of het
e-mailadres.

Je stelt zelf de sleutelvelden in. Je wordt door de applicatie
gewaarschuwd wanneer deze nog niet zijn ingesteld, of niet leiden tot
een unieke koppeling van gegevens.

In het onderstaande voorbeeld is het veld *ID* aangewezen als
sleutelveld.

![](importer5.png)

### Instellingen voor de import

Wanneer je de import nu zou starten, zouden alle importregels uit het
importbestand als nieuwe profielen worden geïmporteerd. Ga naar het
tabblad *Instellingen* om de applicatie te vertellen wat deze moet doen
wanneer op basis van de aangewezen sleutelvelden een overeenkomstig
profiel is gevonden.

![](importer6.png)

Kies bij type voor **‘zoek naar matches op basis van de sleutelvelden’**

Met deze importmethode wordt een verband gelegd tussen de importgegevens
en bestaande profielen in de database en kunnen bestaande profielen dus
worden bijgewerkt met nieuwe informatie.

Er verschijnen een aantal extra opties:

#### Gevonden (sub)profielen bijwerken met een maximum van [waarde] (sub)profielen

Wanneer je bestaande profielen gaat bijwerken door middels van een
import, kies je deze instelling.

Er kunnen op basis van een uniek sleutelveld toch meerdere matches
worden gevonden. Bijvoorbeeld als iemand zich twee keer met hetzelfde
(als sleutelveld gekozen) e-mailadres heeft aangemeld voor uw
nieuwsbrief. Met deze optie kan je bepalen of in dit geval ook alle
matchende profielen moeten worden bijgewerkt of dat alleen de eerst
gevonden match moet worden bijgewerkt. Meestal is het beter deze op
standaard ingevulde ‘1’ te houden. Het dubbele profiel met het laagste
ID wordt dan bijgewerkt.

#### Niet-matches aanmaken of negeren

Als er geen matchend profiel in de database voorkomt t.o.v. het
importbestand, dan kan je aangeven of de gegevens uit de import moeten
worden aangemaakt in de database, of dat deze moeten worden genegeerd.

#### Lege velden in importbestand overslaan, waarden in de database behouden

Als nuancering op het bijwerken van matchende profielen, kan je
instellen dat het importbestand geen gegevens mag overschrijven als het
importveld leeg is en het profiel juist wel gegevens bevat. Dan worden
gevulde datavelden dus niet leeggemaakt.

Import starten
--------------

Nadat je je instellingen hebt gecontroleerd, kan je de import starten.
Gebruik hiervoor de zogenoemde knop. De import zal direct beginnen.
Afhankelijk van de grootte van de import, kan het enige tijd duren
voordat het import voltooid is. Je kan onderstussen het venster sluiten.
Dit zal de import niet onderbreken.

 

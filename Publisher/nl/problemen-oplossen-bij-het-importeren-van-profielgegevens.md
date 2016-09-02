Op deze pagina vind je oplossingen en antwoorden voor de meest
voorkomende problemen en vragen bij het importeren van profielgegevens.

### Waar vind ik de importeer functie?

Het importeren dialoogvenster kun je vinden onder Profielen\> Huidige
weergave\> **Gegevens importeren en exporteren**. In het dialoogvenster
dat verschijnt, klik je op **Import**.

### Ik heb een nieuw bestand geïmporteerd en nu heb ik dubbele gegevens in mijn database

Je bent misschien vergeten om belangrijke velden voor de import in te
stellen. Deze hoofdvelden van het import bestand moeten overeenkomen met
de de hoofdvelden van de database. Doet je dit niet dan ziet de database
dit als nieuwe informatie en worden de gegevens niet overgeschreven.

### Nadat ik een bestand heb geïmporteerd, is er een nieuwe database (profiel) aangemaakt voor elk geïmporteerd subprofiel

Dit is hetzelfde verhaal, als je de subprofielen wilt updaten zal je de
hoofdvelden op beide plekken (de import file en de database) moeten
laten coresponderen.

### Ik heb een bestand naar een nieuwe database geïmporteerd. Dit ging helemaal goed, maar na het importeren lijkt de database helemaal leeg, er is maar één veld namelijk **ID**.

De gegevens zijn geïmporteerd, maar de velden worden in het overzicht
nog niet getoond. Om de velden zichtbaar te maken, ga je naar
Databasebeheer\> **Databasevelden wijzigen...**. Klik op een veld om de
eigenschappen te bewerken en vink de optie 'Toon dit gebied op de
overzichtspagina' aan. Herhaal dit voor elk veld dat u wilt zien.

### Help! Ik ben het verkeerde bestand aan het importeren of ik gebruik onjuiste instellingen. Kan ik het importeren nog annuleren?

Nee, als je eenmaal hebt geklikt op 'Start import' kan het proces helaas
niet worden gestopt. Natuurlijk kun je de verkeerde invoer ongedaan
maken door achteraf een (mini) selectie te creëren. Gebruik het
selectietype **Controleren op veranderingen**, selecteer de periode
waarin de verkeerde invoer zich heeft voorgedaan en verwijder de
verkeerd ingevoerde gegevens via Huidige weergave\> **Meerdere
(sub)profielen wijzigen/verwijderen...**. Dit is alleen mogelijk voor
profielen en subprofielen die aan de database zijn toegevoegd tijdens de
verkeerde import. Als er een grote hoeveelheid profielen zijn bijgewerkt
kun je het beste het punt hieronder bekijken.

### Kan ik de database terugzetten naar de situatie voor de verkeerde import?

Nee, dit is niet mogelijk. Je kunt alleen per profiel de gegevens
terugzetten. Deze optie is te vinden in het tabblad geschiedenis van het
desbetreffende profiel. Dit is natuurlijk geen goede oplossing als er
tientallen profielen of meer werden veranderd door de verkeerde invoer.
Als je dit dan in één keer wilt terugdraaien kun je een e-mail sturen
naar [support@copernica.com](mailto:support@copernica.com). Het
terugzetten van database gegevens kost € 125,-.

### Mijn importbestand heeft X aantal regels, maar alleen Y / meer dan X regels worden geïmporteerd

Dit kan verschillende oorzaken hebben:

-   Je gebruikt sleutelvelden om de regels te synchroniseren, maar een
    aantal regels heeft dezelfde waarde als het sleutelveld. Resultaat:
    deze regels worden overschreven. Gebruik meer unieke sleutelvelden
    om ook deze regels te laten toevoegen.
-   Het kan ook te maken hebben met speciale karakters in je import
    bestand. Onze software gebruikt de UTF-8-codering standaard. Als het
    importbestand een verschillende codering heeft, kun je het bestand
    converteren naar de UTF-8-codering en opnieuw proberen om het
    bestand te importeren.
-   Het importbestand heeft tabs, komma's of puntkomma's niet goed
    gebruikt als scheidingsteken, en dit wordt door de software verkeerd
    geïnterpreteerd. Je kunt dit eenvoudig controleren door het bestand
    te openen in een fatsoenlijke teksteditor (bijvoorbeeld Notepad ++).
    In het importbestand, tel het aantal kolommen en het aantal rijen en
    vermenigvuldigt deze twee getallen. Gebruik de zoekfunctie (Ctrl-F)
    om het aantal scheidingstekens te doorzoeken. Gebruik bijvoorbeeld
    '\\t' om tabs te zoeken, zorg ervoor dat uitgebreid zoeken is
    ingeschakeld. Indien het aantal tabbladen hoger of lager is dan het
    aantal rijen en kolommen vermenigvuldigd, bevat het bestand fouten.
    Open het bestand in excel en sla het opnieuw op als een tabs
    gescheiden tekstbestand. Probeer misschien een ander scheidingsteken
    te gebruiken zoals een komma of een puntkomma en importeer opnieuw.
-   Als het bestand is geëxporteerd vanuit een ander softwarepakket kun
    je een nieuwe export aanmaken waar je elk veld met dubbele
    aanhalingstekens aangeeft (indien deze optie beschikbaar is).
-   In een importbestand moet de eerste rij altijd de naam van de
    kolommen bevatten. Bijvoorbeeld de kolom met e-mailadressen wordt
    'e-mail' genoemd. Als de kolomnaam overeenkomt met het sleutelveld
    van de database, wordt deze informatie automatisch gekoppeld. Als de
    velden niet overeenkomen bijvoorbeeld bij e-mailadres i.p.v. e-mail,
    kan dit ook handmatig worden gekoppeld met de importeerfunctie.
    Zelfs als je geen kolomnamen gebruikt in je bestand kun je nog
    steeds de regels aan je database koppelen. Let wel op dat de eerste
    regel in het importbestand niet zal worden geïmporteerd omdat het
    wordt gebruikt als referentieveld.

### Hoe lang duurt het voordat een import begint of is voltooid?

De import zal zo snel mogelijk starten. Het kan wel zo zijn dat de
server dan al bezet is, waardoor het wat langer duurt voordat het proces
start. Hoe lang het duurt om het proces te voltooien is afhankelijk van
de grootte van het ingevoerde bestand en het type import dat wordt
uitgevoerd. Synchroniseren van gegevens duurt langer dan het importeren
van alleen nieuwe gegevens. Grote imports kosten uiteraard meer tijd dan
kleine imports.

### Het lijkt erop dat de import niet begint. Zit deze vast?

Zie het punt hierboven. Onze servers zijn waarschijnlijk druk bezig. Als
het probleem aanhoudt is het raadzaam om contact op te nemen met onze
support afdeling.

### Kan ik meerdere notificatie mails sturen wanneer de import voltooid is?

Ja, vul de verschillende e-mailadressen in gescheiden door een komma.

### Ik heb een import gepland, maar deze is nog niet gestart

Dit kan verschillende oorzaken hebben. Een manier om hier achter te
komen is om de account fouten te bekijken. Dit is te vinden in het
administratie gedeelte van de marketing software.

-   Heeft u een geldige bestand locatie ingevoerd?
-   De locatie van het bestand kan gewijzigd zijn. Controleer of het is
    er nog steeds staat.
-   Als je een FTP-locatie gebruikt, zorg er dan voor dat de import
    functie toegang heeft tot de bestandslocatie.
-   Controleer of de kolomnamen nog steeds hetzelfde zijn. Als ze niet
    overeenkomen, kan het bestand niet goed worden geïmporteerd,
    bijvoorbeeld als er tekst staat in een numeriekveld.
-   Controleer of het bestand gegevens bevat. Als het leeg is, zal de
    import niet starten.

### Ik heb geldige data in mijn importbestand, maar de import functie waarschuwt me voor ongeldige data

De software maakt gebruik van MySQL veldtypes om gegevens op te slaan.
MySQL geeft datum waarden in het 'YYYY-MM-DD' formaat. Het ondersteunde
bereik is '1000-01-01' t/m '9999-12-31'. Als het importbestand waarden
buiten dit bereik bevat, of op een andere manier geformatteerd is, zal
de import functie een waarschuwing geven wanneer je de import start. Als
de data in het importbestand een andere indeling heeft, kan de import
functie deze transformeren naar de normale database-indeling. Je kunt
ook een normaal tekstveld gebruiken om de data in op te slaan.

[Lees meer over het omzetten van de
datumnotatie](http://www.copernica.com/nl/ondersteuning/datums-importeren-omzetten-van-de-datumnotatie)

### Wat gebeurt er als ik de ongeldige datum waarschuwing negeer?

Waarden uit uw import bestand die niet worden herkend als data worden
ook niet geïmporteerd. Na de invoer zal deze waarde leeg blijven of de
waarde 0000-00-00 wordt opgeslagen als het databaseveld niet leeg mag
zijn.

### Ik heb numerieke waarden met decimalen in mijn importbestand (bijv. 5,44 of 0,66). Wanneer ik probeer om deze kolom te importeren, krijg ik een waarschuwing dat de kolom niet-ondersteunde waarden bevat

In de software worden decimalen niet ondersteund voor numerieke velden.
Als je deze toch wilt gebruiken, kun je het beste voor een **tekstveld**
kiezen. Als er een verbinding is met de software via onze SOAP API kun
je het type veld 'float' gebruiken om decimalen op te slaan in een
numeriek veld. Let wel op dat een door SOAP API ingevoerd nummer met
decimaal niet kan worden bewerkt op een later moment in de
gebruikersinterface.

### Is het mogelijk om te zien welke regels tijdens een import gewijzigd zijn?

Er is geen dergelijke functie beschikbaar in de marketing software, maar
er is een andere oplossing. Maak een selectie met de conditie
'Controleer op veranderingen'. Kies het type verandering (bv. Elke
wijziging van een profiel of subprofiel) en selecteer een tijdsperiode
waarin de verandering moet hebben plaatsgevonden (bijvoorbeeld, vanaf nu
tot één uur geleden). Wanneer de import is voltooid, zal deze selectie
vertellen welke profielen of subprofielen zijn bijgewerkt.

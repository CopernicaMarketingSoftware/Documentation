Om ervoor te zorgen dat iedereen optimaal gebruik kan maken van
Copernica Marketing Software, hanteren wij een fair use policy. Dit
houdt in dat gebruikers niet voor excessief en onnodig dataverkeer mogen
zorgen. Bij herhaalde schending van deze fair use policy houdt Copernica
BV zich het recht voor de in overtreding zijnde gebruiker de toegang tot
zijn of haar account te ontzeggen. \
\
 Door excessief dataverkeer te generen zorg je voor een onnodige
belasting op onze servers. Hierdoor zorg je niet alleen voor een
verminderde prestatie van je eigen account, maar ook voor een slechtere
performance voor al onze gebruikers. We vragen je daarom verantwoord om
te gaan met onze software. \
\
 Om je hierbij te ondersteunen is er een aantal richtlijnen:

Backups & kopieën zijn overbodig
--------------------------------

Copernica maakt backups van alle databases. Sla dus geen databasebackups
en/of -kopieën op in je Copernica-account. Dit zorgt voor onnodige
dataopslag.

Verwijder overbodige data
-------------------------

Om de prestaties van je eigen account te verhogen, en de belasting op
onze servers te verminderen, verzoeken we je geen overbodige informatie
in je account op te slaan en je database(s) regelmatig op te schonen.
Een aantal tips:

-   Verwijder selecties die je niet gebruikt (je hebt altijd weer de
    mogelijkheid deze opnieuw aan te maken. Bij het verwijderen van
    selecties gaan er geen databasegegevens verloren)
-   Verwijder dubbele databases
-   Verwijder databases die je niet meer gebruikt
-   Verwijder verouderde informatie uit databases

Maak geen onnodige exports
--------------------------

Exporteer alleen data indien dit echt nodig is. Een dagelijkse export
draaien is bijvoorbeeld weinig zinvol als er maar een keer in de week
veranderingen plaatsvinden in je database.

We verzoeken om grote im- en exports in te roosteren buiten
kantoortijden.

Verbeter je imports
-------------------

Bij het importeren van gegevens hoef je niet je gehele database te
overschrijven, je kunt de velden die zijn gewijzigd en/of toegevoegd
bijwerken:

-   Ga in Copernica naar 'Profielen'
-   Selecteer onder ‘Huidige weergave’ ‘Gegevens importeren/exporteren’
-   Kies 'Import'
-   Geef de locatie van het bestand dat je wilt importeren
-   Ga naar de tab ‘Instelling’
-   Kies bij ‘Type’ ‘zoek naar matches op basis van sleutelvelden’
-   Selecteer bij ‘Matches’ ‘gevonden (sub)profielen bijwerken’
-   Kies bij ‘Niet-matches’ voor ‘ontbrekende subprofielen aanmaken’
-   Start je import

Overigens is het nog makkelijker om het synchroniseren automatisch te
laten verlopen door gebruik te maken van onze [SOAP
API](http://www.copernica.com/nl/ondersteuning/soap-api-documentatie).

We verzoeken om grote im- en exports in te roosteren voor buiten
kantoortijden.

Selecties op basis van ongeldige e-mailadressen
-----------------------------------------------

In het belang van je
[deliverability](http://www.copernica.com/nl/over-ons/nieuws/deliverability-hogere-e-mailaflevering-met-copernica)is
het essentieel dat je ongeldige e-mailadressen die bounces opleveren
geen e-mailings meer stuurt.

Dit kun je instellen door een selectieregel toe te passen die kijkt of
een profiel in het verleden een foutmelding heeft veroorzaakt. Dit is
echter een niet aan te raden methode.

Hetzelfde resultaat kan met veel minder belasting ook bereikt worden
door het instellen van een opvolgactie. Met een opvolgactie in een
document geef je de opdracht om bij een type foutmelding de waarde van
een veld in het profiel aan te passen.

Vervolgens kun je een selectie maken waarin je profielen met een
bepaalde waarde in een veld uitzondert. Een selectie op een veldwaarde
is namelijk veel minder zwaar dan een selectie op basis van een
resultaat uit het verleden.

[Lees meer over
opvolgacties](http://www.copernica.com/nl/over-ons/nieuws/opvolgacties-de-sleutel-tot-succes)

Selecties verfijnen
-------------------

Stel dat je een database hebt met dagbladabonnees. Daarin heb je een
selectie aangemaakt waar iedereen met een halfjaarabonnement staat. Nu
wil je de abonnees van wie het abonnement afloopt een mail sturen met
een aanbieding hun abonnement te verlengen.

**De verkeerde manier**\
Je kunt dat doen door een subselectie aan te maken onder de selectie
‘halfjaarabonnees’ met als aanvullend criterium : iedereen van wie het
abonnement vijf maanden geleden aanving. \
\
Dit is een niet aan te raden methode. Om een mail te versturen aan deze
profielen moeten namelijk twee selecties worden opgebouwd: die van de
halfjaarabonnees en vervolgens die van wie het abonnement vijf maanden
geleden inging.

**De juiste manier**\
Een efficiëntere manier is door een nieuwe selectie aan te maken met
twee criteria:

-   Profielen bij wie de waarde van het databaseveld
    ‘halfjaarabonnement’ op ja staat.
-   Profielen bij wie de ingangsdatum op vijf maanden geleden ligt. 

Omdat je in dit geval geen gebruik maakt van subselecties, hoeft er bij
het verzenden op deze manier maar één selectie te worden opgebouwd.

Indexeren van velden
--------------------

Zorg ervoor dat alle velden die je aanroept in selecties geïndexeerd
zijn. Het indexeren van velden versnelt het zoeken binnen je database en
het opbouwen van selecties en miniselecties. Bovendien zorgt het voor
minder belasting op onze servers.

Een veld indexeren kan als volgt:

-   Log in op Copernica en ga naar ‘Profielen’
-   Selecteer de database waarvan je velden wil indexeren
-   Klik op ‘Databasebeheer’ -\> ‘Databasevelden wijzigen’
-   Selecteer het veld dat je wilt indexeren
-   Vink ‘Dit veld wordt geïndexeerd’ aan
-   Klik op ‘opslaan’

**Let op:** je kunt maximaal 64 velden indexeren. Het is niet mogelijk
om grote velden (tekstvelden die een groot aantal tekens kunnen
bevatten) te indexeren.

[Lees meer over
databasevelden](http://www.copernica.com/nl/functies/profielen/maak-je-eigen-database)

Trage statistieken?
-------------------

Verzend jij op regelmatige basis grote e-mailings en merk je dat het
langer duurt tot je statistieken beschikbaar zijn? Neem dan contact op
met onze
[supportafdeling](http://www.copernica.com/nl/ondersteuning/telefonische-helpdesk).
Onze medewerkers helpen je dan je database op te schonen door de
emaildestinationtabel te herordenen. Hierdoor verdwijnen verouderde
statistieken en is je account weer een stuk sneller.

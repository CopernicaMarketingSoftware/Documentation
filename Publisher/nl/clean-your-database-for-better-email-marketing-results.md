# Haal een bezem door de verzendlijst

Een goede verzendlijst voor je email marketing draagt bij aan je
deliverability en heeft een positief effect op je email marketing
resultaten. Vandaar dat het belangrijk is dat je regelmatig de bezem
door je verzendlijst haalt. Zo heeft het blijven sturen van e-mails naar
personen die deze toch niet meer openen of naar niet bestaande
e-mailadressen een negatieve invloed op je e-mailreputatie. Gelukkig
heeft Copernica verschillende mogelijkheden om je verzendlijst
grotendeels automatisch te optimaliseren.

Een standaard selectie indeling voor een optimale email verzendlijst
--------------------------------------------------------------------

Veel van onze gebruikers hanteren een standaard selectie indeling voor
hun databasebeheer. Daarmee halen ze automatisch alle foutieve en
dubbele e-mailadressen, bounces en uitschrijvingen uit hun
verzendselectie. In de afbeelding zie je een voorbeeld van een
standaardselectie.

![Standaard selectie opbouw email
marketing](../images/databasebeheer.png "Standaard selectie opbouw email marketing")

Om deze selectieboom te maken, maken we eerst de selecties aan voor het
Databasebeheer.

N.b. Bedenk goed in hoeverre de onderstaande waardes voor jou van
toepassing zijn en pas ze indien nodig aan je eigen strategie aan. Bij
bijvoorbeeld dagelijkse mailingen kunnen sommige waarden in het geval
van de soft bounces en inactieve te agressief zijn.

Maak een nieuwe selectie aan met de naam A\_Databasebeheer. Als
selectieconditie geef je mee dat de waarde van het veld ID groter is dan
de waarde 0. Op deze manier laat je alle profielen onder deze selectie
vallen. Selecteer de optie ‘Deze conditie tijdelijk uitschakelen’ om er
voor te zorgen dat deze selectie niet nutteloos aan het opbouwen is. We
laten de komende selecties hier steeds onder vallen.

Maak een nieuwe selectie aan met de naam A\_Bounces en laat deze vallen
onder de selectie A\_Databasebeheer. Deze geef je de volgende twee
‘of’-condities mee.

-   Check op resultaten e-mailcampagnes waarbij je aangeeft dat deze de
    profielen moet selecteren waar een mailing naar is verstuurd met als
    vanaf datum de dag waarop je de eerste mailing hebt verstuurd. Als
    ‘verstuurd voor’-datum geef je de variabele datum ‘1 dag in de
    toekomst’ waarbij je afrondt op hele dagen. Als resultaat geef je
    aan “Er moet een foutmelding zijn geregistreerd” met als soort fout
    “Anders namelijk: fout die bij een volgende verzending mogelijk weer
    optreedt”. Je vindt deze optie helemaal onderaan de lijst. Met deze
    optie filter je alle e-mailadressen eruit waarbij je e-mail
    gegarandeerd niet aankomt omdat bijvoorbeeld het e-mailadres niet
    (meer) bestaat. Laat bij berichten de optie op ‘meer dan 0
    berichten’ staan.
-   Volg bij een nieuwe ‘of’-conditie de voorgaande stappen opnieuw uit
    maar kies nu de optie "Elke foutmelding”. Vul vervolgens bij
    berichten “Meer dan 7 berichten” in. Je mag er namelijk vanuit gaan
    dat bij zeven keer een fout dat ook wel bij een achtste mail
    gebeurt.

Maak een nieuwe selectie met de naam ‘B\_Foutiefemailadres’ en laat als
conditie deze controleren op het veld email (of vergelijkbaar) met als
vergelijking ‘bevat een e-mailadres’. Zet deze conditie op ‘OF NIET’
waardoor je de conditie omdraait. Oftewel, met deze selectie selecteer
je alle profielen die NIET over een correct opgemaakt e-mailadres
beschikken (niet voldoen aan de syntax dat een e-mail adres een @ en een
zogeheten top level domain beschikt zoals .com, .net of .nl).

Maak een selectie aan met de naam C\_Dubbeleprofielen onder de selectie
A\_Databasemanagement. Selecteer op ‘Check op dubbele of unieke
profielen’ en geef aan dat je wilt selecteren op alle dubbele profielen
met als uniek veld het e-mailadres.

Maak een selectie aan met de naam D\_Uitschrijvingen en laat deze alle
profielen selecteren die zich hebben uitgeschreven. Bijvoorbeeld
‘selecteer alle profielen waarbij het veld ‘nieuwsbrief’ op ‘Nee’
staat’.

Tot slot, maak een selectie aan met de naam E\_Inactief. Kies bij de
conditie voor ‘Check op resultaten e-mailcampagnes’. Geef aan dat deze
de profielen moet selecteren waar een mailing naar is verstuurd met als
vanaf datum een variabele datum van 1 jaar geleden. Bij ‘verstuurd voor’
kies je als variabele datum 1 dag in de toekomst en rond deze af op
‘dagen’. Geef als resultaat op "Er mag geen terugkoppeling geregistreerd
zijn". Geef op dat dit bij meer dan zes mailingen het geval moet zijn.
Je hebt nu alle profielen geselecteerd die in het afgelopen jaar meer
dan zes mailings niet hebben geopend of niet op een link in de mailing
hebben geklikt. Schrijf deze semi-automatisch uit van je mailingen. Klik
hiervoor eens in de zes maanden deze selectie aan, klik op 'huidige
weergave' en vervolgens op meerdere profielen wijzigen. Geef het veld
aan dat je wilt wijzigen (bijvoorbeeld 'nieuwsbrief') en geef aan naar
welke waarde je dit veld wilt aanpassen (bijvoorbeeld 'nee'). Geen
terugkoppeling moet je namelijk accepteren als een uitschrijving.
Daarnaast voorkom je dat je mailt naar [een
spamtrap](http://education.returnpath.com/questions/spam-traps-full-content-page/ "Spam Trap Best Practices").

Hoewel Copernica automatisch indieners van een spamklacht uitschrijft
als je dit [juist hebt
ingesteld](https://www.copernica.com/nl/blog/uitschrijfgedrag-instellen-op-database-of-collectie "Uitschrijfgedrag instellen op database of collectie"),
is het advies om ook een selectie te maken van de klagers. Deze selectie
kan jou namelijk informatie geven of je wel op een juiste manier je
opt-ins hebt gegenereerd of dat je jouw inschrijvers op een gemakkelijke
wijze de mogelijkheid biedt om zich uit te schrijven. Maak daarvoor
eenzelfde selectie aan als bij A\_Bounces met de naam F\_Klachten. Kies
vervolgens bij de optie resultaat voor "Er moet een spamklacht ontvangen
zijn". De datum hou je gelijk aan A\_Bounces.

Maak een verzendselectie aan voor email marketing campagnes
-----------------------------------------------------------

Je hebt nu je selecties voor automatisch databasemanagement aangemaakt.
Tijd om ze in gebruik te nemen! Dat doe je door een hoofdselectie aan te
maken die automatisch alle e-mailadressen die aan de bovenstaande
condities voldoet uit je verzendselecties haalt. In het bovenstaande
voorbeeld hebben we bijvoorbeeld een nieuwsbriefselectie en een selectie
voor het verzenden van een verjaardagcampagne. Volg de volgende stappen
uit.

Maak een nieuwe selectie aan met de naam ‘B\_Verzendselectie’ en als
condities:

-   ‘Check inhoud andere selecties’ en vervolgens de selectie
    A\_Bounces. Geef bij conditie aan ‘Alle profielen niet in
    bovenstaande selectie’
-   Doe dat vervolgens ook bij de andere vijf selecties uit
    databasemanagement. Zorg ervoor dat iedere selectie onder dezelfde
    'OF' conditie valt.

Onder deze selectie hang je vervolgens al je selecties waar je naar toe
wilt verzenden. Bijvoorbeeld je nieuwsbriefselectie.

Doordat je nieuwsbriefselectie onder je verzendselectie hangt, voldoen
alle profielen in deze selectie automatisch aan de condities van je
verzendselectie. Daarmee heb je altijd een ontdubbelde verzendselectie
met werkende e-mailadressen die geïnteresseerd zijn in jouw
e-mailmarketingcampagnes.

Hou je e-mailmarketingstatistieken in de gaten
----------------------------------------------

Het aanmaken van deze verzendselectie zal bij de eerstkomende verzending
drie resultaten hebben:

-   Je campagnes worden naar minder adressen gestuurd;
-   De campagnes hebben een lager foutpercentage;
-   Je campagnes hebben een hogere opening- en klikratio.

Dat de eerstvolgende mailing naar minder adressen wordt verstuurd is dus
absoluut geen nadeel. Sterker nog, je hebt nu een kwalitatief betere
verzendlijst waardoor je ook beter kunt testen in waar je doelgroep in
geïnteresseerd is.\
\
 Het database-management houdt hier overigens niet bij op. Het is
namelijk altijd van belang om je e-mailmarketingstatistieken in de gaten
te houden.

-   Kijk naar je foutpercentage. Het advies is om deze onder de 2% of
    zelfs 1% te houden. Hoe lager hoe beter in verband met je
    deliverability.
-   Kijk naar je opening- en klikpercentages. Lopen deze af? Bekijk dan
    wat je kan doen om je campagnes interessanter te maken. Om je
    openingspercentage te verbeteren experimenteer je met de
    onderwerpregel en de preheader. Voor je klikratio bekijk je of
    gebruik maakt van de juiste call-to-actions en of men ook met de
    mobiele telefoon op je links goed kunnen klikken.

Ik ben benieuwd wat het opschonen van je e-mailverzendlijst jou heeft
opgeleverd. Stuur me [een email](mailto:ralph@copernica.com) met je
resultaten.

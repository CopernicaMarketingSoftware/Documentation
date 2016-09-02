Webformulieren zijn opgebouwd uit velden. Om een veld toe te voegen,
klik je bij het webformulier op **Veld toevoegen**. Een webformulierveld
is altijd gekoppeld aan een database- of collectieveld.

![](Documentation/formuliervelden.png)

Type veld kiezen
----------------

Bij het aanmaken van een nieuw webformulier veld kan je kiezen uit vier
verschillende type velden.

![](Documentation/selecteerveldtype.png)

### Normaal veld

Een normaal veld is gekoppeld aan een veld in de database of collectie.
Een normaal veld heeft diverse opties. Deze opties worden verderop in
dit artikel toegelicht.

### Interesseveld

In een webformulier is het mogelijk om een interesseveld toe te voegen.
Dit veld kan alleen maar worden aan- of uitgevinkt, waarme een ja/nee
waarde wordt toegekend door de invuller. Een interesseveld is altijd
gekoppeld aan een interesse uit de database.

### Tekstblok

Gebruik het tekstblok als je extra tekst of een afbeelding wilt
toevoegen tussen de invulvelden.

### Uploadveld

De invuller kan via het webformulier een bestand toevoegen aan
zijn profiel. Onder Profielen vindt je bij elk profiel een tabblad
'bestanden', waarin je ook de geuploade bestanden zult vinden.

Veld verwijderen
----------------

Om een veld te verwijderen, selecteer je eerst het veld. Kies vervolgens
**Verwijderen** in het webformulier menu.

Veld verplaatsen
----------------

De velden uit een webformulier kun je onderling van plek wisselen.
Hiertoe vind je een optie bij het menu **Webformulier** en onder in
beeld wanneer je het formulier hebt geselecteerd.

Selecteer het te verplaatsen veld. Kies op welke positie je het veld
wilt hebben. Positie 1 is helemaal bovenin het formulier.

Webformulierveld opties
-----------------------

![](Documentation/formulierveldopties.png)

### Label

Voer de tekst in zoals de lezer die ziet bij het invullen van het
formulier. Bijvoorbeeld 'organisatie', 'voornaam' of 'mobiel nummer'.

#### verplicht

Maak het veld verplicht als het formulier niet ingezonden mag worden
zonder dat in dit veld een waarde is ingevuld. 

#### sleutelveld

Een sleutelveld wordt gebruikt om te kijken of de invuller van het
formulier reeds bestaat in de gekoppelde database. Je kunt per
webformulier meerdere sleutelvelden aanwijzen. Een bestaand profiel
wordt dan alleen bijgewerkt wanneer het aan alle sleutelvelden voldoet.
Bijvoorbeeld als zowel iemands e-mailadres als zijn achternaam
overeenkomen met een bestaand profiel.

Dit geldt voor formulieren waarbij de instelling '[controleer op
sleutelvelden](http://www.copernica.com/nl/ondersteuning/de-werking-van-een-webformulier-instellen)'
geactiveerd is. Bij inlogformulieren moeten inlognaam en wachtwoord
altijd als sleutelvelden worden aangemerkt.

#### hoofdletter gevoelig

Met name bij velden met een wachtwoord is het verstandig om in te
stellen dat een veld hoofdlettergevoelig is, standaard wordt hier door
de software namelijk niet op gelet.

#### waarde uit de database

Vink deze optie aan bij formulieren gericht aan bekende relaties, om hun
gegevens alvast vooringevuld te tonen wanneer zij op het formulier
landen. Bijvoorbeeld wanneer zij klikken vanuit een e-mail kunnen alle
bekende gegevens vast ingevuld worden, om hen moeite te besparen.

### Type velden

Kies wat voor invoerveld getoond moet worden:

#### Tekst

Een regulier invulveld waar men vrij kan typen

#### Wachtwoord

Een tekstveld waarbij sterren in plaats van de getypte tekst wordt
getoond.

#### Herhaal wachtwoord

Hiermee worden direct 2 velden aangemaakt: 1 voor het wachtwoord, 1
waarin het wachtwoord herhaald moet worden. Deze worden tegen elkaar
gecontroleerd of ze gelijk zijn voordat het formulier verzonden kan
worden.

#### E-mail adres

Gebruik deze veldinstelling zodat het e-mailadres bij verzending wordt
gecontroleerd op geldigheid.

#### Uitschuifkeuzelijst

Een veld waarbij meerdere antwoordmogelijkheden worden geboden via een
menu dat 'uitschuift'.

Het is mogelijk in de uitschuifkeuzelijst andere waardes te tonen dan de
waardes die je wegschrijft naar de database. Veronderstel dat je
bezoekers met het webformulier een film laat waarderen door middel van
een 5-punt schaal met de waardes 'Schitterend' tot 'Verchrikkelijk' en
je wilt de waardes 1 tot 5 opslaan in de database, plaats dan 2 dubbele
punten (::) tussen de twee waardes bij de standaard waarde van het
webformulier. Dit doet je alsvolgt:

![](Documentation/meerkeuzeveld.png)

#### Keuzerondjes (radio buttons)

Een veld waarbij meerdere antwoordmogelijkheden worden geboden via een
overzicht met rondjes ervoor, waarvan men er een aanklikt. Dit type veld
is ook bekend als radiobutton.

#### Selectievakje (checkbox)

Een veld waarbij een enkele optie wordt geboden. Wanneer de invuller het
veld aanvinkt, wordt de standaardwaarde naar het gekoppelde database of
collectieveld weggeschreven. Ook bij dit veld kan je doormiddel van twee
dubbele punten (::) andere waardes tonen.

#### Getal

De ingevulde waarde mag uitsluitend uit getallen bestaan.

#### Datum

De ingevulde waarde wordt door de database verwerkt als een datum. Let
hierbij op dat je aangeeft in welke notatie de invuller dit moet doen
(jjjj-mm-dd).

#### Datum als uitschuifkeuzelijsten

De invuller krijgt een kalender te zien waarmee hij een datum kan
kiezen. Zelf intypen is niet mogelijk.

#### Onzichtbaar

Het veld wordt opgenomen in het formulier, maar niet getoond aan de
invuller. Hij kan dus niet zelf de waarde veranderen.

Standaardwaarde van een formulierveld
-------------------------------------

Geef eventueel een standaardtekst aan waarmee het invulveld getoond moet
worden. Bijvoorbeeld 'vul hier uw naam in' of 'plaats hier uw
opmerkingen'. Je mag dit veld ook leeg laten. Of gebruik het om
meerkeuze-opties te bieden aan de invuller in plaats van vrije tekst. In
combinatie met het type veld 'uitschuifkeuzelijst' of 'selectierondjes'
plaats je hier, gescheiden met enters, de antwoordkeuzes.

Voeg een asterisk (\*) toe aan een keuze als deze alvast aangevinkt moet
zijn bij het tonen van het lege formulier.

Werking formulier wijzigen
--------------------------

Nadat je de webformuliervelden hebt toegevoegd, is het formulier nog
niet functioneel. Om te bepalen wat met de ingevoerde gegevens moet
gebeuren, stel je in bij de
[formulierinstellingen](http://www.copernica.com/nl/ondersteuning/de-werking-van-een-webformulier-instellen).

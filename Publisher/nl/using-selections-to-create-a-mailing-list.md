Een nieuwsbrief of commerciële uiting verstuur je nooit naar alle
contacten uit een database tegelijk. Je maakt in je database onderscheid
tussen personen die de nieuwsbrief willen ontvangen, en personen die
deze niet willen ontvangen, of zich in de tussentijd hebben
uitgeschreven van de nieuwsbrief. Voor het maken van dit onderscheid
gebruik je selecties.

### De nieuwsbriefselectie maken

Voor een nieuwsbriefselectie beschik je over een *databaseveld* waarin
de nieuwsbriefvoorkeur van je relaties is opgeslagen. Bijvoorbeeld een
databaseveld dat *Nieuwsbrief*heet van het type *meerkeuze*die de twee
waarden ‘*ja*’ en ‘*nee*’ kan bevatten. Om de selectie te maken
selecteer je eerst de database door in het rechteroverzicht op de naam
te klikken.

-   Ga vervolgens naar *Databasebeheer \>***Selecties beheren**om naar
    selectiebeheer te gaan.

In het dialoogvenster tref je de lijst met bestaande selecties,
aanwezige collecties en miniselecties aan. Als je nog nooit een selectie
hebt gemaakt, is het venster waarschijnlijk leeg.

### Nieuwe selectie aanmaken

Klik op *Selectie aanmaken* linksonder in het dialoogvenster om de
eerste selectie aan te maken. Geef de selectie een duidelijke naam
(bijvoorbeeld *nieuwsbrief\_ontvangen*) en eventueel een beschrijving.
Klik vervolgens op *opslaan*.

Je beschikt nu over een lege selectie. Om in de selectie alleen personen
op te nemen die een nieuwsbrief willen ontvangen maak je een *nieuwe
conditie*binnen de selectie.

-   Om een nieuwe conditie aan te maken binnen de bestaande selectie
    klik je op ‘Voeg een nieuwe '**EN' conditie toe aan een nieuwe 'OF'
    regel**

Er verschijnt een nieuw venster met hierin een lijst van beschikbare
conditietypes. Standaard staat deze op *Check op veldwaarde*. Dit
conditietype gaan we gebruiken voor de nieuwsbriefselectie.

-   Klik op *Verder*om de conditie aan te maken en te bewerken.

Met de selectieconditie *Check op veldwaarde*kijk je -zoals de naam al
doet vermoeden- of een profiel voldoet aan de conditie op basis van de
waarde in een veld. Voor de nieuwsbriefselectie beschik je in je
database over een databaseveld dat de waardes *ja*of *nee*kan
beschikken.

-   Selecteer bij *veld*het veld waarin de nieuwsbriefvoorkeur ligt
    opgeslagen
-   Kies [*is precies gelijk aan*] – [*vergelijk met waarde*] – Kies de
    positieve waarde, dus: *Ja*

Klik op *opslaan*om de selectieconditie op te slaan. De conditie staat
nu in het overzicht van condities. Je kan uiteindelijk zoveel condities
toevoegen als je zelf wilt.

Sluit het dialoogvenster. De nieuw gemaakte selectie vind je nu terug in
het linker overzicht, direct onder de database waarop je de selectie
hebt gemaakt.

-   Klik in het linker overzicht op de selectie om de inhoud van de
    selectie te bekijken.

**Let op:**het kan soms enige tijd duren voordat een selectie volledig
is opgebouwd.

Verdere stappen
---------------

### Gebruiksmogelijkheden instellen

Om te voorkomen dat campagnes worden verstuurd aan de verkeerde
selectie, hebben we een controle ingebouwd waardoor je per selectie
dient aan te geven waarvoor je deze wilt gaan gebruiken. In de software
**gebruiksmogelijkheden** genoemd.

-   Klik in het *Databasebeheer*menu op *Gebruiksmogelijkheden…*
-   Selecteer de nieuwsbriefselectie en selecteer het vakje *Bulk
    e-mailings*, en klik vervolgens op *opslaan*. De selectie is nu
    gereed gemaakt voor het versturen van Bulk e-mailings. \
    *Uitschrijfopties*instellen

### Uitschrijfgedrag

Voor elke database of collectie die je gebruikt voor het versturen van
mailings, moet het *uitschrijfgedrag*worden ingesteld. Hiermee geef je
aan wat er in de database moet gebeuren wanneer iemand zich uitschrijft
d.m.v. van de *{unsubscribe}* link, of wanneer een ontvanger je
e-mailbericht als spam markeert.

• Kies *Uitschrijfgedrag instellen…* in het *Databasebeheermenu*\
 • Kies bij gedrag voor *Profiel bijwerken*\
 • Kies het *nieuwsbriefveld*, en vul vervolgens de waarde in die naar
het profiel wordt geschreven zodra hij of zij zich uitschrijft.\
 • Optioneel kan het (nieuwe) gedrag ook worden toegepast op *klachten*
en *uitschrijvingen*uit het verleden.

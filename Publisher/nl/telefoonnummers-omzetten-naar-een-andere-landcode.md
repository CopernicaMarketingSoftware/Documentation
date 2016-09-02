Het kan gebeuren dat je allerlei telefoonnummers hebt geïmporteerd of
via een formulier hebt verzameld, maar dat je er achter komt dat deze
niet de goede landcode bevatten. Als er geen landcode aanwezig is, gaat
Copernica er van uit dat het Nederlandse telefoonnummers zijn. Dit kan
er daardoor voor zorgen dat smsjes niet kunnen worden afgeleverd of
zelfs bij de verkeerde personen bezorgd worden.

Het omzetten van de landcode
----------------------------

Als je smsjes wilt verzenden naar niet Nederlandse telefoonnummers, moet
je de landcode toevoegen aan het telefoonnummer. De snelste manier om
dit te realiseren gaat als volgt:

-   Exporteer het veld met het telefoonnummer samen met een sleutelveld
    (dit kan het mailadres zijn, maar nog verstandiger is het altijd
    unieke profiel ID)
-   Open de export in Excel of een vergelijkbaar programma.
-   Verwijder de nul voor het telefoonnummer (0612345678 wordt dan
    612345678). Soms gebeurt dit door de instellingen van het programma
    automatisch, anders kun je dit onder 'Format' zelf laten doen.
-   Maak een nieuwe kolom links van de kolom met het telefoonnummer en
    plaats daarin de landcode in elk veld van de kolom. Dit kun je in
    Excel bereiken door de rechterhoek de eerste twee velden te vullen
    met de juiste landcode, beide velden te selecteren en de hoek van
    onderste het veld naar beneden te slepen. Let er wel op dat je hier
    de twee nullen wél laat staan (opnieuw te realiseren in het 'Format'
    venster).
-   Voeg de kolommen met de landcode en het telefoonnummer samen
    (kolommen 'mergen'). Dan heb je dus één kolom met een telefoonnummer
    als 0049612345678. Excel heeft hier een functie voor. In
    bijvoorbeeld LibreOffice Calc kun je in het bovenste veld van een
    derde kolom (zeg veld C2) de volgende formule plaatsen: =A2 & B2.
    Vervolgens sleep je de rechterhoek van veld C2 naar beneden om dit
    voor alle velden van de kolom te laten gelden.
-   Maak het bestand klaar om in Copernica geïmporteerd te worden.
    Hierdoor laat je de kolom met de waardes uit het sleutelveld staan,
    samen met het veld met de gemaakte zojuist telefoonnummers
-   Importeer het bestand in je Copernica database. Stel hierbij in dat
    er gezocht wordt op basis van matches met het gebruikte sleutelveld
    (wat uniek moet zijn).
-   Klaar! Je hebt nu je telefoonnummers omgezet naar telefoonnummers
    met een andere landcode


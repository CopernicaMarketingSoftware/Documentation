# Webformulieren - wachtwoord vergeten

Door middel van een inlogformulier kunnen bezoekers van uw website
inloggen om toegang te krijgen tot een afgeschermd onderdeel van uw
website. Voor het maken van een dergelijk formulier gaan we gebruik
maken van sleutelvelden.

Een sleutelveld is een veld die in de database bij ieder profiel (en/of
subprofiel) een unieke waarde heeft. Het veld met bijvoorbeeld het
e-mailadres, eigen gekozen wachtwoord, of een klantnummer zijn hiervoor
bijzonder geschikt. Het sleutelveld stelt u niet in de database in, maar
wijst u aan in het webformulier zelf.

Inlogformulier
--------------

Hiervoor heeft u nodig:

-   Een database met hierin minstens twee velden die unieke waarden
    bevatten. Bijvoorbeeld een veld met het e-mailadres en een apart
    veld met hierin het wachtwoord (of een klantnummer).
-   Een webpagina om het formulier op te plaatsen.
-   Een tweede webpagina die als landingpagina van het formulier wordt
    ingesteld.

1.  Creëer een webformulier met hierin minstens twee velden opgenomen.
    Beide velden moeten worden aangemerkt als sleutelveld. Kies hiervoor
    bijvoorbeeld het e-mailadres en een wachtwoord of klantnummer.
2.  Ga naar de instellingen van het formulier, en kies hier bij algemene
    instellingen voor de volgende instellingen.
    -   Inloggen als profiel uit de database [database]
    -   Kies de vervolgpagina

**Tabblad profielen bewerken**

-   Formulier werkt met …elk profiel dat overeenkomt met de
    sleutelvelden
-   Profiel moet worden …gewijzigd
-   Wanneer niet gevonden…moet er een foutmelding worden gegeven
-   Voer de melding in die moet worden gegeven wanneer geen matchend
    profiel is gevonden
-   Klik onderaan het overzicht op ‘opslaan’
-   Sluit het dialoogvenster en plaats het formulier in uw webpagina.\
     \
     **Vervolgens ga je de landingpagina van het formulier afschermen
    voor mensen die niet ingelogd zijn.**

-   Ga naar het webpagina menu en kies voor ‘Toegang instellen’
-   Kies hier voor ‘Deze pagina is alleen toegankelijk voor ingelogde
    bezoekers’
-   Klik op opslaan

Test je formulier. Om te testen kunt u het best de browser opnieuw
opstarten, zodat uw huidige sessie gereset wordt (en dus weer uitgelogd
bent).

Kies bij Website \> Standaard webpagina’s welke pagina moet worden
getoond wanneer een niet-ingelogd persoon de afgeschermde pagina
probeert te openen.

Uitlogformulier
---------------

-   Creëer een nieuw formulier
-   Voeg geen velden toe, maar ga direct naar de webformulier
    instellingen.
-   Kies hier voor ‘Uitloggen’, kies een tekst voor de button, sla de
    boel op en plaats het formulier ergens op uw webpagina.
-   Na het drukken op de knop, wordt de ingelogde gebruiker automatisch
    uitgelogd.

**Vraagje: kan ik in plaats van een knop ook een tekstlink gebruiken
(bijvoorbeeld de tekst ‘uitloggen’).**

Ja, dit kan met behulp van JavaScript en XSLT. See also
http://www.thesitewizard.com/archive/textsubmit.shtml

Ook kunt u het formulier element button dusdanig manipuleren door middel
van CSS dat deze het uiterlijk krijgt van een normale tekst link.

Wachtwoord vergeten formulier
-----------------------------

We vergeten allemaal wel eens wat. Geen probleem.

Maak een nieuw formulier met hierin 1 veld opgenomen: het e-mailadres.
Maak dit veld een sleutelveld en verplicht. Ga naar de
webformulierinstellingen en kies bij algemene instellingen voor ‘Geen
verandering’

Kies bij Profielen bewerken voor

-   … elk profiel dat overeenkomt met de sleutelvelden
-   … gevonden profielen bijwerken
-   … geen profiel = foutmelding
-   … voer een waarschuwing in dat wordt getoond als e-mailadres niet is
    gevonden.
-   … sla de instellingen op.

Het e-mailadres is gevonden.

Nu wil je een e-mail met het wachtwoord versturen. Koppel daartoe een
opvolgactie aan het webformulier.

-   Kies bij oorzaak ‘Er is een profiel of subprofiel gevonden’
-   Kies bij oorzaak ‘Verstuur een tekstueel bericht’
-   Geef deze de bestemming ‘het profiel zelf’
-   Voer bij bericht de tekst in en personaliseer deze met het veld
    waarin het wachtwoord is opgeslagen (Bijvoorbeeld: *{\$wachtwoord}*
    )

Test of het allemaal naar behoren werkt. Geen e-mail ontvangen?
Controleer dan of er in de database een veld van het
type e-mailveld bestaat. 

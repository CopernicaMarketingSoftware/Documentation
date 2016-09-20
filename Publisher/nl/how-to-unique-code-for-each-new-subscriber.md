Iedereen die zich inschrijft voor de nieuwsbrief krijgt automatisch een
unieke actiecode toegestuurd. Hiermee kunnen nieuwe abonnees vervolgens
weer ergens op korting krijgen, of een voetreis naar Rome winnen. Enfin.
Dit is de manier. 

-   Maak een nieuwe database met hierin ten minste een veld opgenomen
    voor de code's en het e-mailadres. (Je kan ook een bestaande
    database gebruiken en hierin de unieke actiecodes naartoe
    importeren).
-   Laad de unieke codes in de database. (Ga bijvoorbeeld naar
    [http://www.randomcodegenerator.nl/](http://www.randomcodegenerator.nl/)
    om 1000 unieke codes te genereren. Maar het is ook mogelijk met
    Excel unieke codes te maken )

Ga vervolgens naar het onderdeel **Content** en maak een nieuw formulier
aan, met hierin ALLEEN het e-mailadres opgenomen. Dit veld is GEEN
sleutelveld.

### Werking formulier instellen

Geef het formulier de volgende instellingen:

Kies bij instellingen voor ‘**inloggen als profiel**’, verzin een
buttontekst en definieer de vervolgpagina waarop je vertelt dat er een
e-mail onderweg is met hierin de unieke actiecode. 

Vervolgens gaan je de werking van het formulier aanpassen.

-   Het formulier heeft betrekking op : ...elk profiel dat overeenkomt
    met de sleutelvelden
-   Maximum limit of matches: 1
-   Maak een conditie en gebruik hiervoor de JavaScript
    editor:** profile.email == ''** ('email' moet je natuurlijk
    veranderen naar de naam van het veld waarin jij de emailadressen
    wilt opslaan).
-   Het profiel moet worden... bijgewerkt
-   Wat moet er gebeuren als geen match is gevonden: Er moet een
    foutmelding worden weergegeven
-   Vul hier in: Deze actie is voorbij (of iets in die trant)
-   Sla het deel over restricties over.
-   Klik op **finish**.

Het formulier zoekt dus naar matches en vindt een match op basis van de
conditie dat het e-mailveld leeg moet zijn. Wanneer er geen lege
e-mailvelden meer zijn is er geen match meer, wordt het formulier niet
verwerkt en wordt een waarschuwing terug gegeven. Het formulier heeft nu
de juiste instellingen.

Nu gaan we een opvolgactie koppelen aan het formulier.

-   Kies uit het webformuliermenu voor opvolgacties, en stel deze zo in
    dat er een e-mail wordt verstuurd naar het profiel wanneer het
    profiel is gewijzigd. 
-   Deze e-mail personaliseer je met het databaseveld met hierin de
    actiecode. En je plaatst een link naar een inlogformulier waarbij
    zowel het e-mailadres als de unieke code als sleutelveld fungeren.
    Op de vervolgpagina van dit inlogformulier kan je vervolgens
    vermelden waar de gelukkige zijn of haar broodrooster kan ophalen. 

Vergeet de boel niet te testen!

Het wil wel eens gebeuren dat een Content webformulier helemaal goed
ingesteld lijkt te zijn, maar dat er geen wijzigingen worden doorgevoerd
in de database. Wanneer de opvolgacties van een Content webformulier
niet goed worden uitgevoerd, blijkt dat in veel gevallen dezelfde
oorzaak te hebben: een fout in de instellingen van het webformulier.

Niet werkende opvolgacties bij Content webformulieren
-----------------------------------------------------

Stel dat we een webformulier hebben waarmee men zich voor een
nieuwsbrief kan aanmelden. Dan wil je de gegevens van de aanmelder
vragen en na het verzenden van het formulier het veld 'Nieuwsbrief' in
de database op 'Ja' zetten. Hiervoor zijn twee manieren:

-   Een verborgen veld 'Nieuwsbrief' maken in het formulier, waarvan de
    waarde vaststaat op 'Ja'.
-   Een opvolgactie op het formulier instellen die bij elk profiel (van
    diegene die het formulier heeft ingevuld) het veld 'Nieuwsbrief' op
    'Ja' zet.

Wanneer er voor de tweede optie wordt gekozen, is het essentieÃ«l dat
het Copernica systeem weet welk profiel door de opvolgactie mag worden
gewijzigd. Om dat te weten, moet er een profiel ingelogd zijn. Het
automatisch inloggen van het profiel dat zojuist het formulier heeft
ingevuld wordt gerealiseerd door een instelling van het webformulier.

Het formulier instellen
-----------------------

Om in te stellen dat de invuller van het formulier automatisch wordt
ingelogd, waardoor het Copernica systeem weet op welk profiel
opvolgacties moeten worden verricht, gebeurt in het venster (onder
'Content') 'Webformulier ...' -\> 'Instellingen'. De tweede optie,
genaamd 'Instelling' moet op 'inloggen als profiel uit database ...'
staan. Op die manier kan een opvolgactie succesvol worden doorgevoerd in
de database.

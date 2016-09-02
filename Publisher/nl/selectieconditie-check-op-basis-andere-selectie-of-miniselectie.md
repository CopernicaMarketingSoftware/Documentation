Het is mogelijk om referenties te maken tussen selecties en
miniselecties. Je gebruikt hiervoor de conditietypes 'Check op inhoud
andere (mini)selectie' en 'Check op inhoud miniselectie'.

Profielen uit andere selectie uitsluiten/opnemen
------------------------------------------------

Met het condititetype '**Check op inhoud andere selectie**' is het
mogelijk om profielen uit de ene selectie in een andere selectie op te
nemen of juist uit te sluiten. Je hoeft zo bijvoorbeeld maar één
hardbounce selectie te maken. In je andere selecties (waarnaartoe je
emails stuurt) voeg je een regel toe waarmee je alle profielen uit de
hardbounce selectie automatisch uitsluit.

-   Maak een nieuwe conditie aan **'Check op inhoud andere selectie**'
-   Kies de selectie waaraan je wilt refereren
-   Kies vervolgens of je alle profielen uit deze selectie wilt opnemen,
    of juist wilt uitsluiten.

#### Oeps, te veel kruisverwijzingen

Je kan alleen naar selecties refereren die zich op hetzelfde niveau
bevinden als de selectie die je aan het bewerken bent, of naar een
subselectie van een andere selectie. Het is vanzelfsprekend niet
mogelijk om te refereren aan een selectie die een subselectie is van je
huidige selectie, of aan een selectie die is gebaseerd op de selectie
die je aan het bewerken bent (te veel kruisverwijzingen).

Selectie gebaseerd op inhoud miniselectie
-----------------------------------------

Met het conditietype 'Check op inhoud miniselectie' selecteer je
profielen die 1 of meer subprofielen hebben die voldoen aan de regels
van de miniselectie. Het selecteren van profielen met 1 of meer
aangekochte producten (subprofielen) is een veelgebruikte toepassing.

-   Maak in je selectie een nieuwe conditie aan 'Check op inhoud
    miniselectie'
-   Kies de miniselectie die je wilt gebruiken en geef vervolgens aan
    hoeveel subprofielen er minimaal en maximaal bij het profiel
    aanwezig moeten zijn.

Onderstaand twee veelgebruikte toepassingen.

### Selecteer alle klanten die een broodrooster hebben gekocht

Je wilt een mailing versturen aan klanten die eerder een broodrooster in
jouw shop hebben gekocht. Klanten zijn opgeslagen als profielen, hun
aangekochte producten als subprofielen in een collectie onder het
profiel.

Je maakt in de collectie eerst een miniselectie 'broodrooster' waarmee
je de subprofielen filtert op product 'broodrooster'

![](Documentation/toaster3.png)

Vervolgens maak je een selectie die stelt dat het profiel minstens 1 en
maximaal 999 subprofielen moet hebben in de miniselectie 'kocht
broodrooster'

![](Documentation/toaster2.png)

Sla de selectie op. Je kan nu een mailing inroosteren naar deze
selectie.

### Selecteer alle profielen die een broodrooster hebben gekocht, maar nog geen messenset.

Veronderstel, je wilt een mailing sturen met hierin een aanbieding voor
een broodmessenset, en je wilt hiervoor uitsluitend klanten benaderen
die al eerder een broodrooster bij je hebben gekocht. Klanten die reeds
een messenset hebben gekocht wil je vanzelfsprekend geen mail sturen.
Zij hebben dikwijls al een messenset.

-   Je maakt eerst een miniselectie 'broodrooster' waarmee je
    subprofielen filtert op product 'broodrooster'
-   Je maakt een tweede miniselectie 'messenset' waarmee je alle
    producten 'messenset' filtert.
-   Maak een selectie 'wel broodrooster, geen messenset' die stelt dat
    het profiel minstens 1 en maximaal 999 subprofielen moet hebben in
    de miniselectie 'kocht broodrooster'
-   Vervolgens maak je een tweede selectie die stelt dat het profiel
    minstens 1 en maximaal 999 subprofielen moet hebben in de
    miniselectie 'messenset'
-   Maak in de selectie 'kocht broodrooster, geen messenset' een extra
    regel aan, waarmee je alle profielen niet in selectie 'kocht
    messenset' toevoegt.

### ![](Documentation/toaster5.png)

Sla de selectie op. Je kan nu een mailing sturen naar klanten die wel
een broodrooster kochten, maar nog geen messenset. Klanten die al een
messenset hebben, ontvangen geen mail.

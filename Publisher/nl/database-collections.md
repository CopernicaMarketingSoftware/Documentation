# Collecties
Een **collectie** is een soort minidatabase binnen een profiel. Een profiel kan
bijvoorbeeld een collectie orders, een collectie gedownloade whitepapers, of
een collectie contactpersonen (wanneer een profiel een bedrijf is in het geval
van een B2B-database) bevatten. Een collectie wordt, net als de database,
opgebouwd uit velden naar keuze. Een collectie wordt gevuld met zogeheten
**subprofielen** en deze bevatten, gelijk aan profielen, informatie over
kenmerken als naam, aantal, prijs en categorie.

## Selecties en miniselecties:
Een selectie selecteert profielen op basis van veldwaarden (kenmerken) binnen
een database, aan de hand van een conditie. Een miniselectie doet hetzelfde,
maar dan met subprofielen binnen een collectie. Het is ook mogelijk om een
selectie te maken van profielen met subprofielen die voldoen aan de condities
van een miniselectie. In dat geval moet er een aparte selectie worden
aangemaakt met als conditie dat de profielen erin tenminste
'1 subprofiel' hebben dat voldoet aan de condities van de miniselectie, of
helemaal geen. Je zou bijvoorbeeld een selectie kunnen maken van profielen die
ooit een order hebben geplaatst (minimaal 1 subprofiel in de collectie
'Orders'), of juist van profielen die nog nooit een order hebben geplaatst
(0 subprofielen in de collectie 'Orders').

## Een collectie aanmaken
Een collectie kun je aanmaken via **Aanmaken > Een collectie aanmaken**.
Kies onder welke database de collectie geplaatst moet worden
en geef de collectie een naam. Na het aanmaken kun je via de optie **velden** in de toolbar de velden toevoegen aan je collectie.

## Aanmaken of wijzigen van een miniselectie
Om een miniselectie aan te maken kies je onderin eerst voor de optie *Collecties*. De bestaande collecties en miniselecties worden nu getoond tussen je databases en selecties. Vervolgens kies je de collectie waaronder je een miniselectie wilt aanmaken en klik je op **Aanmaken > Een miniselectie aanmaken**.
Hier geef je de miniselectie een naam. Na het aanmaken kun je condities toevoegen aan de miniselectie.

Om de condities aan te passen klik je op de optie **Regels** in de toolbar van de betreffende miniselectie.

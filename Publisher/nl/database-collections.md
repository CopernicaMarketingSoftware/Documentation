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

## Een Collectie aanmaken in de Marketing Suite
In de Marketing Suite kan een collectie aangemaakt worden in het
**Database & Profielen** gedeelte. Klik op het plusteken in de linkerbovenhoek.
Klik op Collectie, kies onder welke database de collectie geplaatst moet worden
en geef de collectie een naam.

Het maakt niet uit of een collectie in de Publisher of Marketing suite gemaakt
is, dit is dezelfde collectie. Als een aanpassing in de Publisher gedaan wordt,
dan is deze ook zichtbaar in de Marketing Suite. Nadat de collectie aangemaakt
is, is de volgende stap is structuur aan je collectie geven door databasevelden
toe te voegen.

## Een Collectie aanmaken in de Publisher
Binnen de Publisher kan een collectie aangemaakt worden via
**Databasebeheer > Databasevelden wijzigen > collectie toevoegen**. In het
venster hierna kan een naam gegeven worden aan de collectie. De nieuw
aangemaakte collectie verschijnt als tabblad bij de database. Er kan per
profiel gekeken worden naar de bijbehorende collecties.

Het maakt niet uit of een collectie in de Publisher of Marketing suite gemaakt
is, dit is dezelfde collectie. Als een aanpassing in de Marketing Suite gedaan
wordt, dan is deze ook zichtbaar in de Publisher. Nadat de collectie aangemaakt
is, is de volgende stap is structuur aan je collectie geven door databasevelden
toe te voegen.

## Aanmaken of wijzigen miniselectie Marketing Suite
Klik op het **blauwe tandwiel** in de rechterbovenhoek, hierna volgt een menu,
klik in dit menu op **Selecties aanmaken**. Geef de miniselectie een naam. Deze
miniselectie kan vervolgens worden ingericht met regels en condities.

Om een miniselectie aan te passen dient er weer naar hetzelfde menu gegaan te
worden en aan de linkerkant de aan te passen selectie te selecteren. Klik
vervolgens op  **Selectieregels bewerken**. In dit overzicht kunnen nieuwe
regels of condities toegevoegd worden aan de selecties. Miniselecties gemaakt
in de Marketing Suite zijn beschikbaar in de Publisher en vice versa.

## Aanmaken of wijzigen miniselectie Publisher
Klik op **Databasebeheer > Selecties beheren**. Om een nieuwe miniselectie te
maken dient er geklikt te worden op **selectie aanmaken**. Kies de naam van de
miniselectie en klik op **onder** om aan te geven onder welke collectie de
nieuwe selectie zal vallen. Klik vervolgens op het tweede tabblad
**Selectie condities**, hier kunnen extra regels en condities toegevoegd worden.
Om een conditie aan dezelfde regel toe te voegen klik dan op
**Voeg een nieuwe 'EN' conditie toe aan deze 'OF' regel**, wil je een nieuwe
regel maken met een nieuwe conditie klik dan op
**Voeg een nieuwe 'EN' conditie toe aan een nieuwe 'OF' regel**. Miniselecties
gemaakt in de Marketing Suite zijn beschikbaar in de Publisher en vice versa.

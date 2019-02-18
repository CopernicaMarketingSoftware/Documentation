# Databasemanagement
Een goede verzendlijst voor je e-mail marketing draagt bij aan je
deliverability en heeft een positief effect op de resultaten van je e-mail
marketing. Zo heeft het blijven sturen van e-mails naar
personen die deze niet meer openen of naar niet-bestaande e-mailadressen een
negatieve invloed op je e-mailreputatie.

De klant is binnen Copernica vrij om zelf een selectiestructuur te bepalen,
maar wij bieden ook een standaard selectiestructuur aan. Veel van onze
gebruikers hanteren deze standaar dselectiestructuur. Daarmee halen ze
automatisch alle foutieve en dubbele e-mailadressen, bounces en
uitschrijvingen uit hun verzendselectie.

De standaard structuur is in twee hoofdselecties verdeeld,
**A_DatabaseManagement** en **B_Verzendselectie**. Hieronder beschrijven wij
deze twee hoofdselecties.

```
- A_DatabaseManagement
    - A_Bounces
    - B_FoutiefEmailAdres
    - C_Klachten
    - D_DubbeleProfielen
    - E_Uitschrijvingen
    - F_Inactief
- B_Verzendselectie
    - Campagnes
```

## A_DatabaseMangement
Bevat ieder profiel uit de database. Deze selectie zit puur voor structuur in
de standaard selecties. De selecties onder A_DatabaseManagement zullen de profielen
bevatten die we niet willen mailen, deze worden in de volgende paragrafen
toegelicht.

Deze selectie bevat 1 regel met 1 conditie. De conditie is ook
uitgeschakeld zodat alle profielen in selectie vallen. Dat is namelijk ook het
doel van de selectie.

### A_Bounces
Bevat alle profielen die in het verleden een hard bounce hebben gegeven of
een bepaald aantal keer een soft bounces waren. Hard bounces zijn fouten die
altijd zullen blijven terugkomen, deze adressen zal je nooit meer willen mailen.
Een soft bounce hoeft niet terug te blijven komen, maar als een soft bounce
blijft gebeuren, dan dient deze ook uitgesloten te worden. De hoeveelheid
soft bounces is per klant anders: pas dit getal aan voor je eigen database.
Voor een klant die dagelijks mailt moet het aantal soft bounces veel hoger dan
voor iemand die 1 keer per maand mailt.

De selectie bevat 4 regels met elk 2 condities. De eerste regel heeft een
conditie die stelt dat er sinds 2000-01-01 meer dan 2 hardbounces zijn
voorgekomen en dat er in de afgelopen 7 dagen geen fout mag zijn opgetreden.
Dit zorgt ervoor dat profielen niet per ongeluk in deze selectie kunnen
voorkomen. De tweede regel doet eigenlijk hetzelfde voor softbounces. De andere
2 regels zijn hetzelfde als de eerste 2 genoemde, maar deze zijn ingesteld voor
Marketing Suite mailings.

### B_FoutiefEmailAdres
Bevat alle profielen waarbij er in het e-mail veld geen e-mailadres staat.
Denk hierbij aan het geval dat het veld leeg is of dat er geen '@'
in het e-mailadres zit.

De selectie bevat 1 regel en 1 conditie. De conditie checkt of het e-mail veld
een correct e-mailadres bevat, vervolgens wordt de regel omgedraaid door hem op
**OF NIET** te zetten.

### C_Klachten
Bevat alle profielen die op een mailing een spamklacht hebben gegeven.

Deze selectie bevat 2 regels met beide 1 conditie. De eerste regel heeft een
conditie die stelt dat er sinds 2000-01-01 meer dan 0 spamklachten zijn
voorgekomen. De tweede regel heeft dezelfde conditie voor Marketing Suite
mailings.

### D_DubbeleProfielen
Bevat alle profielen die dubbel in de database staan behalve het
oudste/originele profiel.

Deze selectie bevat 1 regel met 1 conditie. De conditie checkt of een profiel
dubbel is op basis van het e-mailadres. Als het e-mailadres niet uniek hoeft te zijn
in jouw account, verander dit dan naar jouw unieke waarde.

### E_Uitschrijvingen
Bevat alle profielen die zich hebben uitgeschreven voor de nieuwsbrief.

Deze selectie bevat 1 regel met 1 conditie. De conditie controleert of het
opt-in veld de waarde 'Nee' bevat. Pas dit eventueel aan naar het opt-in veld
en waarde die past bij jouw database.

### F_Inactief
Bevat alle profielen die niet actief zijn. Dit houdt in dat deze profielen
mailings niet openen en niet klikken op links in je mailings. Deze profielen
zijn erg slecht voor je reputatie en kunnen ervoor zorgen dat je mailings niet
aankomen bij klanten die wel regelmatig mailings openen.

Deze selectie bevat 1 regel met 3 condities. De eerste conditie geeft aan dat
het profiel niet in de afgelopen 30 dagen aangemaakt mag zijn. Dit wordt gedaan
om nieuwe profielen niet gelijk inactief te maken. De tweede regel checkt of
het profiel precies 0 publisher mails geopend heeft of geklikt heeft op links
daarin in de afgelopen 180 dagen. De derde regel doet hetzelfde als de tweede,
maar dan voor Marketing Suite mailings. De 180 dagen kan uiteraard aangepast
worden naar meer of minder dagen als dit beter past bij jouw account.

## B_Verzendselectie
De verzendselectie bevat alle profielen die niet in de subselecties van
A_DatabaseManagement zitten. Dit zorgt ervoor dat er in de verzendselecties
alleen profielen komen die geen bounce, foutief e-mailadres, klacht,
dubbel e-mailadres, uitschrijver of inactief adres zijn. Elke subselectie
onder B_Verzendselectie bevat hierdoor ook enkel de profielen die gemaild mogen
worden.

De selectie bevat maar 1 regel met 6 condities. Elke conditie sluit een van de
bovengenoemde selecties uit, want deze mogen niet in B_Verzendselectie
voorkomen.

## Aanmaken standaard selecties
Het automatisch aanmaken van deze structuur is momenteel alleen mogelijk in de
Publisher. De Marketing Suite gebruikt dezelfde database als de Publisher,
hierdoor hoeft dit geen probleem te zijn. Ga in **Profielen** naar
**Databasebeheer > Maak standaard selecties aan**, kies een taal en eventueel
een eigen afmeldveld.

# Databasemanagement

Een goede verzendlijst voor je email marketing draagt bij aan je
deliverability en heeft een positief effect op je email marketing
resultaten. Zo heeft het blijven sturen van e-mails naar
personen die deze toch niet meer openen of naar niet bestaande
e-mailadressen een negatieve invloed op je e-mailreputatie.

De klant is binnen Copernica vrij om zelf een selectie structuur te bepalen, maar wij bieden ook een standaard selectie structuur aan. Veel van onze gebruikers hanteren deze standaard selectie structuur. Daarmee halen ze automatisch alle foutieve en dubbele e-mailadressen, bounces en uitschrijvingen uit hun verzendselectie. 

De standaard structuur is in twee hoofdselecties verdeeld, **A_DatabaseManagement** en **B_Verzendselectie**. Hieronder beschrijven wij deze twee hoofdselecties. 

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

Bevat ieder profiel uit de database. Deze selectie zit puur voor structuur in de standaard selecties. Onder A_DatabaseMangement zullen de onderstaande selecties komen. Deze selectie zullen de profielen bevatten die we niet willen mailen. 
Deze selectie bevat 1 regel met 1 conditie. Deze conditie is uitgeschakeld zodat alle profielen in selectie vallen, dat is namelijk ook het doel van de selectie. Deze selectie dient niet aangepast te worden, deze is voor elke gebruiker hetzelfde. 

### A_Bounces

Bevat alle profielen een hard bounce of een x aantal soft bounces waren. Hard bounces zijn fouten die blijven terug komen, deze wil je niet meer mailen. Een soft bounce hoeft niet terug te blijven komen maar als een soft bounce blijft gebeuren, dan dient deze ook uitgesloten te worden. De hoeveelheid soft bounces is per klant anders, pas dit aan voor je eigen database. Voor een klant die dagelijks mailt moet het aantal soft bounces veel hoger dan voor iemand die 1 keer maand mailt. 

De selectie bevat 4 regels met elk 2 condities. De eerste regel heeft een conditie die stelt dat er sinds 2000-01-01 meer dan 2 hardbounces zijn voorgekomen en dat er in de afgelopen 7 dagen geen fout mag zijn opgetreden. Dit zorgt ervoor dat profielen niet per ongeluk in deze selectie kunnen voorkomen. De tweede regel doet eigenlijk hetzelfde voor softbounces. De andere 2 regels zijn hetzelfde als de eerste 2 genoemde maar deze zijn ingesteld voor Marketing Suite mailings. 

### B_FoutiefEmailAdres

Bevat alle profielen waarbij er in het email veld geen emailadres staat. Denk hierbij dat het veld leeg is of dat er geen @ in het e mailadres zit.
De selectie bevat 1 regel en 1 conditie. De conditie checkt of het email veld een correct emailadres bevat, vervolgens wordt de regel omgedraaid door hem op **OF NIET** te zetten. 

### C_Klachten

Bevat alle profielen die op een mailing een spamklacht hebben gegeven. 
Deze selectie bevat 2 regels met beide 1 conditie. De eerste regel heeft een conditie die stelt dat er sinds 2000-01-01 meer dan 0 spamklachten zijn voorgekomen. De tweede regel heeft dezelfde conditie voor Marketing Suite mailings. 

### D_DubbeleProfielen

Bevat alle profielen die dubbel in de database staan behalve het oudste/originele profiel.
Deze selectie bevat 1 regel met 1 conditie. De conditie checkt of een profiel dubbel is op basis van het emailadres, als het emailadres niet uniek is in jouw account verander dit dan naar jouw unieke waarde.

### E_Uitschrijvingen

Bevat alle profielen die zich hebben uitgeschreven voor de nieuwsbrief. 
Deze selectie bevat 1 regel met 1 conditie. De conditie controleert of het optin veld de waarde Nee bevat. Pas dit eventueel aan naar het optin veld van jouw database.

### F_Inactief

Bevat alle profielen die niet actief zijn, dit houdt in dat deze profielen mailings niet open en niet klikken. Deze profielen zijn erg slecht voor je reputatie en kunnen ervoor zorgen dat je mail niet aankomt bij klanten die wel de mail openen.
Deze selectie bevat 1 regel met 3 condities. De eerste conditie geeft aan dat he profiel niet in de eerste 30 dagen aangemaakt mag zijn, dit wordt gedaan om nieuwe profielen niet gelijk inactief te maken. De tweede regel checkt of het profiel precies 0 publisher mails geopend of geklikt heeft in de afgelopen 180 dagen. De derde regel doet hetzelfde als de tweede maar dan voor Marketing Suite mailings. De 180 dagen kan uiteraard aangepast worden naar meer dagen als dit beter werkt in jouw account.

## B_Verzendselectie

De verzendselectie bevat alle profielen die niet in de A tot en met F databasemanagementselecties zitten. Dit zorgt ervoor dat er alleen in de verzendselecties profielen komen die geen bounce, foutieve e-mailadres, klacht, dubbel, uitschrijver of inactief zijn. Elke subselectie onder B_Verzendselectie bevat hierdoor ook enkel de profielen die gemaild mogen worden. 

De selectie bevat maar 1 regel met 6 condities. Elke conditie sluit een van de bovengenoemde selecties uit, want deze mogen niet in B_Verzendselectie voorkomen.

## Aanmaken standaard selecties

Het automatisch aanmaken van deze structuur is momenteel alleen mogelijk in de Publisher. De Marketing Suite gebruikt dezelfde database als de Publisher hierdoor hoeft dit geen probleem te zijn. Ga in **Profielen** naar **Databasebeheer > Maak standaard selecties aan**, kies een taal en eventueel een eigen afmeldveld. 





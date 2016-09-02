In Copernica kan je gegevens filteren met selecties en miniselecties.

Het belangrijkste verschil tussen een selectie en een miniselectie:

-   Met **selecties** filter je **profielen** in een **database**.
-   Met **miniselecties** filter je **subprofielen** in een
    **collectie**.

Zowel je selecties en miniselecties beheer je in het onderdeel
**Profielen**. In het menu **Databasebeheer**vind je de optie
**Selecties beheren**

![](Documentation/createselectionminiselection.png)

*Linkonder in het venster vind je de opties om een nieuwe selectie of
miniselectie te maken.*

![](Documentation/selectionandminiselectionoverview.png)

*Als er al selecties en miniselecties bestaan, worden deze in dit
venster weergegeven. Klik op een selectie of miniselectie om deze te
bewerken.*

#### Wat zijn verder de verschillen tussen selecties en miniselecties?

Die zijn er eigenlijk niet. Ze werken hetzelfde, en het aanmaken en
beheren ervan verschilt niet wezenlijk. Voor selecties en miniselecties
zijn grotendeels dezelfde conditietypes beschikbaar.

### De subprofielen van een miniselectie weergeven

Ga naar het menu **Huidige weergave** en kies **Subprofielen weergeven**

Selecteer de miniselectie en eventueel een combinatie van selecties en
de miniselectie om de subprofielen in een lijst weer te geven.

### Vanuit een selectie naar een miniselectie refereren

Het is mogelijk om een selectie te maken op profielen op basis van het
resultaat van een miniselectie

#### Voorbeeld: e-mail sturen naar klanten die bepaald product hebben gekocht

Je hebt een database met klanten, en de door hen aangeschafte producten
heb je opgeslagen als subprofielen in een collectie **Producten**.\
Je wilt naar alle klanten die een bepaald product hebben gekocht een
e-mail sturen.

-   Je maakt dan eerst een miniselectie (deze noem je bijvoorbeeld
    *HasProduct*) waarmee je alle producten selecteert.
-   Vervolgens maak je een selectie en deze geef je een conditie van het
    type **Check op inhoud miniselectie**. Kies de **HasProduct**
    miniselectie en stel in dat er minimaal 1 en maximaal 9999
    suprofielen (producten) onder het profiel moeten hangen.

Je kan nu een e-mail sturen naar het profiel, en bijvoorbeeld vragen hoe
het aankoopproces hem of haar bevallen is.

![](Documentation/miniselection-referral.png)

###  

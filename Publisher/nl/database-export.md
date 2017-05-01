# Exporteren van profielgegevens

Naast importeren is het ook mogelijk om profielen en subprofielen te exporteren. 
Je kunt een hele database in één keer exporteren, of in onderdelen (bijvoorbeeld
per collectie). Bij een export wordt een bestand in een formaat naar keuze 
gegenereert, dat je kunt downloaden of laten e-mailen.

## Extra opmerkingen 

* De velden *ID*, *Toegangscode* en *Profiel aangemaakt* zijn velden waarvan de waarde door het systeem is toegekend.
* Je kunt maximaal 1 collectie in een CSV bestand opnemen. Als je meerdere collecties tegelijk wilt exporteren, kies dan XML als bestandstype.
* UTF-8 is in de meeste gevallen de beste encoding voor outputbestanden en wordt aangeraden
* Datumvelden worden geëxporteerd in het formaat dat je zelf opgeeft, zodat je bestand kunt maken met bijvoorbeeld een alternatieve datumnotatie.
* Om bestanden klein te houden kun je compressie inschakelen. Dit is zeker handig als je de exports per mail wilt versturen.

## Scheidingsteken instellen

Het scheidingsteken is een speciaal teken waarmee in het exportbestand de
velden van elkaar worden gescheiden. Vaak is dit een tab, maar je kunt ook een 
komma of puntkomma kiezen. Als er in je database profielen voorkomen die zelf 
een scheidingsteken in hun velden hebben staan (bijvoorbeeld een harde tab in 
een woonplaatsveld), kies dan de optie *"Met quotes"*. De waardes worden dan
tussen quotes geplaatst zodat er geen conflicten met het scheidingsteken optreden.

## Exporteren van e-mailstatistieken

Ook de resultaten van mailings kunnen worden geëxporteerd. Zie [dit artikel](./statistics-export) 
voor meer informatie.

Als je profielen of subprofielen wilt exporteren gebaseerd op e-mailresultaten, 
maak dan een selectie aan met de conditietype *Check op resultaten e-mailcampagnes*. 
Gebruik dan de exportfunctie in het onderdeel *profielen* om de profielgegevens 
uit de selectie te downloaden.

## Exporteren in Publisher

Om een database of collectie te exporteren moet je deze eerst selecteren 
onder **Profielen**. Je kunt daarna onder **Huidige weergave** de optie 
vinden om te exporteren of importeren.

## Exporteren met Marketing Suite

Het is (nog) niet mogelijk een database te exporteren met Marketing Suite.

## Meer informatie 

* [Database beheer](./database-introduction)
* [Database importeren](./database-import)

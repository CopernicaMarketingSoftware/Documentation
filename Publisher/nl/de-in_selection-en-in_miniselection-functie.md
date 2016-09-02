Het is mogelijk om selecties en/of miniselecties te gebruiken binnen
Smarty personalisatie. Hiervoor zijn door Copernica twee speciale tags
het leven in geroepen: **in\_selection** en **in\_miniselection**.
Gebruik deze tags om delen uit een document of template alleen aan
bestemmingen te tonen die in een specifieke selectie of miniselectie
voorkomen.

Let op: wanneer je aan een selectie of miniselectie wilt refereren,
zonder hierbij het hele pad op te geven
(*Database:selectie:subselectie*) dien je het *ID*van de (mini)selectie
te gebruiken. Het *ID*van een selectie kan je ophalen door in het
onderdeel *Profielen* in het database-overzicht enkele tijd met de
cursor over de naam van de selectie te zweven. Die van een miniselectie
kan je op dezelfde wijze achterhalen, maar dan onder *Huidige weergave
\>***Subprofielen weergeven**. 

**Voorbeeld in\_miniselection met verwijzing naar selectie ID**\

`{in_selection selection="20"}   Deze tekst is alleen zichtbaar voor personen uit de selectie met ID 20 {/in_selection}`

**Voorbeeld in\_miniselection met verwijzing naar selectie \>
subselectie**\

`{in_selection selection="Database:mySelection:mySubSelection"}   Deze tekst is alleen zichtbaar voor personen uit de subselectie 'mySubSelection' onder selectie 'mySelection'   {/in_selection}`

**Hetzelfde kan ook met miniselecties, als volgt:**\

`{in_miniselection miniselection="50"}   Deze tekst is alleen zichtbaar voor personen uit de mminiselectie met ID 50. {/in_miniselection}`

**Let op, als je aan een andere database refereert, dan dien je deze ook
te vermelden:**\

`{in_miniselection miniselection="Database:myCollection:myMiniSelection"}   Deze tekst is alleen zichtbaar voor mensen uit de selectie 'myMiniSelection' in de collectie myCollection.   {/in_miniselection}`

Personalisatie met subprofielen is alleen mogelijk als de bestemming ook
een subprofiel is. Als de bestemming een profiel is, dan kan je door
middel van een *smarty foreach* loop achterhalen of een van de
subprofielen zich in de miniselectie bevindt:

`{foreach from=$profile.collectienaam item=sub}   {in_miniselection miniselection=99 subprofile="$sub.id"}   This text is only visible to subprofiles from the miniselection with id 99 (hover the miniselection to see its ID).   {/in_miniselection}   {/foreach}`

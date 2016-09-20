Zoals je weet gebruik je in Copernica speciale tags om in een document
gebruik te kunnen maken van variabele content en voor het toevoegen van
formulieren, enquetes et cetera. In deze tags worden blokhaken en
accolades gebruikt.

Op templateniveau kan je bijvoorbeeld gebruik maken van loop- en
tekstblokken. Documenten en templates kan je personaliseren met behulp
van Smartycode.

-   Voor loop- en contentblokken zijn hiervoor de blokhaken [ ]
    gereserveerd
-   Voor Smartycode accolades { }

Wanneer je de broncode van een template of de inhoud van een document
bewerkt, kan je de melding krijgen dat er een fout zit in de
personalisatie. Dit terwijl je misschien helemaal geen personalisatie
hebt gebruikt.

Dit komt vaak omdat ergens in het document of template blokhaken of
accolades zijn gebruikt voor andere doeleinden.

Zoek de template broncode en de inhoud van tekstblokken naar blokhaken
en accolades. Mocht je deze tegenkomen, en je kan ze niet verangen door
iets anders, gebruik dan *ldelim* en *rdelim*. Hieronder de uitleg.

Toch blokhaken of accolades gebruiken in e-mailing of website?
--------------------------------------------------------------

Dit kan door middel van **ldelim** en **rdelim**

-   Een linkerblokhaak vervang je door *ldelim*, ontsloten door twee
    blokhaken: [ldelim]
-   Een rechterblokhaak vervang je door *rdelim*, ontsloten door twee
    blokhaken: [rdelim]
-   Een linkeraccolade vervang je door *ldelim*, ontsloten door twee
    accolades: {ldelim}
-   Een rechteraccolade vervang je door *rdelim*, ontsloten door twee
    accolades{rdelim}

**Tip**: Als je een nieuwe template aanmaakt, gebruik dan [smarty
3](./smarty-2-vs-smarty-3.md "Smarty 2 vs Smarty 3").
In deze versie kan je accolades en blokhaken gebruiken zonder gebruik
van ldelim en rdelim. Er moet dan wel een spatie voor en achter de
blokhaak geplaatst zijn.

Tip 2: als je heel veel blokhaken en dergelijke moet vervangen, dan kan
je de hele riedel ook tussen literal tags zetten:

`[literal] [x] Ik vind [blokhaken] en {accolades} geweldig [mooie} dingen. (maak keuze) [/literal]`

Andere veelvoorkomende fouten
-----------------------------

Je krijgt een melding in de software wanneer je een document of template
wilt opslaan waarin een personalisatiefout is gedecteerd. De meeste van
deze fouten zijn terug te herleiden naar twee oorzaken:

-   **Functie niet afgesloten.**Je hebt een tag gebruikt die ook moet
    worden afgesloten. Echter de sluit-tag ontbreekt. Na een {if} moet
    bijvoorbeeld altijd ergens een {/if} gevonden worden.
-   **Tikfouten**. Controlleer of alle variabelen correct zijn
    geschreven.
-   **Dollarteken ontbreekt**. Variabelen in een document moeten altijd
    een dollarteken hebben. Als er geen dollar teken is gevonden,
    verwacht het systeem een niet-smarty eigen functie, zoals
    {unsubscribe}.

 

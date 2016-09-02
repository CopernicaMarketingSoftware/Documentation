Met behulp van smarty code kan je op vrij eenvoudige wijze je
nieuwsbrief van een persoonlijke noot voorzien. In dit artikel leer je
hoe je met behulp van smarty voorwaarden (if en else- statements) de
aanhef van het document voor iedere ontvanger passend kunt maken.

Let op:** test de mailing grondig** voordat je deze definitief gaat
versturen. Maak een selectie in de database met hierin verschillende
testprofielen die alle situaties uit jouw database dekken. Dus
man/vrouw, gebruik grote en kleine letters door elkaar, tussenvoegsels
en dergelijke.

Let op 2: Smarty variabelen zijn hoofdlettergevoelig. {\$voornaam} is
dus wat anders dan {\$Voornaam}.

Eenvoudige informele aanhef
---------------------------

Wanneer je van al je relaties de voornaam weet kan je de aanhef
gemakkelijk personaliseren door te verwijzen naar het veld waarin de
voornaam is opgeslagen. In dit voorbeeld het veld *Voornaam*

`Beste {$Voornaam},`

*Beste Henk,*\
 *Beste Klazien,*

Echter, een ontvanger waarvan je geen voornaam weet, zal boven de mail
de aanhef 'Beste ', lezen. Om dit te voorkomen, doet je het volgende:

`{if $Voornaam != ""}Beste {$Voornaam}{else}Beste relatie{/if},`

Vrij vertaald: als in het veld *Voornaam* een waarde is gevonden, dan
wordt deze waarde getoond. Toon anders de waarde *Beste relatie*.

Formele aanhef
--------------

Indien je geadresseerden formeel wilt aanspreken dien je ook het
geslacht (M/V) van je relaties te weten:

-   Geachte heer De Vries,
-   Geachte mevrouw Putjes,
-   Geachte heer Van der Sloot,

Geachte {if \$Geslacht=="Man"}heer {elseif \$Geslacht=="Vrouw"}mevrouw
{/if} {if \$Tussenvoegsel}{\$Tussenvoegsel|lower|ucfirst}{/if} {if
\$Achternaam}{\$Achternaam}{else}relatie{/if},

Er wordt dus rekening gehouden met het geslacht van de relatie, en of
deze persoon wel of geen tussenvoegsel heeft in de naam. Wanneer er
helemaal geen achternaam beschikbaar is, wordt niet verder
gepersonaliseerd, en *Geachte relatie* als aanhef getoond.

[Meer over voorwaarden in
personalisatie](http://www.copernica.com/nl/ondersteuning/personalisatie-uit-een-profiel-of-subprofiel "Personalisatie uit een profiel of subprofiel")

Opmaak van personalisatie
-------------------------

Het kan voorkomen dat gegevens in je database onderling qua hoofdletter
gebruik van elkaar afwijken, of gegevens helemaal ontbreken. Gelukkig
zijn er in Smarty speciale filterfuncties beschikbaar om deze
afwijkingen correct af te vangen.

### lower

Dit filter wordt gebruikt om alle hoofdletters te verwijderen.

Als de variabele {\$Naam|lower} de waarde heeft: **'Karel APPEL'**, dan
zorgt de code {\$Naam|lower} ervoor dat wordt weergegeven: **'karel
appel'**

### ucfirst

Dit filter zorgt ervoor dat het eerste karakter uit een string
(tekenreeks) een hoofdletter wordt.

Als de variabele {\$Naam|ucfirst} de waarde heeft: '**hans**' dan zal
het volgende in het document komen te staan: **Hans**

De filters kunnen ook worden gecombineerd:

Als de variabele {\$Tussenvoegsel} de waarde 'VAN dER' heeft, dan zal
door het toevoegen van de twee filters {\$Tussenvoegsel|lower|ucfirst}
de waarde ‘Van der’ in het document komen te staan.

[Meer smarty filters en
toepassingen](http://www.copernica.com/nl/ondersteuning/opmaak-van-smarty-personalisatie-smarty-filters "Opmaak van smarty personalisatie (Smarty filters)")

### Initialen afvangen

Je wilt personaliseren met *Beste Voornaam*,

Echter, nu wil het geval dat je van sommige relaties alleen de
voorletters hebt. Het resultaat zal dan zijn: Beste B.R.,

Dit staat natuurlijk een beetje slordig. Er is gelukkig een manier om
dit af te vangen:

`Beste {if $Voornaam|count_sentences < 1}{$Voornaam}{else}klant{/if},`

*count\_sentences* is een smarty functie die het aantal zinnen in een
reeks tekens telt op basis van het aantal gevonden punten(.). De
bovenstaande voorwaarde kijkt of het aantal punten in de waarde kleiner
is dan 1 (dus nul). Indien dit het geval is wordt de voornaam getoond.
Anders wordt *'klant'* getoond.

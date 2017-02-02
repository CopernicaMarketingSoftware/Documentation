# Hoe maak je een gepersonaliseerde aanhef?

Met behulp van smarty code kan je op vrij eenvoudige wijze je
nieuwsbrief van een persoonlijke noot voorzien. In dit artikel leer je
hoe je met behulp van Smarty de aanhef van het document voor iedere ontvanger 
passend kunt maken.

Let op: **test de mailing grondig** voordat je deze definitief gaat
versturen. Maak een selectie in de database met hierin verschillende
testprofielen die alle situaties uit jouw database dekken. Dus
man/vrouw, gebruik grote en kleine letters door elkaar, tussenvoegsels
en dergelijke.

## Een eenvoudige informele aanhef

Wanneer je van al je relaties de voornaam weet kan je de aanhef
gemakkelijk personaliseren door te verwijzen naar het veld waarin de
voornaam is opgeslagen. In dit voorbeeld het veld *Voornaam*

`Beste {$Voornaam|escape},`

Echter, een ontvanger die zonder voornaam in de database staat moet natuurlijk
ook goed worden aangesproken. Je wilt niet dat er beste-spatie-komma boven
de mail komt te saan. Om dit te voorkomen, doet je het volgende:

`{if $Voornaam != ""}Beste {$Voornaam|escape}{else}Beste relatie{/if},`

Vrij vertaald: als in het veld *Voornaam* een waarde is gevonden, dan
wordt deze waarde getoond. Toon anders de waarde *Beste relatie*.

## Formele aanhef

Indien je geadresseerden formeel wilt aanspreken dien je ook het
geslacht (M/V) van je relaties te weten:

-   Geachte heer De Vries,
-   Geachte mevrouw Putjes,
-   Geachte heer Van der Sloot,

'Geachte {if $Achternaam == ""}relatie{else}{if $Geslacht=="Man"}heer {else}mevrouw {/if} {if $Tussenvoegsel}{$Tussenvoegsel|lower|ucfirst|escape}{/if} {$Achternaam|escape}{/if},'

Er wordt dus rekening gehouden met het geslacht van de relatie en of deze persoon 
wel of geen tussenvoegsel heeft in de naam. Wanneer er helemaal geen achternaam 
beschikbaar is wordt er niet gepersonaliseerd en wordt *Geachte relatie* als 
aanhef getoond.

Ook is het interessant om te zien hoe de [Smarty modifiers](./personalization-modifiers.md) 
worden gebruikt. De |lower modifier wordt eerst gebruikt om alle letters van het 
tussenvoegsel naar *lowercase* (kleine letters) om te zetten, en daarna wordt de 
|ucfirst modifier gebruikt om de eerste letter weer om te zetten naar een hoofdletter.
Natuurlijk worden alle variabelen tenslotte door de |escape modifier gehaald om
misbruik te voorkomen.


## Initialen afvangen

Je wilt personaliseren met *Beste Voornaam*, Echter, voor sommige relaties staan
alleen de voorletters in de database. Het resultaat zal dan zijn: Beste B.R., Dit
staat natuurlijk een beetje slordig. Er is gelukkig een manier om dit af te vangen:

`Beste {if $Voornaam|count_sentences < 1}{$Voornaam|escape}{else}klant{/if},`

*count_sentences* is een smarty modifier die het aantal zinnen in een reeks tekens
telt op basis van het aantal gevonden punten(.). De bovenstaande voorwaarde kijkt 
of het aantal punten in de waarde kleiner is dan 1 (dus nul). Indien dit het geval
is wordt de voornaam getoond, anders "klant".

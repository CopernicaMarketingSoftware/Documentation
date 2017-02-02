# Werken met datums in Smarty

Klinkt een beetje raar misschien, datums, en we weten zelf ook wel dat het
meervoud van datum eigenlijk anders is. Maar voor programmeurs is *datums* wel 
lekker duidelijk. Hoe kan je een personaliseren op basis van tijd?

Als je personaliseert kun je altijd de {$smarty.now} variabele gebruiken. Dit
is een variabele die altijd beschikbaar is, en het huidige tijdstip bevat. 

 van Smarty, kun je dynamisch
datums en tijden tonen in emailings, landingspagina's en dergelijke.

**Enkele toepassingen:**

-   Toon automatisch het huidige weeknummer of maand bovenaan een
    nieuwsbrief
-   Stuur het tijdstip van invullen automatisch mee in een webformulier
-   Sluit een enquete automatisch nadat de uiterste invuldatum is
    verstreken

Om een datum (in seconden sinds 1970) te tonen gebruik je
`{$smarty.now}`.

Met de `date_format` modifier kun je vervolgens de seconden omzetten
naar een ander formaat.

Voorbeeld: om de huidige datum om te zetten naar het formaat YYYY-MM-DD
dat je kunt opslaan in een datumveld gebruik je:

`{$smarty.now|date_format:"%Y-%m-%d"}`

Hieronder zie je een aantal voorbeelden:

    {$smarty.now|date_format}              // Dec 4, 2014
    {$smarty.now|date_format:"%D"}          // 12/04/14
    {$smarty.now|date_format:"%d-%m-%Y"}    // 04-12-2014
    {$smarty.now|date_format:"%A, %e %B %Y"}// Tuesday, 4 december 2014
    {$smarty.now|date_format:"%A"}          // Tuesday
    {$smarty.now|date_format:"%c"}          // Tu 04 dec 2014 15:20:28 CET

Een volledige lijst van mogelijkheden kun je vinden op de [officiele
documentatie van
Smarty](http://www.smarty.net/docsv2/en/language.modifier.date.format.tpl).

### Datums in andere taal en tijdzone tonen

Een datum wordt automatisch weergegeven in de taal en tijdzone van het
template of document. Om de weergavetaal van personalisatie te bekijken,
kies je linksonderaan de template of document
**Personalisatie-instellingen**.

### Morgen, overmorgen en de dag daar weer na

Is je actie slechts een dag geldig? Smarty voorziet hierin.

`{"tomorrow"|date_format:"%A, %B %e, %Y"}`

Overmorgen:

`{"+2 days"|date_format:"%A, %B %e, %Y"}`

Enzovoorts...

### Timestamp vs smarty.now

Naast `{$smarty.now}` kun je ook gebruik maken van `{$timestamp}`.
Timestamp berekent het aantal seconden die zijn verstreken sinds de UNIX
epoch tijd (middennacht 1970-01-01 00:00:00 UTC). In tegenstelling tot
smarty.now, die standaard gebruik maakt van de locale 0000-00-00.
Timestamp is nuttig als je te maken hebt met verschillende tijdzones.
Het kan nu 13u00 zijn in Nederland. In Amerika pas over 7 uur. Het
aantal seconden verstreken sinds 1970-01-01 00:00:00 UTC is echter een
vast gegeven, en dus tijdzone onafhankelijk.

### Datums vergelijken

Het is mogelijk om condities te maken waarin je bijvoorbeeld datums in
een database met elkaar vergelijkt.

`{if $order_date < $invoice_date} ...do something.. {/if}`

De datums moeten natuurlijk wel in hetzelfde formaat zijn opgeslagen om
de vergelijking te doen.

Op deze wijze kun je ook formulieren, enquetes tonen op basis van de
huidige tijd:

    {*De enquete mag niet meer worden ingevuld na 25 maart 2017*}

    {capture assign="currentDate"}{$smarty.now|date_format:"%Y-%m-%d"}{/capture}
    {capture assign="endDate"}2017-03-25{/capture}
    {if $currentDate < $endDate}
       {survey name="jouw enquete"}
    {else}
        Helaas, het invullen van deze enquete is niet meer mogelijk 
    {/if}

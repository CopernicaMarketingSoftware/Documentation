# Werken met datums in Smarty

Naast de standaard profielvariabelen om te personaliseren heb je in templates
en documenten ook altijd toegang tot de variabele {$smarty.now}. In deze variabele
staat het huidige tijdstip, en kan je gebruiken om bijvoorbeeld een automatische 
copyrighttekst onderaan je berichten te plaatsen, die gegarandeerd het huidige 
jaartal toont. Maar er kan veel meer:

* Toon automatisch het huidige weeknummer of maand bovenaan een nieuwsbrief
* Stuur het tijdstip van invullen automatisch mee in een webformulier
* Sluit een enquete automatisch nadat de uiterste invuldatum is verstreken


## Smarty modifiers

De variabele {$smarty.now} bevat het huidige tijdstip op een manier die voor
computers erg handig is, maar die door mensen nooit wordt gebruikt: de tijd
is opgeslagen als het aantal seconden sinds 1 januari 1970, Greenwich time. 
Het heeft daarom niet zo veel zin om de variabele {$smarty.now} direct in een 
mailing op te nemen: er zou dan een heel groot getal in je bericht staan.

Mensen werken op een heel andere manier met tijd dan computers. Mensen werken
met jaren, maanden en dagen. Als je wilt personaliseren op basis van de tijd
moet je daarom het tijdstip dat is opgeslagen in de {$smarty.now} variabele
omzetten naar een representatie die voor mensen is te begrijpen. Dit kun je
doen door gebruik te maken van een [Smarty modifier](personalization-modifiers):
|date_format.

Met de |date_format modifier kun je een tijdstip in secondennotatie (zoals
computers meestal gebruiken) omzetten naar een ander weergave. Hieronder zie
je een aantal voorbeelden: 

    {$smarty.now|date_format:"%Y-%m-%d"}        // 2014-12-04
    {$smarty.now|date_format}                   // Dec 4, 2014
    {$smarty.now|date_format:"%D"}              // 12/04/14
    {$smarty.now|date_format:"%d-%m-%Y"}        // 04-12-2014
    {$smarty.now|date_format:"%A, %e %B %Y"}    // Tuesday, 4 december 2014
    {$smarty.now|date_format:"%A"}              // Tuesday
    {$smarty.now|date_format:"%c"}              // Tu 04 dec 2014 15:20:28 CET

Een volledige lijst van mogelijkheden kun je vinden op de [officiele
documentatie van Smarty](http://www.smarty.net/docsv2/en/language.modifier.date.format.tpl).


## Taal en tijdzone

De |date_format modifier zet een tijdstip om naar een voor een mensen begrijpelijke
weergave. De wijze waarop dit gebeurt geef je aan in de opmaakstring die direct
achter de modifier staat. De variabele "%A" kun je gebruiken om de naam van 
de huidige dag te tonen, en %b voor de naam van de maand, enzovoort. Maar
de maanden en dagen van de week hebben in elke taal andere namen. Hoe zit dat?

Bij de [personalisatieinstellingen](./personalization-settings.md) van een template 
of document (in de oude Publisher omgeving staan die onderaan het scherm als je 
een template of document bewerkt) kun je instellen wat de taal en timezone is die 
bij de template of het document hoort. De |date_format modifier kijkt naar deze 
instelling om te bepalen of de variabele %A moet worden vervangen door monday, 
maandag of Montag.

Voor de timezone geldt iets soortgelijks. Als je het huidige tijdstip in een mailing
of op een website wilt tonen, is maar net de vraag welke tijd je daarvoor wilt 
gebruiken. De huidige tijd volgens Amsterdam, Tokyo of New York? De date_format
modifier gebruikt de timezone instelling om dit te bepalen.


## Morgen, overmorgen en de dag daarna

De |date_format modifier is best slim. Je kunt hem niet alleen gebruiken om de
{$smarty.now} variabele om te zetten naar een leesbare tijd- of datumstring, 
maar ook om allerlei andere datums te tonen. Is je actie slechts een dag geldig?

    De actie is geldig tot en met {"tomorrow"|date_format:"%A, %B %e, %Y"}

Of overmorgen:

    De actie is twee dagen geldig en loopt af op {"+2 days"|date_format:"%A, %B %e, %Y"}

Enzovoorts...


## Datums vergelijken

Het is mogelijk om *if* statements te maken waarin je bijvoorbeeld datums in
een database met elkaar vergelijkt. Als je de datums of tijdstippen in de database
opslaat op zodanig wijze dat ze makkelijk met elkaar zijn te vergelijken, dan
kun je heel makkelijk in vergelijkingen gebruiken:

    {if $order_date < $invoice_date}
    
    {/if}

Op deze wijze kun je ook formulieren, enquetes tonen op basis van de
huidige tijd:

    {* De enquete mag niet meer worden ingevuld na 25 maart 2017 *}

    {capture assign="currentDate"}{$smarty.now|date_format:"%Y-%m-%d"}{/capture}
    {capture assign="endDate"}2017-03-25{/capture}
    {if $currentDate < $endDate}
       {survey name="jouw enquete"}
    {else}
        Helaas, het invullen van deze enquete is niet meer mogelijk 
    {/if}

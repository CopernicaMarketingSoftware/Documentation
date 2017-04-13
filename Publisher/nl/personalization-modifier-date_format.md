# Personalizatie modifier: *date_format*

De *date_format* modifier formatteert een datum en tijd volgens een gegeven 
formaat. Als je niet bekend bent met de verschillende formaten waarmee de 
strftime() functie van PHP werkt kun je [hier](http://php.net/manual/en/function.strftime.php) 
klikken voor meer informatie.

## Parameters

De *date_format* modifier heeft twee parameters. De eerste parameter 
is het formaat om te gebruiken en de standaardwaarde is %b %e %Y. De 
tweede parameter is de datum die gebruikt moet worden als er in de variabele 
geen datum staat. Er is geen standaardwaarde voor deze parameter.

## Voorbeeld

Laten we zeggen dat het 1 April 2020 is. Je kunt zelf een dag instellen 
om te formatteren, maar we gebruiken in dit voorbeeld `$smarty.now` om 
simpelweg de huidige dag te pakken. Laten we wat formaten uitproberen:

    {$smarty.now|date_format}
    {$smarty.now|date_format:"%D"}
    {$smarty.now|date_format:"%A, %B %e, %Y"}

De output ziet eruit als volgt:

    April 1, 2020
    04/01/2020
    Wednesday, April 1, 2020

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [string_format modifier](./personalization-modifiers-string_format)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.date.format.tpl).

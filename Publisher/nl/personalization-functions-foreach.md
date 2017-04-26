# Personalizatie functies: foreach

De *foreach* functie kan gebruikt worden om bijvoorbeeld over arrays 
met data te loopen. Je kunt *foreach* loops ook in elkaar plaatsen. Het aantal 
iteraties wordt altijd bepaald door de lengte van de array of een integer 
voor een arbitraire hoeveelheid iteraties.

De enige beschikbare parameter is **nocache** die caching kan voorkomen 
in de *foreach* loop als deze op "True" staat.

## Eigenschappen

Een iterator heeft een aantal eigenschappen:

* **index**: Huidige index in array
* **iteration**: Huidige loop iteratie, begint op 1
* **first**: Boolean, alleen TRUE op eerste iteratie
* **last**: Boolean, alleen TRUE op laatste iteratie
* **show**: Boolean, alleen TRUE als data weergegeven wordt
* **total**: Totaal aantal iteraties dat uitgevoerd gaat worden

## Voorbeeld

Als we een array met waardes hebben, in dit geval definiëren we *information*, 
kunnen we hierover loopen en allerlei operaties uitvoeren. In dit geval 
houden we het simpel en printen we slechts de inhoud als tekst. De array 
wordt gemaakt met de [capture functie](./personalization-functions-capture).

    {capture append="information"}{assign "name" "Bob"}{$age}, {\capture}
    {capture append="information"}{assign "age" "25"}{$age}, {\capture}
    {capture append="information"}{assign "location" "the Netherlands"}{$age}{\capture}

    {foreach $information as $text}{$text}{/foreach}
    
De output van deze code is:

`Bob, 25, the Netherlands`
    
We kunnen ook de andere eigenschappen van de iterator gebruiken:

    {foreach $information as $text}
        {if $text@index eq 3}
            End of the list,
        {\if}
        {$text@index}, 
    {/foreach}
    
Hier printen we de index van elk item en een berichtje voor we de laatste 
printen. De output zoet er als volgt uit:

`1, 2, End of the list, 3`
    
## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)
* [Capture functie](./personalization-functions-capture).

# Personalizatie modifier: *lower*

De *lower* modifier kan gebruikt worden om alle karakters in een zin 
om te zetten in kleine letters.

## Voorbeeld

Stel dat we een `$sentence` hebben die "Ik BeN eEn IrRiTaNtE zIn." bevat. 
We kunnen deze dan in kleine letters omzetten met de modifier.

    {$sentence}
    {$sentence|lower}

De output ziet eruit als volgt:

    Ik BeN eEn IrRiTaNtE zIn.
    ik ben een irritante zin.
    
Als je echter wel graag je zin met een hoofdletter zou beginnen kun je 
hierna de [capitalize modifier](./personalization-modifiers-capitalize) 
gebruiken.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [capitalize modifier](./personalization-modifiers-capitalize)
* [upper modifier](./personalization-modifiers-upper)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.lower.tpl).

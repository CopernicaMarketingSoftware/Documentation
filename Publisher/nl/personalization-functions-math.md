# Personalizatie functies: math

De *math* functie maakt het mogelijk om wiskunde vergelijkingen uit te voeren 
in de template. Dit is echter een computationaal zware functie die sneller 
is in PHP. Het wordt niet aangeraden deze functie in loops te gebruiken.

## Parameters

De volgende parameters worden ondersteund:

| Parameter naam | Omschrijving                           |
|---------------|-----------------------------------------|
| equation      | Vergelijking om uit te voeren           |
| format        | Formaat voor resultaat                  |
| var           | Vergelijking variabele waarde           |
| assign        | Variabele voor opslaan resultaat        |
| \[var ...\]   | Waarden voor variabelen in vergelijking |

Als je een formule gebruikt als `$a * $b` moeten de variabelen $a en $b 
eerst gedefinieerd worden voordat we ermee kunnen rekenen.

## Ondersteunde operatoren

De ondersteunde operatoren zijn +, -, /, *, abs, ceil, cos, exp, floor, 
log, log10, max, min, pi, pow, rand, round, sin, sqrt, srans and tan.

## Voorbeelden

Een simpele vergelijking:

    {assign "height" 2}
    {assign "width" 3}
    {math equation="x * y" x=$height y=$width}
    
Deze code wordt gebruikt om het resultaat van x * y uit te rekenen, wat 6 is in 
dit geval. Dit is maar een simpele vergelijking, maar je kunt deze zo ingewikkeld 
maken als je zelf wil. Dit voorbeeld gebruikt daarnaast de [assign functie](./personalization-functions-assign) 
in de korte versie.

Als we een breuk uit willen rekenen echter is het handiger om decimalen 
weer te geven. We willen dit resultaat ook opslaan, zodat we "1.33" krijgen 
als we `{$frac}` in de template typen.

    {assign "height" 1}
    {assign "width" 3}
    {math equation="1 + x / y" assign="frac" format="%.2f" x=$height y=$width}
    
## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)

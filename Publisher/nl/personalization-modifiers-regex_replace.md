# Personalizatie modifier: *regex_replace*

De *regex_replace* modifier kan met reguliere expressie een substring 
opzoeken en vervangen in een gegeven variabele.

Wil je geen regex gebruiken maar wel woorden vervangen? Gebruik dan de 
[replace modifier](./personalization-modifiers-replace).

## Parameters 

De modifier heeft twee parameters. De eerste is de reguliere expressie 
waar op gezocht moet worden. De tweede parameter is de string die in 
de plaats van de match met de regex moet komen te staan.

## Voorbeeld

Laten we zeggen dat we een gebruikers biografie hebben die we willen 
verwerken op een vrij brede pagina. We willen dus alle line breaks en tabs 
vervangen door spaties om het mooi te laten passen. Eerst definiëren 
we de biografie:

    <?php

    $smarty->assign('biography', "Hello, I'm John Doe.\nI am 42 years old.\n I like cars.");

    ?>
    
We gebruiken dan de volgende code om te vervangen:

    {$biography}
    {$biography|regex_replace:"/[\n\t\]/":" "}

De output ziet eruit als volgt:

    Hello, I'm John Doe.
    I am 42 years old.
    I like cars.
    Hello, I'm John Doe. I am 42 years old. I like cars.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [(standaard) replace modifier](./personalization-modifiers-replace)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.regex.replace.tpl).

# Personalizatie modifier: *spacify*

De *spacify* modifier kan gebruikt worden om een spatie of andere string 
te plaatsen tussen elk karakter in de variabele. Deze heeft slechts een 
parameter: de string om mee te vervangen. Standaard is dit een enkele spatie.

## Voorbeeld

Laten we zeggen dat we een `$name` "John" hebben, die we wat verder willen 
spreiden of decoreren. We kunnen de volgende code gebruiken om dit te doen:

    {$name}
    {$name|spacify}
    {$name|spacify:"***"}

De output ziet eruit als volgt:

    John
    J o h n
    J***o***h***n

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.spacify.tpl).


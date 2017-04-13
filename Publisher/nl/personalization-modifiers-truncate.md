# Personalizatie modifier: *truncate*

De *truncate* modifier kort een variabele in tot een gegeven lengte.

## Parameters

| Parameter position | Default | Description                                                   |
|--------------------|---------|---------------------------------------------------------------|
| 1                  | 80      | Lengte voor afgekorte string                                  |
| 2                  | ...     | Text string om einde aan te duiden (inclusief in lengte)      |
| 3                  | false   | Afkorten bij woord einde (false) of exact karakter (true)     |
| 4                  | false   | Afkorten bij einde string (false) of in het midden (true)     |

## Voorbeeld

Laten we zeggen dat we een biografie waar we een preview van willen geven. 
We kunnen *truncate* gebruiken om deze wat in te korten. We definiëren 
eerst de biografie.

    <?php
    $smarty->assign('biography', 'Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and writing biographies on myself.');
    ?>
    
Enkele manieren om in te korten:

    {$biography}
    {$biography|truncate}
    {$biography|truncate:30:"...":true}
    {$biography|truncate:30:'..':true:true}

De output ziet eruit als volgt:

    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and writing biographies on myself.
    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and...
    Hello, I'm John. John Doe. I a...
    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and writing biographies on myself.
    Hello, I'm Joh..ies on myself.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.truncate.tpl).

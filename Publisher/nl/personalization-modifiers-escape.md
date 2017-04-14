# Personalizatie modifier: *escape*

De *escape* modifier is een belangrijke. Als je niet automatisch je 
variabelen escapet moet je altijd elke variabele escapen waarvan je de 
inhoud niet weet. Anders kan het namelijk voorkomen dat er Javascript code 
instaat van mensen met slechte intenties, die een hoop schade aan kunnen 
brengen aan jouw data.

## Parameters

| Parameter positie  | Mogelijke waarden                                                          | Default            | Description                                         |
|--------------------|----------------------------------------------------------------------------|--------------------|-----------------------------------------------------|
| 1                  | html, htmlall, url, urlpathinfo, quotes, hex, hexentity, javascript, mail  | html (recommended) | Escape formaat om te gebruiken                      |
| 2                  | Karakter sets ondersteund door [htmlentities](http://php.net/htmlentities) | UTF-8              | Karakter encodering set meegeven aan htlmentities() |
| 3                  | true/false                                                                 | true               | Dubbel encoderen (alleen html/htmlall)              |

Dit lijken misschien veel mogelijke waarden, maar in het algemene geval kun je de default gebruiken.

## Voorbeeld

Om informatie beschikbaar te maken definiëren we het volgende:

    <?php

    $smarty->assign('articleTitle',
                    "'Stiff Opposition Expected to Casketless Funeral Plan'"
                    );

    ?>
    
Om de variabele te escapen gebruiken we de volgende code:

    {$articleTitle}
    {$articleTitle|escape}

De output ziet eruit als volgt:

    'Stiff Opposition Expected to Casketless Funeral Plan'
    &#039;Stiff Opposition Expected to Casketless Funeral Plan&#039;

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.escape.tpl).

# Personalizatie modifier: *nl2br*

De *nl2br* modifier zet line breaks "\n" om in HTML "<br /r>" tags in 
de variabele die gemodificeerd wordt.

## Voorbeeld

Stel dat we een biografie hebben van een gebruiker die we om willen 
zetten naar hoe zij deze hebben ingevoerd. We gebruiken dan *nl2br* om 
de line breaks om te zetten naar HTML tags. Eerst definiëren we de 
biografie.

    <?php

    $smarty->assign('biography',
                    "Hello, I'm John Doe.\nI am 42 years old and like cars."
                    );

    ?>
    
We zetten de tags om met de volgende code:

    {$biography}
    {$biography|nl2br}

De output ziet eruit als volgt:

    Hello, I'm John Doe.
    I am 42 years old and like cars.
    Hello, I'm John Doe.<br />I am 42 years old and like cars.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.nl2br.tpl).

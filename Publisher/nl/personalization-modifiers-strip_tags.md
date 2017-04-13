# Personalizatie modifier: *strip_tags*

De *strip_tags* modifier kan gebruikt worden om markup tags weg te halen. 
Dit is grofweg alles dat tussen \< en > staat. Er is slechts een parameter. 
Als deze op "true" staat worden tags vervangen door een spatie (standaard), 
maar als deze op "false" staat wordt deze vervangen met niets.

## Voorbeeld

Laten we zeggen dat je een gebruiker hebt die HTML heeft geprobeerd te 
gebruiken in zijn biografie. Je wil deze niet invoegen in je mail, dus 
je gaat *strip_tags* gebruiken om de HTML weg te halen. Eerst initializeren 
we de biografie:

    <?php

    $smarty->assign('biography',
                    "Hello I'm <font face=\"helvetica\">John</font>. I like <b>cars</b>."
                   );

    ?>
    
We gebruiken de volgende code om de tags weg te halen:

    {$biography}
    {$biography|strip_tags}
    {$biography|strip_tags:false}

De output ziet eruit als volgt:

    Hello I'm <font face=\"helvetica\">John</font>. I like <b>cars</b>.
    Hello I'm  John . I like  cars .
    Hello I'm John. I like cars.


## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.strip.tags.tpl).

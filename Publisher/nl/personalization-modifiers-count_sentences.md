# Personalizatie modifier: *count_sentences*

De *count_sentences* modifier heeft het aantal zinnen van een variabele 
als output. Een zin wordt gedefinieerd door de aanwezigheid van een 
punt, vraagteken of uitroepteken. (.?!)

## Voorbeeld

Laten we eerst een tekst definiëren om de zinnen van te tellen:

    <?php

    $smarty->assign('text',
                     'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                     );

    ?>
    
We tellen de zinnen met de volgende code:

    {text}
    {text|count_sentences}

De output ziet eruit als volgt:

    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    2

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [count_characters modifiers](./personalization-modifiers-count_characters)
* [count_words modifiers](./personalization-modifiers-count_words)
* [count_paragraphs modifiers](./personalization-modifiers-count_paragraphs)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.count.sentences.tpl).

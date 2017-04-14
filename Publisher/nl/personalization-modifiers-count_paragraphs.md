# Personalizatie modifier: *count_paragraphs*

De *count_paragraphs* modifier kan gebruikt worden om het aantalen 
paragrafen in een string te tellen. De modifier heeft geen parameters.

## Voorbeeld

Laten we eerst een artikel definiëren om de paragrafen van te tellen:

    <?php

    $smarty->assign('article',
                     "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n\n
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n\n
                     Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \n\n
                     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." \n\n
                    );

    ?>
    
Met de volgende code krijgen we het aantal paragrafen:

    {$article}
    {$article|count_paragraphs}

De output ziet eruit als volgt:

    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    4

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [count_characters modifiers](./personalization-modifiers-count_characters)
* [count_words modifiers](./personalization-modifiers-count_words)
* [count_sentences modifiers](./personalization-modifiers-count_sentences)

Deze modifier staat ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.count.paragraphs.tpl).

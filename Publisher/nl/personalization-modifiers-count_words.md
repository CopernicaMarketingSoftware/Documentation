# Personalizatie modifier: *count_words*

De *count_words* modifier kan gebruikt worden om het aantal woorden in 
een variabele weer te geven.

## Voorbeeld

Laten we zeggen dat we een lijst met interesses hebben die geformatteerd 
zijn als een string en we het aantal interesses daarin willen tellen. 
We moeten eerst de lijst met interesses definiëren:

    <?php

    $smarty->assign('interests', 'football, soccer, tennis, racing, music');

    ?>
    
We kunnen de volgende code gebruiken om de woorden te tellen:

    {$interests}
    {$interests|count_words}

De output ziet eruit als volgt:

    football, soccer, tennis, cars, music
    5

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [count_characters modifiers](./personalization-modifiers-count_characters)
* [count_sentences modifiers](./personalization-modifiers-count_sentences)
* [count_paragraphs modifiers](./personalization-modifiers-count_paragraphs)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.count.words.tpl).

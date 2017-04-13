# Personalizatie modifier: *replace*

De *replace* modifier zoekt naar een string in de variabele en vervangt 
deze door een andere gegeven string. Beide moeten meegegeven worden aan 
de modifier, met de zoekstring eerst. Deze parameters hebben geen 
standaardwaarden.

Als je liever regex wilt gebruiken kun je beter de [regex_replace modifier](./personalization-modifiers-regex_replace) 
gebruiken.

## Voorbeeld

We kunnen *replace* gebruiken om woorden te vervangen door een synoniem 
of heel ander woord, of om bijvoorbeeld leestekens te vervangen. Laten 
we eerst een zin definiëren.

    <?php

    $smarty->assign('sentence', "I  am a  messy  sentence.");

    ?>

Door twee *replace* modifiers samen te gebruiken kunnen we deze zin 
netter maken:

    {$sentence}
    {$sentence|replace:"  ":" "|replace:"messy":"neat"}

De output ziet eruit als volgt:

        I  am a  messy  sentence.
        I am a neat sentence.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)
* [regex_replace modifier](./personalization-modifiers-regex_replace)

Je vindt deze modifier ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.replace.tpl).

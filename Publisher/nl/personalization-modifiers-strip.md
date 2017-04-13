# Personalizatie modifier: *strip*

De *strip* modifier kan gebruikt worden om alle spaties, line breaks en tabs 
om te zetten in elke spaties of een andere gegeven string. De enige parameter 
is de string waar je de whitespace door wilt vervangen.

## Voorbeeld

Laten we eerst een stuk text definiëren om te bewerken.

    <?php
    $smarty->assign('biography', "Hello,\n I'm John. \t John Doe.\nI am 42 years old.\n I like cars. \t and sports.");
    ?>
    
De code om de whitespace weg te halen:

    {$biography}
    {$biography|strip}
    {$biography|strip:"*"}

De output ziet eruit als volgt:

    Hello,
    I'm John.    John Doe.
    I am 42 years old.
    I like cars.    and sports.
    Hello, I'm John. John Doe. I am 42 years old. I like cars. and sports.
    Hello*I'm*John.*John*Doe.*I*am*42*years*old.*I*like*cars.*and*sports.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Je vindt deze modifier ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.strip.tpl).

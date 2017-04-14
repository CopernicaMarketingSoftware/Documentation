# Personalizatie modifier: *wordwrap*

De *wordwrap* modifier kan gebruikt worden om een string naar kolom breedte 
om te zetten.

## Parameters

De *wordwrap* modifier heeft drie parameters. De eerste is de breedte van 
de kolom, die bepaalt hoe breed een regel is. Deze staat standaard op 80 
kolommen.
De tweede parameter is de string om de regel mee af te sluiten, deze 
staat standaard op de line break "/n".
De derde parameter bepaalt of er aan het einde van een woord (false) 
een nieuwe regel moet beginnen of op het exacte karakter (true). 

## Voorbeeld

Laten we zeggen dat we een biografie hebben die we aan de breedte van 
onze mail aan willen passen. We definiëren eerst de biografie.

    <?php

    $smarty->assign('biography',
                    "Hello, I'm John. John Doe. I am 42 years old. I like cars, sports and dogs."
                   );

    ?>
    
Hierna gebruiken we *wordwrap* om te formatteren:

    {$biography}
    {$articleTitle|wordwrap:20}
    {$articleTitle|wordwrap:30:"\<br />\n":true}
    
De output ziet er als volgt uit:

    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports and dogs.
    Hello, I'm John. 
    John Doe. I am 42 
    years old. I like 
    cars, sports and 
    dogs.
    Hello, I'm John. John Doe. I a<br />
    m 42 years old. I like cars, s<br />
    ports and dogs.
    
## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.wordwrap.tpl).

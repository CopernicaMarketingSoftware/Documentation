# Personalizatie modifier: *indent*

De *indent* modifier indenteert een string op elke regel.

## Parameters

Deze functie heeft twee parameters. De eerste is de hoeveelheid karakters 
die gebruikt moet worden om mee te indenteren. De tweede parameter is het 
karakter waarmee geindenteerd moet worden. De standaard voor deze functie 
is om voor elke regel 4 enkele spaties te gebruiken.

## Voorbeeld

In dit voorbeeld laten we zien hoe je kunt indenteren met spaties, tabs (/t) 
en het ster symbool *. Eerst definiëren we een tekst:

    <?php

    $smarty->assign('text',
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                    );
    ?>
    
We gebruiken de volgende code om de indents te maken:

    {$text}
    {$text|indent}
    {$text|indent:4:*}
    {$text|indent:1:"/t"}

De output ziet eruit als volgt:

    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        
    ****Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    ****Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie modifiers](./personalization-modifiers)

Deze modifier vindt je ook in de [Smarty documentatie](http://www.smarty.net/docs/en/language.modifier.indent.tpl).

# Personalization modifier: *indent*

The *indent* modifier indents a string on each line. There are two parameters: 
The first is the amount of characters to indent to, the second is the character 
used to indent with. The default is 4 characters with the one space character.

## Example

In this example we indent using the normal space, the tab character (/t) and 
the star symbol *. First we assign some text to indent.

    <?php

    $smarty->assign('text',
                    'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                    );
    ?>
    
We use the following code:

    {$text}
    {$text|indent}
    {$text|indent:4:*}
    {$text|indent:1:"/t"}

The output looks like this:

    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        
    ****Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
    ****Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.indent.tpl).

# Personalization modifier: *strip*

The *strip* modifier replaces all spaces, newlines and tabs with a single 
space or supplied string.

## Example

First let's assign a piece of text we want to strip. In this case we initialize 
a biography.

    <?php
    $smarty->assign('biography', "Hello,\n I'm John. \t John Doe.\nI am 42 years old.\n I like cars. \t and sports.");
    ?>
    
The code to strip:

    {$biography}
    {$biography|strip}
    {$biography|strip:"*"}
    
The output looks like this:

    Hello,
    I'm John.    John Doe.
    I am 42 years old.
    I like cars.    and sports.
    Hello, I'm John. John Doe. I am 42 years old. I like cars. and sports.
    Hello*I'm*John.*John*Doe.*I*am*42*years*old.*I*like*cars.*and*sports.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.strip.tpl).

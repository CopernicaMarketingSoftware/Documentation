# Personalization modifier: *nl2br*

The *nl2br* converts the new line breaks "\n" to HTML "<br /r>" tags in 
the given variable.

## Example

Let's say we have a user biography and we want to format the paragraphs 
the same way they did. Then we use the *nl2br* to convert the line breaks. 
First let's assign a biography.

    <?php

    $smarty->assign('biography',
                    "Hello, I'm John Doe.\nI am 42 years old and like cars."
                    );

    ?>
    
Then we can convert the line break with the following code:

    {$biography}
    {$biography|nl2br}
    
The output looks like this:

    Hello, I'm John Doe.
    I am 42 years old and like cars.
    Hello, I'm John Doe.<br />I am 42 years old and like cars.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.nl2br.tpl).

# Personalization modifier: wordwrap

The *wordwrap* modifier can be used to wrap a string to a column width.

## Variables

The *wordwrap* modifier has three parameters. The first is the column width 
that determines how many columns to wrap to. This is set to 80 columns by 
default. 
The second parameter is the string to wrap words with. This is set to the 
line break "/n" by default.
The third parameter determines whether or not to wrap at word boundary 
(false, default) or at the exact character (true).

## Example

We have a biography we want to put in our mail, but it is somewhat too long. 
Let's first assign the biography.

    <?php

    $smarty->assign('biography',
                    "Hello, I'm John. John Doe. I am 42 years old. I like cars, sports and dogs."
                   );

    ?>
    
Now let's use wordwrap to format the text:

    {$biography}
    {$articleTitle|wordwrap:20}
    {$articleTitle|wordwrap:30:"\<br />\n":true}
    
The output looks like this:

    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports and dogs.
    Hello, I'm John. 
    John Doe. I am 42 
    years old. I like 
    cars, sports and 
    dogs.
    Hello, I'm John. John Doe. I a<br />
    m 42 years old. I like cars, s<br />
    ports and dogs.
    
## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.wordwrap.tpl).

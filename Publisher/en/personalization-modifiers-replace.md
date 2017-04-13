# Personalization modifier: *replace*

The *replace* modifier searches for a string in a variable and replaces 
it with another string. Both have to be passed to the modifier, with the 
search string first. These parameters do not have defaults.

If you would rather use a regular expression you can read the documentation 
on the [regex_replace modifier](./personalization-modifiers-regex_replace).

## Example

We can use this to replace words with synonyms or entirely different words, 
or for example to replace double spaces by single spaces. First let's 
initialize a sentence to work with.

    <?php

    $smarty->assign('sentence', "I  am a  messy  sentence.");

    ?>

By chaining together two *replace* modifiers we can clean up the 
sentence above.

    {$sentence}
    {$sentence|replace:"  ":" "|replace:"messy":"neat"}
    
The output looks like this:

        I  am a  messy  sentence.
        I am a neat sentence.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [regex_replace modifier](./personalization-modifiers-regex_replace)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.replace.tpl).

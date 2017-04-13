# Personalization modifier: count_words

The *count_words* modifier can be used to display the amount of words 
in a variable.

## Example

Let's say we got a long list of interests formatted as a string and 
we want to display the amount of interests. First let's initialize the 
string of interests:

    <?php

    $smarty->assign('interests', 'football, soccer, tennis, racing, music');

    ?>
    
We can now use the following code to display the amount of words:

    {$interests}
    {$interests|count_words}
    
The output will look like this:

    football, soccer, tennis, cars, music
    5

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [count_characters modifiers](./personalization-modifiers-count_characters)
* [count_sentences modifiers](./personalization-modifiers-count_sentences)
* [count_paragraphs modifiers](./personalization-modifiers-count_paragraphs)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.count.words.tpl).

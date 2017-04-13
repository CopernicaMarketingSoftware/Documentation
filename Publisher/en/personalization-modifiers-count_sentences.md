# Personalization modifier: count_sentences

The *count_sentences* modifier outputs the amount of sentences, which is 
defined by the presence of a dot, question- or exclamation-mark. (.?!)

## Example

First let's assign some sentences to count.

    <?php

    $smarty->assign('text',
                     'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                     );

    ?>
    
Now let's count the sentences with the following code:

    {text}
    {text|count_sentences}

The output looks like this:

    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    2

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [count_characters modifiers](./personalization-modifiers-count_characters)
* [count_words modifiers](./personalization-modifiers-count_words)
* [count_paragraphs modifiers](./personalization-modifiers-count_paragraphs)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.count.sentences.tpl).


    
    

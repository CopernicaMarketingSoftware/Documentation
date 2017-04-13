# Personalization modifier: *count_paragraphs*

The *count_paragraphs* modifier counts the amount of paragraphs in a variable. 
The modifier itself does not have any parameters.

## Example

First let's assign a paragraph:

    <?php

    $smarty->assign('article',
                     "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \n\n
                     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. \n\n
                     Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. \n\n
                     Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." \n\n
                    );

    ?>

We use the following code to output the number of paragraps:

    {$article}
    {$article|count_paragraphs}
    
The output looks like this:

    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
    
    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    4

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [count_characters modifiers](./personalization-modifiers-count_characters)
* [count_words modifiers](./personalization-modifiers-count_words)
* [count_sentences modifiers](./personalization-modifiers-count_sentences)

This modifier can also be found in the [Smarty Documentation]().

# Personalization modifier: *count_characters*

The *count_characters* modifier can be used to display the amount of 
characters in a string instead of the string itself. It has one boolean 
as a parameter that determines whether or not to count whitespace as 
a character. By default it is set to "false".

## Example

The amount of characters in a string can be displayed as follows. Let's 
say we have a $name that is set to "John Doe". We can now count the 
characters in his name with the *count_characters* modifier.

    {$name}
    {$name|count_characters}
    {$name|count_characters:true}
    
The code outputs the following:

    John Doe
    7
    8
    
The latter number includes the white space between "John" and "Doe" as 
a character, while the first one does not.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [count_words modifiers](./personalization-modifiers-count_words)
* [count_sentences modifiers](./personalization-modifiers-count_sentences)
* [count_paragraphs modifiers](./personalization-modifiers-count_paragraphs)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.count.characters.tpl).

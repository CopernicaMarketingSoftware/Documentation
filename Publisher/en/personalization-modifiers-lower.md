# Personalization modifier: lower

The *lower* modifier can be used to convert all characters in a variable 
to lowercase.

## Example

Let's say we have a $sentence set to "I aM a VeRy AnNoYiNg SeNtEnCe". We can 
convert to lowercase using the *lower* modifier.

    {$sentence}
    {$sentence|lower}
    
The output looks like this:

    I aM a VeRy AnNoYiNg SeNtEnCe
    i am a very annoying sentence
    
If you would like to capitalize the sentence normally you may find the 
article on [the capitalize modifier](./personalization-modifiers-capitalize) 
interesting.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [capitalize modifier](./personalization-modifiers-capitalize)
* [upper modifier](./personalization-modifiers-upper)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.lower.tpl).

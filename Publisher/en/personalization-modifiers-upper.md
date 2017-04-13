# Personalization modifier: *upper*

The *upper* modifier can be used to convert all characters in a variable 
to uppercase.

## Example

Let's say we have a $sentence set to "I aM a VeRy AnNoYiNg SeNtEnCe". We can 
convert to uppercase using the *upper* modifier.

    {$sentence}
    {$sentence|upper}
    
The output looks like this:

    I aM a VeRy AnNoYiNg SeNtEnCe
    I AM A VERY ANNOYING SENTENCE
    
If you would like to capitalize the sentence normally you may find the 
article on [the capitalize modifier](./personalization-modifiers-capitalize) 
interesting.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [capitalize modifier](./personalization-modifiers-capitalize)
* [lower modifier](./personalization-modifiers-lower) 

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.upper.tpl).

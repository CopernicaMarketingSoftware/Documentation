# Personalization modifier: *ucfirst*

The *ucfirst* modifier can be used to convert the first character of 
a string to uppercase. However, it leaves the other characters unchanged. 
If you want to have **only** the first character you should apply the 
[lower modifier](./personalization-modifiers-lower) first.

Note: This only applies to alphabetic characters. 
'alphabetic' is determined by the current locale. 
For instance, in the default "C" locale characters such as umlaut-a (ä) will not be converted. 

## Example

We have a $sentence "would Bob like an apple?". We can use the modifier in the 
code like this:

    {$sentence}
    {$sentence|ucfirst}
    {$sentence|lower|ucfirst}
    
The output looks like this:

    would Bob like an apple?
    Would Bob like an apple?
    Would bob like an apple?

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

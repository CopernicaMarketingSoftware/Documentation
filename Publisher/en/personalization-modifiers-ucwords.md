# Personalization modifier: *ucwords*

The *ucwords* modifier can be used to convert the first character of 
each word in a string to uppercase. However, it leaves the other characters unchanged. 
If you want to have **only** the first characters of the words in uppercase you should apply the 
[lower modifier](./personalization-modifiers-lower) first.

Note: This only applies to alphabetic characters. 
'alphabetic' is determined by the current locale. 
For instance, in the default "C" locale characters such as umlaut-a (ä) will not be converted. 

## Example

We have a $sentence "wOuld Bob like an apple?". We can use the modifier in the 
code like this:

    {$sentence}
    {$sentence|ucwords}
    {$sentence|lower|ucwords}
    
The output looks like this:

    wOuld Bob like an apple?
    WOuld Bob Like An Apple?
    Would Bob Like An Apple?

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

# Personalization modifier: *capitalize*

The *capitalize* modifier can be used to capitalize the first letter of 
all words in a variable. This is very useful for capitalizing titles or names.

## Parameters

The *capitalize* modifier has two booleans. They do not have a name, but 
are assigned according to the assigned order. The first boolean determines 
whether or not words with digits will be uppercased. The second determines 
whether or not capital letters within words should be lowercased, so only 
the first letter is capitalized. The default value for both is "false".

## Example

We can now use this modifier to properly format names. Let's say the 
`$name` variable is currenly set to "john DOE x2". The following examples 
will demonstrate the different versions of capitalize.

    {$name}
    {$name|capitalize}
    {$name|capitalize:true}
    {$name|capitalize:false:true}
    {$name|capitalize:true:true}
    
This prints the name first and then the name with the different versions 
of the *capitalize* modifier. The output looks like this:

    john DOE x2
    John DOE x2
    John DOE X2
    John Doe x2
    John Doe X2

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [upper modifier](./personalization-modifiers-upper)
* [lower modifier](./personalization-modifiers-lower)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifiers.tpl#language.modifier.capitalize).

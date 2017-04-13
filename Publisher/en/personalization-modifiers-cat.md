# Personalization modifier: *cat*

The *cat* modifier accepts a string and concatenates it to the variable it 
modifies. Instead of a string you may also pass a variable, if it contains 
a string.

## Example

Let's say we want to concatenate the first and last name, which are 
initialized as $firstname and $lastname respectively. We can use the *cat* 
modifier to achieve this with the following example:

    {$firstname|cat:$lastname}

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.cat.tpl).

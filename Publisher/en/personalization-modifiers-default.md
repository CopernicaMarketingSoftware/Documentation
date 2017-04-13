# Personalization modifier: *default*

The *default* modifier can be used to set a default value for a variable. 
Personalized greetings are very popular, but not all customers might have 
entered their name in your database. This is one of the cases where the 
*default* modifier is very useful.

The modifier only needs the string to use as a default. By default this 
string is empty, causing the missing variable to be replaced by empty space.

## Example

Let's make a personalized greeting using this modifier. We are using 
the $name variable, which is not initialized.

    Dear {$name},
    Dear {$name|default},
    Dear {$name|default:"customer"},
    
The output looks like this:

    Dear  ,
    Dear  ,
    Dear customer,
    
In the first case we simply print the name, which doesn't exist. Then we 
try to print the name, but default to the empty string "". In the last case 
we replace the $name variable by "customer" if the name of the customer is 
unknown.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.default.tpl).

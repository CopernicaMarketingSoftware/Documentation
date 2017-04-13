# Personalization modifier: *spacify*

The *spacify* modifier can be used to place a space or other character 
between every character of a variable. It has one parameter, which is the 
string to replace with. This is a single space by default.

## Example

Let's say we have a $name "John" that we would like to space out or 
decorate. We can use the following code to do so:

    {$name}
    {$name|spacify}
    {$name|spacify:"***"}
    
The output looks like this:

    John
    J o h n
    J***o***h***n

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation]().

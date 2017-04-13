# Personalization modifier: *string_format*

The *string_format* formats strings such as decimal numbers. The only 
parameter is the format to use, which can be described using the syntax 
of the php function [sprintf](http://php.net/sprintf).

## Example

Let's say we have calculated the $percentage "45.4930" and we want to 
display this nicely. We can use the following code to format the string.

    {$percentage}
    {$percentage|string_format:"%.2f"}
    {$percentage|string_format:"%d"}
    
The output looks like this:

    45.4930
    45.50
    45

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [date_format modifier](./personalization-modifiers-date_format)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.string.format.tpl).

# Personalization modifier: *date_format*

The *date_format* modifier formats a date and time to a given format (strftime() in php). 
If you are not familiar with these date formats you can find these in the 
[strftime() PHP documentation](http://php.net/manual/en/function.strftime.php).

## Parameters

The *date_format* modifier has two parameters. The first parameter is the 
format to use and the default value is %b %e %Y. The second parameter is 
the date to default to when no date is provided in the variable. There is 
no default date for the default parameter.

## Example

Let's say it is the first of April in 2020. You may assign a day, but if 
you want to use the current day `$smarty.now` can be called to use it. 
Now let's try some formats:

    {$smarty.now|date_format}
    {$smarty.now|date_format:"%D"}
    {$smarty.now|date_format:"%A, %B %e, %Y"}
    
The output looks like this:

    April 1, 2020
    04/01/2020
    Wednesday, April 1, 2020

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.date.format.tpl).

# Personalization modifier: *regex_replace*

The *regex_replace* performs regular expression search and replacement on 
a variable. The modifier has two parameters: The first is the regular 
expression to search for, the second is the string of text to replace with.
If you want to just replace full words you can also use the [replace modifier](./personalization-modifiers-replace).

## Example

Let's say we have a user bio that we want to fit on a wide page. The user 
might have used a lot of new lines that we want to remove to fit the page better. 
First we assign the bio:

    <?php

    $smarty->assign('biography', "Hello, I'm John Doe.\nI am 42 years old.\n I like cars.");

    ?>
    
We use the following code to replace all tabs and new lines with a space.

    {$biography}
    {$biography|regex_replace:"/[\n\t\]/":" "}
    
The output looks like this:

    Hello, I'm John Doe.
    I am 42 years old.
    I like cars.
    Hello, I'm John Doe. I am 42 years old. I like cars.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)
* [(regular) replace modifier](./personalization-modifiers-replace)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.regex.replace.tpl).

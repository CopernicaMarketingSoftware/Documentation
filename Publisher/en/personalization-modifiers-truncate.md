# Personalization modifier: *truncate*

The *truncate* modifier truncates a variable to a character length.

## Parameters

| Parameter position | Default | Description                                                   |
|--------------------|---------|---------------------------------------------------------------|
| 1                  | 80      | Determines how many characters to truncate to                 |
| 2                  | ...     | Text string to replace truncated text (included in length)    |
| 3                  | false   | Truncate at a word boundary (false) or exact character (true) |
| 4                  | false   | Truncate at end of string (false) or in the middle (true)     |

## Example

Let's say we have a biography that we want to preview in a set amount of 
characters. We can use the *truncate* modifier to do this. First let's set 
the biography.

    <?php
    $smarty->assign('biography', 'Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and writing biographies on myself.');
    ?>

A few examples of how to do this in code:

    {$biography}
    {$biography|truncate}
    {$biography|truncate:30:"...":true}
    {$biography|truncate:30:'..':true:true}
    
The output looks like this:

    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and writing biographies on myself.
    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and...
    Hello, I'm John. John Doe. I a...
    Hello, I'm John. John Doe. I am 42 years old. I like cars, sports, dogs and writing biographies on myself.
    Hello, I'm Joh..ies on myself.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.truncate.tpl).

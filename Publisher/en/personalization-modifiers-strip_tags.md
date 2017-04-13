# Personalization modifier: *strip_tags*

The *strip_tags* modifier strips out markup tags, which is roughly everything 
between \< and >. It has one parameter: Its default is true, which causes 
tags to be replaced with a space. If set to false it is replaced with nothing 
(deleted).

## Example

Let's say you have a user that tried to use HTML markup in their bio, which 
you do not want to include in your email to them. You can use the *strip_tags* 
modifier to remove this markup. First we initialize the bio.

    <?php

    $smarty->assign('biography',
                    "Hello I'm <font face=\"helvetica\">John</font>. I like <b>cars</b>."
                   );

    ?>
    
We use the following code to strip the tags:

    {$biography}
    {$biography|strip_tags}
    {$biography|strip_tags:false}
    
The output looks like this:

    Hello I'm <font face=\"helvetica\">John</font>. I like <b>cars</b>.
    Hello I'm  John . I like  cars .
    Hello I'm John. I like cars.

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.strip.tags.tpl).

# Personalization modifier: *escape*

The *escape* modifier is an extremely important one. If auto-escaping is not 
turned on in your template you should always escape every variable you do 
not know the content of. The main danger of unescaped variables is people 
entering JavaScript for harmful purposes, which you can neutralize with 
this modifier.

## Parameters

| Parameter position | Possible values                                                           | Default            | Description                                     |
|--------------------|---------------------------------------------------------------------------|--------------------|-------------------------------------------------|
| 1                  | html, htmlall, url, urlpathinfo, quotes, hex, hexentity, javascript, mail | html (recommended) | Escape format to use                            |
| 2                  | Character sets supported by [htmlentities](http://php.net/htmlentities)   | UTF-8              | Character encoding set passed to htlmentities() |
| 3                  | true/false                                                                | true               | Double encode (html/htmlall only)               |

These parameters may seem complicated, but the default case is good enough 
for most purposes.

## Example

To assign the information we use the following code:

    <?php

    $smarty->assign('articleTitle',
                    "'Stiff Opposition Expected to Casketless Funeral Plan'"
                    );

    ?>

The code to escape variables looks like this:

    {$articleTitle}
    {$articleTitle|escape}

The output looks like this:

    'Stiff Opposition Expected to Casketless Funeral Plan'
    &#039;Stiff Opposition Expected to Casketless Funeral Plan&#039;

## More information

* [Personalization](./personalization)
* [Personalization modifiers](./personalization-modifiers)

This modifier can also be found in the [Smarty Documentation](http://www.smarty.net/docs/en/language.modifier.escape.tpl).

Your database may contain typing errors or style errors. Especially if
some of it is added through web forms (user input). For example some
people will type their last name all in capitals, others will forget to
capitalize at all. \
To ensure that your data looks neat in mailings you can style the
variables in a document using smarty variable modifiers.

Variable modifiers can be applied to variables, custom functions (smarty
3) or strings. To apply a modifier, specify the value followed by a |
(pipe) and the modifier name. A modifier may accept additional
parameters that affect its behaviour. These parameters follow the
modifier name and are separated by a : (colon).

More information and a complete list of available smarty modifiers can
be found at the [Smarty website](http://www.smarty.net/docsv2/en/language.modifiers "Smarty modifiers")

### Capitals

#### Filter: capitalize

The Capitalize filter capitalizes the first letter of each word in a
text. For example {\$Name} with value 'johan van der sloot' would become
{\$Name|capitalize} and become 'Johan Van Der Sloot'. \
Words with numbers in them are not capitalised, unless the parameter
'true' is added: {\$Model|capitalize} will be 'z3', \
 {\$Model|capitalize:true} will be 'Z3'.

#### Filter: lower

**This filter is used to remove all capitals, similar to the PHP
strtolower() function.**

-   The variable {\$Name} with value: 'Karel APPEL'
-   Will become {\$Name|lower} and 'karel appel'
-   (You can combine this value with capitalize or ucfirst:
    `{$Surname|lower|capitalize}` will become: 'Karel Appel'.)

#### Filter: upper

All letters will be capitalized.

#### Concatenation

The "cat" modifier appends a literal string, passed as a parameter, to
the value.

    {$name|cat:", don't forget to bring some booze"}

    result: Walter, don't forget to bring some booze

### Combining smarty modifiers

Smarty modifiers can be combined:

`   {$articleTitle}   {$articleTitle|upper|spacify}   {$articleTitle|lower|spacify|truncate}   {$articleTitle|lower|truncate:30|spacify}   {$articleTitle|lower|spacify|truncate:30:".  . ."}     `

### Finding a needle in the haystack

Lets say, you have a field products, in which you store different
products, seperated by a comma.

And you want to return all profiles that have bought a toaster, you can
use the **strstr** modifier. Given the following example:

     {capture assign="products"}toaster, bike, teddy bear, bludgeon{/capture}
        {if $products|strstr:"toaster"}
            Has toaster
        {else}
            Hasn't purchased a toaster
        {/if}

This will return 'Has toaster'

More information and a complete list of available smarty modifiers can
be found at the [Smarty
website](http://www.smarty.net/docsv2/en/language.modifiers "Smarty modifiers")

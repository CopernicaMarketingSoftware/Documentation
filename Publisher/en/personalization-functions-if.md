# Personalization functions: if

With the *if* function it is possible to make conditional statements and 
adjust content based on any avaible information (profile field and profile 
interests are very useful for example). It is also possible to use `{elseif}` 
and `{else}` or nest *if* statements.

## Qualifiers

The following table show the qualifiers that are supported by this function.

| Symbol     | Syntax           | Description          |
|------------|------------------|----------------------|
| ==         | $a eq $b         | equals               |
| !=         | $a ne/neq $b     | not equals           |
| >          | $a gt $b         | greater              |
| \<         | $a lt $b         | smaller              |
| >=         | $a gte/ge $b     | greater than         |
| \=         | $a lte/le $b     | smaller than         |
| ===        | $a === 0         | check for identity   |
| !          | not $a           | negation             |
| %          | $a mod $b        | modulous             |
| is div by  | $a is div by $b  | divisible by         |
| is even    | $a is even       | is even              |
| is even by | $a is even by $b | grouping level even  |
| is odd     | $a is odd        | is odd               |
| is odd by  | $a is odd by $b  | grouping level odd   |

It is also possible to use "or" or "and" to make longer conditions.

## Examples

    {if $name eq 'Fred' or $name eq 'Wilma'}
       ...
    {/if}
    
    {if isset($name) && $name == 'Blog'}
        {* do something *}
    {elseif $name == $foo}
        {* do something *}
    {/if}

## More information

* [Personalization](./personalization)
* [Personalization functions](./personalization-functions)

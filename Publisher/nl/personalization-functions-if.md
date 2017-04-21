# Personalizatie functies: if

Met de *if* function is het mogelijke conditionele uitdrukkingen te maken 
en inhoud te plaatsen op basis van beschikbare informatie. Profiel en subprofiel 
velden zijn hier heel nuttig, bijvoorbeeld. Het is ook mogelijk om `{elseif}` 
en `{else}` te gebruiken of *if* statements in elkaar te plaatsen.

## Qualifiers

De volgende qualifiers zijn beschikbaar om expressies te maken voor de if functie:

| Symbol     | Syntax           | Description           |
|------------|------------------|-----------------------|
| ==         | $a eq $b         | gelijk                |
| !=         | $a ne/neq $b     | ongelijk              |
| >          | $a gt $b         | groter dan            |
| \<         | $a lt $b         | kleiner dan           |
| >=         | $a gte/ge $b     | groter dan            |
| \=         | $a lte/le $b     | kleiner dan           |
| ===        | $a === 0         | identiek              |
| !          | not $a           | negatie               |
| %          | $a mod $b        | modulair              |
| is div by  | $a is div by $b  | deelbaar door         |
| is even    | $a is even       | is even               |
| is even by | $a is even by $b | grouping level even   |
| is odd     | $a is odd        | is oneven             |
| is odd by  | $a is odd by $b  | grouping level oneven |

Het is ook mogelijk expressies aan elkaar te schakelen met 'and' en 'or'.

## Voorbeelden

    {if $name eq 'Fred' or $name eq 'Wilma'}
       ...
    {/if}
    
    {if isset($name) && $name == 'Blog'}
        {* doe een ding *}
    {elseif $name == $foo}
        {* doe een ander ding *}
    {/if}

## Meer informatie

* [Personalizatie](./personalization)
* [Personalizatie functies](./personalization-functions)

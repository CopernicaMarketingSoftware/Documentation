# Personalization
Emails created with the MS template editor can of 
course be personalized with data about your subscribers. For example to start 
your email with `Hi James`, instead of `Hi Mr or Miss Anonymous`.

To write and process personalization, we use our own inhouse created [SmartTPL](https://github.com/CopernicaMarketingSoftware/SMART-TPL), 
which has a syntax based on the widely known [Smarty Templating Engine](http://www.smarty.net/). 

## Where can I use personalization?
You can include personalization code in the email template itself, and in all 
input fields that have that dollar sign ($) on the right.

Documentation about our SmartTPL Personalization engine is in the making, 
but since the syntax is 99% similar to Smarty personalization, you can also take
a look at our [old documentation](https://www.copernica.com/en/blog/personalize-campaigns).

Do note that unlike in the old environment, the new template editor requires you to always
specify if the personalization is referring to a profile or subprofile. This means that
instead of `{$FirstName}` you will have to write `{$Profile.FirstName}`. Subprofile data can be accessed by adding `{$subprofile.FieldName}` to your personalization. 

## SmartTpl Syntax
The syntax of SmartTpl is extremely similar to Smarty, for starters there are multiple
ways to show variables, depending on the variables of course.

### Variables

{$foo}             <-- displaying a simple variable (non array/object)
{$foo[4]}          <-- display the 5th element of a zero-indexed array
{$foo.bar}         <-- display the "bar" key value of an array, you'll most likely use this to access profile data

Many other combinations are allowed

{$foo.bar.baz}     <-- display the value behind the key "baz" inside the array "bar" which is a part of $foo
{$foo[4].baz}      <-- display the value behind the key "baz" inside the 5th element of $foo
{$foo.bar.baz[4]}  <-- display the 5th element of baz, which is in bar which is in $foo
{"foo"}            <-- static values are allowed

### Math
When we're talking about simply outputing variables we can also do some simple math with them.
Just like outputing variables, all math should be done within {} brackets. So you can do for
example the following. ```{$var + 10}``` Besides just that, all standard math rules apply.

### If statements
If statements in SmartTpl have the same flexibility as they have in Smarty. All the
common operators are allowed to be used inside if statements, a complete list of these follows.

| Syntax example | Meaning                                       |
|----------------|-----------------------------------------------|
| $a == $b       | Equals                                        |
| $a != $b       | Not equals                                    |
| $a > $b        | Greather than                                 |
| $a >= $b       | Greather than or equal                        |
| $a < $b        | Less than                                     |
| $a <= $b       | Less than or equal                            |
| not $a         | Negation, will invert the boolean value of $a |
| $a % $b        | Modulous                                      |

Of course you can also have multiple statements inside a single if statement, using the
or and and operators. Meaning you can actually have statements like
```{if $a >= $b and $b <= $c}true{else}false{/if}```.

### Foreach
The foreach statement is used to loop over arrays. The syntax of this is fairly straight forward.
```
{foreach $item in $list}
  {$item.name}
{/foreach}
```
This will loop over the items in $list and assign them to $item in each iteration, inside this
foreach block you can do with it whatever you want. Of course we also support looping over arrays
that have non standard keys.
```
{foreach $list as $key => $value}
  Key {$key} contains {$value}.
{/foreach}
```
As you can see here, you now specify both a $key and a $value which will be used to store these
values on each iteration. And finally, sometimes you want certain code to execute if there is no
data at all, this is done using the {foreachelse} statement.
```
{foreach $item in $list}
  {$item.name}
{foreachelse}
  No items in list.
{/foreach}
```
This foreachelse statement is only executed in case of no data, it is completely ignored otherwise.

### Assigning
You can assign values on runtime. You can for example use this to calculate the total price of a
set of items that were bought. Or remember a certain item in a foreach statement. Assigning is simply
done like ```{assign $item to $topitem}```. After this statement the variable $topitem is available and it will
contain what $item contained at the time. This will allow you to do things like the following.
```
{foreach $item in $list}
  {assign $total + $item.price to $total}
  {if $item.price > $topitem.price}
    {assign $item to $topitem}
  {/if}
{/foreach}
```
Which will eventually have the most expensive item in the $topitem variable. And the total price in $total.

### Modifiers
Sometimes the value of a variable is just not the thing you want, you may want to slightly
change it. For this SmartTpl supports modifiers, modifiers are applied using the | syntax.
So you'll get expressions like ```{$name|ucfirst}```. A list of all the supported modifiers
is shown below.

| Modifier name    | Meaning                                                                              |
|------------------|--------------------------------------------------------------------------------------|
| toupper/upper    | Change all the letters to uppercase.                                                 |
| tolower/lower    | Change all the letters to lowercase.                                                 |
| count_words      | Counts the amount of words inside the input string.                                  |
| count_characters | Counts the amount of characters inside the input string.                             |
| count_paragraphs | Counts the amount of paragraphs inside the input string.                             |
| nl2br            | Change all the newlines into <br /> tags so that they will be understood in html.    |
| strlen           | Counts the amount of characters inside a string.                                     |
| count            | Counts the amount of items inside an array.                                          |
| empty            | Returns if we're an empty string or not.                                             |
| ucfirst          | Change the first letter to a captial letter.                                         |

Modifiers don't just stop there, some modifiers actually can take parameters. The syntax for this looks
like the following. ```{$description|truncate:200:"...."}``` where truncate is the modifier and 200 and "...."
are parameters. A list with all the modifiers that take parameters (and what they do) is shown below.

| Modifier name   | Parameters | Meaning |
|-----------------|------------|---------|
| cat             | Additional input | Appends all the parameters to the input. |
| default         | The value which will be applied if the input is empty. | Apply a default value in case of empty input. |
| ident           | First parameter should contain the amount of idents it should place, the second parameter the indent itself, which will default to a single space. | Ident the original input a bit. |
| replace         | Replace occurences of the first parameter with the value of the second parameter. | Replace occurences. |
| regex_replace   | The first parameter should be a regex, the second parameter will the replacement. | Replace based on regex matches. |
| substr          | First parameter is the starting location of the sub string, the second parameter the length (optional). | Take a sub string of a string. |
| range           | In case of 1 parameter the parameter is the start position and it'll continue till the end. In case of 2, the second parameter is the length of the range. | Select a certain range of an array. |
# Personalization

Emails created with the template editor can be personalized 
with data about your subscribers, meaning that each subscriber will see the 
email tailored with (or based on) his personal information, interests and history. 
For instance, a subscriber named John may read _Hi John_ above the email and may see content
that is entirely different from what Jane sees and reads (who -unlike John- happens to be 
a women, and has -unlike John- no interest in buying John Deere tracktor magazines).

Personalization is added to your email designs by including variables. These 
variables usually refer to a field in the subscribers database. But variables can also
hold information that is not direclty linked to a subscriber, such as a date, for automatically 
displaying the current week number or year in the email. 

If you have previously written email personalization, or even did 
more advanced coding before, you will know that many programming languages exist, serving 
different purposes and having different syntaxes. The syntax used in the Marketing Suite 
is based on the widely known [Smarty Templating Engine](http://www.smarty.net/), which is a PHP based templating engine that was once very popular, and was also used in the predecessor of the Marketing Suite (Copernica Publisher).

This article will dive into the basics needed to know to create email designs with tailored content. 

## Where can email personalization be applied 

An email basically consists of 3 parts. The email header contains (among many other things)
information about the sender, subject and the receiver of the email. Then there is the text version (a plain text 
version automatically sent along with the email). But most importantly of course the email itself. 
Personalization can be used in all three of them. 

Inside the Marketing Suite, you will recognize personalization friendly fields by the 
dollar sign ($) on the right hand side of the field.

## Basic syntax

A variable name is a string of characters, prefixed with `$profile.`* and surrounded by 
curly braces (the mustaches next to the P character on your keyboard). Here are some facts about 
valid variables in the MarketingSuite. 

Basis syntax: 
[left curlybrace][dollar sign][profile or subprofile][dot][variable name][right curly brace]

- Starts with a dollar sign
- prefixed with profile or sometimes subprofile (see block below) 
- surrounded by curly braces
- may contain alphanumeric characters. May **not start** with a number. 
- may contain dash (-) and underscore (_) symbols. May **not start** with dash or underscore. 
- variables are case sensitive, meaning that {$profile.NAME} is different from {$profile.name}

If you have a column in your database with the name `email` and you want to show the 
email address of the subsriber in the email, you simply write {$profile.email}

### Profile or subprofile? 

You must always include the word profile or subprofile. But when to use which one? 

Most emails are sent direcly to a database, or a selection inside this database. If the email 
is sent to a database or selection, you always use `profile`.

Copernica also allows you to create extra layers of data inside the database: **collections**. 
Emails can also be sent to a collection, or a selection on the data in a collection (a **miniselection**). 

If you are sending to a miniselection, you must per variable specify if this variable is linked to 
a field in the database or a collection inside this database. If the field is part of the collection, you 
prefix the variabel with `subprofile`. For fields linked to the database, you use `profile`.

When sending to a collection (or miniselection), you always have access to the information in the parent database.
When sending to a database (or selection), you never have access to collections that exist inside this database.  




Do note that unlike in the old environment, the new template editor requires you to always
specify if the personalization is referring to a profile or subprofile. This means that
instead of `{$FirstName}` you will have to write `{$Profile.FirstName}`. Subprofile data can be accessed by adding `{$subprofile.FieldName}` to your personalization. 

## SmartTpl Syntax
The syntax of SmartTpl is extremely similar to Smarty, for starters there are multiple
ways to show variables, depending on the variables of course.

### Variables

| Syntax     | Meaning                                                                                      |
|------------|----------------------------------------------------------------------------------------------|
| {$foo}     | Displaying a simple variable (non array/object).                                             |
| {$foo[4]}  | Display the 5th element of a zero-indexed array.                                             |
| {$foo.bar} | Display the "bar" key value of an array, you'll most likely use this to access profile data. |

Many other combinations are allowed

| Syntax            | Meaning                                                                                |
|-------------------|----------------------------------------------------------------------------------------|
| {$foo.bar.baz}    | Display the value behind the key "baz" inside the array "bar" which is a part of $foo. |
| {$foo[4].baz}     | Display the value behind the key "baz" inside the 5th element of $foo.                 |
| {$foo.bar.baz[4]} | Display the 5th element of baz, which is in bar which is in $foo.                      |
| {"foo"}           | Static values are allowed.                                                             |

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
| truncate        | The first parameter is the amount of characters after which we should truncate. The second parameter contains the string we'll use to truncate. | Truncate a string. |
| cat             | Additional input | Appends all the parameters to the input. |
| default         | The value which will be applied if the input is empty. | Apply a default value in case of empty input. |
| ident           | First parameter should contain the amount of idents it should place, the second parameter the indent itself, which will default to a single space. | Ident the original input a bit. |
| replace         | Replace occurences of the first parameter with the value of the second parameter. | Replace occurences. |
| regex_replace   | The first parameter should be a regex, the second parameter will the replacement. | Replace based on regex matches. |
| substr          | First parameter is the starting location of the sub string, the second parameter the length (optional). | Take a sub string of a string. |
| range           | In case of 1 parameter the parameter is the start position and it'll continue till the end. In case of 2, the second parameter is the length of the range. | Select a certain range of an array. |

# Personalization

Emails created with the template editor can be personalized 
with data about your subscribers, meaning that each subscriber will see the 
email tailored with (or based on) his personal information, interests and history. 
For instance, a subscriber named John may read _Hi John_ above the email and may see content
that is entirely different from what Jane sees and reads (who -unlike John- happens to be 
a woman, and has -unlike John- no interest in buying John Deere tracktor magazines).

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
valid variables in the Marketing Suite. 

Basis syntax: 

[left curlybrace][dollar sign][profile or subprofile][dot][variable name][right curly brace]

- Starts with a dollar sign
- prefixed with profile or sometimes subprofile (see block below) 
- surrounded by curly braces
- may contain alphanumeric characters. May **not start** with a number. 
- may contain dash (-) and underscore (_) symbols. May **not start** with dash or underscore. 
- variables are case sensitive, meaning that `{$profile.NAME}` is different from `{$profile.name}`

If you have a column in your database with the name `email` and you want to show the 
email address of the subsriber in the email, you simply write `{$profile.email}`

### Profile or subprofile? 

You must always include the word profile or subprofile. But when to use which one? 

Most emails are sent direcly to a database, or a selection inside this database. If the email 
is sent to a database or selection, you always use `profile`.

Copernica also allows you to create extra layers of data inside the database: **collections**. 
Emails can also be sent to a collection, or a selection on the data in a collection (a **miniselection**). 

If you are sending to a miniselection, you must per variable specify if this variable is linked to 
a field in the database or a collection inside this database. If the field is part of the collection, you 
prefix the variable with `subprofile`. For fields linked to the database, you use `profile`.

- When sending to a collection (or miniselection), you always have access to the information in the parent database.
- When sending to a database (or selection), you never have access to collections that exist inside this database.  
Note: To improve readability, the profile and subprofile prefixes are left out in most
examples.


### All variable notations

| Syntax        | Meaning                                                                                          |
|---------------|--------------------------------------------------------------------------------------------------|
| {$foo}        | Displaying a simple variable (non array/object).                                                 |
| {$foo[4]} *   | Display the 5th element of a zero-indexed array.                                                 |
| {$foo.bar} *  | Display the "bar" key value of an array. You'll most likely use this to access profile data.     |

Many other combinations are allowed

| Syntax            | Meaning                                                                                |
|-------------------|----------------------------------------------------------------------------------------|
| {$foo.bar.baz}*   | Display the value behind the key "baz" inside the array "bar" which is a part of $foo. |
| {$foo[4].baz}*    | Display the value behind the key "baz" inside the 5th element of $foo.                 |
| {$foo.bar.baz[4]}*| Display the 5th element of baz, which is in bar which is in $foo.                      |
| {"foo"}           | Static values are allowed.                                                             |

(*) Currenly only available inside Magento Templates 

### Simple calculations

When you have a variables or multiple variables containing a numerical value you can do some simple math. 

Just like with normal variables, all math should be done within the {} brackets. So you can do for
example the following. ```{$var + 10}``` Besides just that, all standard math rules apply.

### Conditional statements

One of the key concepts of any programming language are conditional statements. 
Using conditionals you simply ask the computer to test multiple statements. The first 
one that evaluates true will be executed. The remaining statements (if any) will not be tested. 

A conditional block always starts with the 
`{if}` keyword (always with the curly braces) followed by the first statement that is
to be tested. A conditional block always ends with the if closing tag `{/if}`. 

In the next example, the text 'Hello John' is only displayed when the value of the variable `$name` 
is equal to 'john'.

`{if $name == 'john'}Hello John{/if}`

But what if there's also a Sarah in your mailing list. You wouldn't want to display 
nothing to her, wouldn't you? That's where the `{elseif}` becomes the protagonist. 

`{if $name == 'john'}Hello John{elseif $name == 'sarah'}Hello Sarah{/if}`

Now, if we want to say something to anyone except to John and Sarah, we 
will use the `{else}` keyword. The code after the `{else}` keyword will be 
executed if none of the preceeding statements returned `true`.

```
    {if $name == 'john'}
        Hello John
    {elseif $name == 'sarah'}
        Hello Sarah
    {else}
        Hello anybody else
    {/if}
```

This is of course a very bad example of how you should write your personal salutation,
because your conditional block would need to be as long as the list of all names in the world. 

A much better example would obviously be: 

```
    {if $name == ''}
        Dear subscriber,
    {else} 
        Dear {$name},
    {/if}
```
Human readable: if the value of name is empty, show 'Dear subscriber'. Otherwhise 
show Dear John (or Sarah).

In the preceeding example, the operator `==` was used, meaning 'is equal to'. This is 
just one of the many operators that you can use to test the statements. Here's the complete
list: 

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

### AND and OR operators

If you are writing conditional blocks, you will sometimes find yourself ending up 
with blocks that become too long or complex. To shorten long or more complex conditional blocks, you
can put multiple statements in one single `{if}` block using the `AND` and/or `OR` 
operators: 

```{if $a >= $b AND $b <= $c}true{else}false{/if}```

| Syntax example | Meaning                                       |
|----------------|-----------------------------------------------|
| AND (&&)       | Both statements must be true                  |
| OR (&#124;&#124;)        | One of both statements must be true           |

### Foreach

If you have a collection of data (an array), and want to see if a specific something is inside 
that collection, you'll have to loop through all the items in this collection. 

Or (in a real world example) you want to display all the soccer team members who are stored in the array `$soccerTeam`.   

To loop over collections of data, the **foreach statement** is used. The syntax of this is fairly straight forward.

```
    {foreach $player in $soccerTeam}
       {$player.name}
    {/foreach}
```

This will loop over the items (team members) in `$soccerTeam` and assign each player to the variable `$player` in 
each iteration. Inside this _foreach_ block you can do whatever you want with the outputted information. You can for
example generate a HTML list with soccer players from that team. 

It becomes a little bit more technical now... 

Of course we also support looping over arrays that have non-standard keys.

```
    {foreach $list as $key => $value}
       Key {$key} contains {$value}.
    {/foreach}
```

As you can see here, you specify both a `$key` and a `$value` which will be used to store these
values on each iteration. 

And finally, sometimes you want certain code to execute if there is no
data at all, this is done using the `{foreachelse}` statement.

```
    {foreach $item in $list}
       {$item.name}
    {foreachelse}
        No items in list.
    {/foreach}
```
This _foreachelse_ statement is only executed in case of no data. It is completely ignored otherwise.

### Assigning variables 

You can assign values on runtime. You can for example use this to calculate the total price of a
set of purchased items. Or to remember a certain item inside a _foreach_ statement. Assigning variables 
is done as follows:

```{assign $item to $topitem}``` 

After this statement the variable `$topitem` is available and it will
contain what `$item` contained when the email was being compiled and sent to the
user.

 This will allow you to do things like the following.

```
  {foreach $item in $list}
    {assign $total + $item.price to $total}
    {if $item.price > $topitem.price}
      {assign $item to $topitem}
    {/if}
  {/foreach}
```

Which will eventually have the most expensive item in the `$topitem` variable. And the total price in `$total`.

### Variable modifiers

Variable modifiers are handy tools that let you do all sorts of things with the 
raw output of a variable. Modifiers are applied directly on the variable using 
the pipe (|) character (right above your enter key on the keyboard). 

Example. When you have a subscribtion form, some people will write their name with capitals only
or without any capitals at all. However, when sending an email, you don't want to
say 'WALTER' in all caps. Here's where modifiers come in handy.  

```{$profile.name|tolower|ucfirst}```

The variable will now output 'Walter' in the email. The modifier `tolower` 
converts all characters to lowercase. The second
modifier `ucfirst` will finaly convert the first character to uppercase.

There are plenty of variable modifiers available:


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
| ucfirst          | Change the first letter to a capital letter.                                         |

Modifiers don't just stop there. No they go further and beyond.

Some modifiers actually can take parameters. The syntax for this looks
like the following: 

```{$description|truncate:200:"..."}``` 

where `truncate` is the modifier and `200` and `...` are parameters. If the variable
`$description` contains more than 200 characters, the text will be cut off, and an ellipsis 
will be ...

A complete list with all the modifiers that take parameters (and what they do) is shown below.

| Modifier name   | Parameters | Meaning |
|-----------------|------------|---------|
| truncate        | The first parameter is the amount of characters after which we should truncate. The second parameter contains the string we'll use to truncate. | Truncate a string. |
| cat             | Additional input | Appends all the parameters to the input. |
| default         | The value which will be applied if the input is empty. | Apply a default value in case of empty input. |
| indent           | First parameter should contain the amount of indents it should place, the second parameter the indent itself, which will default to a single space. | Indent the original input a bit. |
| replace         | Replace occurences of the first parameter with the value of the second parameter. | Replace occurences. |
| regex_replace   | The first parameter should be a regex, the second parameter will the replacement. | Replace based on regex matches. |
| substr          | First parameter is the starting location of the sub string, the second parameter the length (optional). | Take a sub string of a string. |
| range           | In case of 1 parameter the parameter is the start position and it'll continue till the end. In case of 2, the second parameter is the length of the range. | Select a certain range of an array. |

### Literals

We use the handlebars `{}` to tell the computer _'Hey, what follows is a variable or something else
related to email personalization, so treat me differently'._ 
But what if you want to use these handlebars for a different purpose. This might 
cause personlization errors. To prevent this, you can wrap your text inside literals.
Text inside a _literal_ block will be ignored by the parser en displayed as it is in the 
final email. 

Example: 

```
{literal}
  Look, my {} are growing vertically. It's a facial miracle!
  What {if} I rotate my face 45 deg?
{/literal}
```

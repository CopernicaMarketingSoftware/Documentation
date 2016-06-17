# Programming

This page gives a syntax overview for writing a template that can be used
to personalize your mail. Note that although the syntax is quite easy, you
can build complicated concepts, which brings the danger of bugs (heck, even
simple stuff can have bugs). Therefore, you should always test if the personalization
template is doing what you think it should do.


## Variables

Let's just start with the basics of printing a user supplied variable. This is
simply done by putting your [passed variables](personalization-data) in the source. A variable
starts with a `{$` than your variable name and is closes with a `}`
Formally the rules for a variable are:

* Starts with a dollar sign
* surrounded by curly braces
* may contain alphanumeric characters. May not start with a number.
* may contain dash (-) and underscore (_) symbols. 
* May not start with dash or underscore. 
* variables are case sensitive, meaning that {$NAME} is different from {$name}

The next table gives all variable notations:

| Syntax     | Meaning                                          |
| ---------- | ------------------------------------------------ |
| {$foo}     | Displaying a simple variable (non array/object). |
| {$foo[4]}  | Display the 5th element of a zero-indexed array. |
| {$foo.bar} | Display the "bar" key value of an array.         |

With these notaitions you may make combinations. Examples of combinations
are:

| Syntax            | Meaning                                                                                |
| ----------------- | -------------------------------------------------------------------------------------- |
| {$foo.bar.baz}    | Display the value behind the key "baz" inside the array "bar" which is a part of $foo. |
| {$foo[4].baz}     | Display the value behind the key "baz" inside the 5th element of $foo.                 |
| {$foo.bar.baz[4]} | Display the 5th element of baz, which is in bar which is in $foo.                      |
<!---
| {"foo"}           | Static values are allowed.                                                             |
@todo they don't work on modifiers.

The last example in the table is not a standard variable as discussed above.
You basically create a variable on the fly that holds the value you specify,
in this case the string "foo".
--->
If a variable happens to be an (associative)array where the index are keys,
you can still access elements in the array with an index number (starting
from 0).


## Modifying your variables

You can alter the content of your variables by applying modifiers to them.
E.g. you can capitalize the content, calculate the length of a string, or
calculating a hash sum. A list of all modifiers and an explanation about
their usage can be found [here](personalization-modifiers).


## Simple calculations

Variables containing a numerical value can be used to do some simple math.
Just like with normal variables, all math should be done within the {}
brackets. So you can do for example the following: 
```text
{$var + 10}
```
Besides the surrounding of curly braces, all standard math rules apply.
The standard math operators (`+`, `-`, `*`, `/`)  and the modulo operator (`%`)
are available. Note that if a value does not exists or does not contain a
numeric value, it will behave as the value zero. 


## Conditional statements

One of the key concepts of any programming language are conditional statements.
A conditional block always starts with the {if} keyword (always with the
curly braces) followed by the statement that is tested. A conditional
block always ends with the if closing tag {/if}. A conditional block is only
executed if the statement in the {if} part is true.

In the next example, the text 'Hello John' is only displayed when the value
of the variable $name is equal to 'john'. 

```text
{if $name == 'john'}Hello John{/if}
```

But what if there's also a Sarah in your mailing list. You wouldn't want
to display nothing to her, would you? That's where the {elseif} becomes
the protagonist.

```text
{if $name == 'john'}Hello John{elseif $name == 'sarah'}Hello Sarah{/if}
```

Now, if we want to say something to anyone except to John and Sarah, we
will use the {else} keyword. The code after the {else} keyword will be
executed if none of the preceeding statements returned true.

```text
    {if $name == 'john'}
        Hello John
    {elseif $name == 'sarah'}
        Hello Sarah
    {else}
        Hello anybody else
    {/if}
```

This is of course a very bad example of how you should write your personal
salutation because your conditional block would need to be as long as the
list of all names in the world.

A much better example would obviously be:

```text
    {if $name == ''}
        Dear subscriber,
    {else} 
        Dear {$name},
    {/if}
```

The code snippet above means: if the value of name is empty, show 'Dear
subscriber', otherwhise, show Dear John (or Sarah, or what is in the {$name}
variable).

In the preceeding example, the operator == was used. This operator means 'is equal to'.
It will evaluate to true if the left hand side of the `==` is exactly equal
to the right hand side. Operator `==` is just one of the many operators that
you can use to test the statements.
Here's the complete list:

| Syntax example | Meaning                                       |
| -------------- | --------------------------------------------- |
| $a == $b       | $a and $b are equal                           |
| $a != $b       | $a and $b are not equal                       |
| $a > $b        | $a is greather than $b                        |
| $a >= $b       | $a is greather than or equal to $b            |
| $a < $b        | $a is less than $b                            |
| $a <= $b       | $a is less than or equal to $b                |
| $a AND $b      | $a and $b are true                            |
| $a OR $b       | $a or $b (or both) are true                   |
| not $a         | Negation, will invert the boolean value of $a |


With the first six operators ("==" to "<=") you compare the the values
of variables $a and $b. If the comparison holds, a true will be returned.
If the comparison does not hold, you will get a false. With the next two
operators in the table above (`AND` and `OR`) you can combine statements.
If you are writing conditional blocks, you will sometimes find yourself
ending up with blocks that become too long or complex. To shorten long or
more complex conditional blocks, you can put multiple statements in one
single {if} block using the AND and/or OR operators. The AND and/or OR
operators combine the value of $a and $b into a true or a false. The
following tables give the rules.

The truth table for AND is:

| $a    | $b    | result |
| ----- | ----- | ------ |
| true  | true  | true   |
| true  | false | false  |
| false | true  | false  |
| false | false | false  |

The truth table for OR is:

| $a    | $b    | result |
| ----- | ----- | ------ |
| true  | true  | true   |
| true  | false | true   |
| false | true  | true   |
| false | false | false  |

E.g. you can use AND like:

```text
{if $a >= $b AND $b <= $c}true{else}false{/if}
```

In the above snippet first $a >= $b will be tested. Only if this is true,
$b <= $c will be tested. If this happens to be true as well, `true` will
be printed, else, `false` will be printed.

Subsequently there is the `not` operator. This operator will invert the value
that is given. So true becomes false and false becomes true. 
Finally it is good to know that a variable itself will be converted to a
boolean when used in an if statement. If the variable contains an empty string
or the value 0, it will be evaluated as false. If it is not an empty string
or not zero, it will be evaluated as true.


## Foreach

If you have a collection of data (an array), and want to see if a specific
something is inside that collection, you'll have to loop through all the
items in this collection.

Let's use a real world example and display all members of a soccer team,
stored in an array $soccerTeam.

To get the members of the team, the foreach statement is used. Its syntax
is fairly straight forward:

```text
{foreach $player in $soccerTeam}
    {$player.name}
{/foreach}
```

This will loop over the items (team members) in $soccerTeam and assign
each player to the variable $player in each iteration. Inside this foreach
block you can do whatever you want with the outputted information. You can
for example generate a HTML list with soccer players from that team.

It becomes a little bit more technical now...

Of course we also support looping over arrays that have non-standard keys.

```text
    {foreach $list as $key => $value}
       Key {$key} contains {$value}.
    {/foreach}
```
As you can see here, you specify both a $key and a $value which will be
used to store these values on each iteration.

And finally, sometimes you want certain code to execute if there is no data
at all, this is done using the {foreachelse} statement.

```text
    {foreach $item in $list}
       {$item.name}
    {foreachelse}
        No items in list.
    {/foreach}
```

This foreachelse statement is only executed in case of no data. It is
completely ignored otherwise.


## Assigning variables

It is possible to assign values on runtime. You can for example use this
to calculate the total price of a set of purchased items. Or to remember
a certain item inside a foreach statement. Assigning variables is done as
follows:

```text
{assign $item to $topitem}
```

After this statement the variable $topitem is available and it will contain
what $item contained when the email was being compiled and sent to the user.

This will allow you to do things like the following.

```text
  {foreach $item in $list}
    {assign $total + $item.price to $total}
    {if $item.price > $topitem.price}
      {assign $item to $topitem}
    {/if}
  {/foreach}
```

Which will eventually have the most expensive item in the $topitem variable.
And the total price in $total. Variable modifiers


## Using curly braces in your text

As you can see above the syntax heavily depends on the curly braces `{}`.
Therefore, these braces cannot appear in the text without leading to a
valid syntax. If you do need these braces in you text, you can use: `{ldelim}`
to get a `{` and `{rdelim}` to get a `}`. If you have a large text with
these bracelets you can enclose the text in `{literal}` and `{/literal}`.
This text will then not be processed.


## Layout issues

The code snippets above our formatted in a way to make them readable, we
used new lines, indentation, etc. When you are generating text for the html
part of your mail this is advisable since it is easier to capture mistakes. 
However, if you are generating content for the text part of your mail,
you should be aware that the formatting of your template code affects the
format of your text.

E.g. above we gave a snippet that prints out names of players in a soccer
team
```text

If the soccerTeam array looks like: `["Ronaldo", "Messi", "Ibrahimovic"]`

The output that we get in the text section will be:
```text

    Ronaldo

    Messi

    Ibrahimovic
    
```
This is probably not what you had in mind while typing the foreach loop.
But this is what you get since there is a new line before and after the
variable and there are some spaces in front of it used as indentation.
To get a list of the names without the extra whitespace you should write:
```text
{foreach $player in $soccerTeam}{$player}
{/foreach}
```
This is less readable but gives what you want
```text
Ronaldo
Messi
Ibrahimovic
```

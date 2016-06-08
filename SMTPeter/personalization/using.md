# Using personal data in your mail

You can easily use the personal date you have [added to your mail](@todo).
The syntax for the personalization variables are loosely based on the 
Smarty template engine that is used in many PHP projects. So, each variable
you have added to the personal data can be accessed by its name prefixed
with $ and surrounded by curly braces (the mustaches next to the P character on your
keyboard), like "{$dataname}".
E.g. if you have sent a mail with data: "name", "age", "job", and "yourname",
you can create the following JSON:

```json
{
    "recipient": ...,
    "data": ...,
    "from": "info <info@example.com>",
    "to": "{$name} <john@example.org>",
    "subject": "Hello {$name}!",
    "text": "Hi {$name},\n\nYour age is {$age}, and your job is {$job}.\n\nCheers,\n\n{$ourname}"
}
```

The "{$...}" will be replaced by the data you have provided. This means
that you can sent the same content to a whole list of people and still make 
it personal. You can even automatically adjust some content on user
characteristics by using some simple programming


## Simple programming

Besides replacing text the you can even use simple programming statements:

````text
{if $age > 30}
    Text that is shown to everyone older than 30
{else}
    Text visible for others
{/if}

{foreach $children as $child}
    One of your children is named {$child}.
{/foreach}
````

For an in-depth discussion about the syntax we refer to our 
[programming page](@todo).


<!--- @todo write that mail ends up in failure if mistakes are made with syntax --->

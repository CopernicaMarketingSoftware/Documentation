# Personalization

MailerQ can personalize email messages on the fly. If you add an extra
"data" property to the input JSON, MailerQ treats the subject line
and the text and HTML versions of your mime messages as templates, and
replaces all variables in them with the values from the JSON "data" 
property.

````json
{
    "recipient": "info@example.com",
    "mime": "....",
    "data": {
        "name": "John Doe",
        "age": 33,
        "job": "programmer",
        "children": [
            "Peter", "Angela", "Brandon"
        ]
    }
}
````

If you use the above JSON data for your mail, you can use inside the
subject line, and inside the text and HTML versions of your email these
variables.

````mime
From: Email Tester <info@example.org>
To: John Doe <john@example.org>
Subject: Hello {$name}!
Content-Type: text/plain

Hi {$name},

Your age is {$age}, and your job is {$job}.

Cheers,

The MailerQ test team
````

If you had used the above MIME as input, MailerQ would replace the variables
in the subject line and the text and HTML versions.


## Simple programming

The syntax for the personalization variables are loosely based on the 
Smarty template engine that is used in many PHP projects. Variables
use the {$name} syntax, and you can even use simple programming statements:

````text
{if $age > 30}
    Text that is shown to everyone older than 30
{else}
    Text visible for others
{/if}

{foreach $childres as $child}
    One of your children is named {$child}.
{/foreach}
````

However, templates can not be used for real programming. The supported
programming constructs are relatively simple and are more or less restricted 
to {if} and {foreach} statements. 


## Variable modifiers

You can pass data to variable modifiers. If you use a variable, you can
pass it through a modifier to modify the data.

````text
Hello {$name|escape},

Your name {$name|escape} is {$name|strlen} characters long.

Bye!
````

The following table lists all supported modifiers:

<table>
    <tr>
        <td>base64encode</td>
        <td>base64 encoder</td>
    </tr>
    <tr>
        <td>base64decode</td>
        <td>base64 decoder</td>
    </tr>
    <tr>
        <td>cat</td>
        <td>concatenate data</td>
    </tr>
    <tr>
        <td>count_characters</td>
        <td>count number of characters in a string</td>
    </tr>
    <tr>
        <td>count</td>
        <td>count number of elements in variable</td>
    </tr>
    <tr>
        <td>count_paragraphs</td>
        <td>count number of paragraphs in a text</td>
    </tr>
    <tr>
        <td>count_words</td>
        <td>count number of words in a text</td>
    </tr>
    <tr>
        <td>default</td>
        <td>use default value if variable is not set</td>
    </tr>
    <tr>
        <td>empty</td>
        <td>check whether a variable is empty</td>
    </tr>
    <tr>
        <td>escape</td>
        <td>escape html characters (or other chars) inside a string</td>
    </tr>
    <tr>
        <td>indent</td>
        <td>put whitespace in front of every line</td>
    </tr>
    <tr>
        <td>md5</td>
        <td>md5 encoding</td>
    </tr>
    <tr>
        <td>nl2br</td>
        <td>replace newlines with html br tags</td>
    </tr>
    <tr>
        <td>range</td>
        <td>????</td>
    </tr>
    <tr>
        <td>regex_replace</td>
        <td>replace substrings using regular expression</td>
    </tr>
    <tr>
        <td>replace</td>
        <td>replace strings</td>
    </tr>
</table>


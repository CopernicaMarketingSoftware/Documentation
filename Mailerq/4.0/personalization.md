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

{foreach $children as $child}
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
        <td>cat:"string"</td>
        <td>concatenates string to variable</td>
    </tr>
    <tr>
        <td>count</td>
        <td>count number of elements in variable</td>
    </tr>
    <tr>
        <td>count_characters</td>
        <td>count number of characters in a string</td>
    </tr>
    <tr>
        <td>count_paragraphs</td>
        <td>count number of paragraphs in a text (by counting newlines)</td>
    </tr>
    <tr>
        <td>count_words</td>
        <td>count number of words in a text</td>
    </tr>
    <tr>
        <td>default:default value</td>
        <td>use default value if variable is not set</td>
    </tr>
    <tr>
        <td>empty</td>
        <td>check whether a variable is empty</td>
    </tr>
    <tr>
        <td>escape:"string"</td>
        <td>escape html characters (or other chars) inside a string</td>
    </tr>
    <tr>
        <td>indent:num = 1:char = " "</td>
        <td>put num whitespaces in front of every line</td>
    </tr>
    <tr>
        <td>md5</td>
        <td>perform md5 hashing</td>
    </tr>
    <tr>
        <td>nl2br</td>
        <td>replace newlines with html br tags</td>
    </tr>
    <tr>
        <td>range:start = 0:end</td>
        <td>truncate list to get the items between positions start and end</td>
    </tr>
    <tr>
        <td>regex_replace:regex:replace_text</td>
        <td>replace substrings using regular expression</td>
    </tr>
    <tr>
        <td>replace:"string1":"string2"</td>
        <td>replace occurrences of string1 with string2</td>
    </tr>
    <tr>
        <td>sha1</td>
        <td>perform sha1 hashing</td>
    </tr>
    <tr>
        <td>sha256</td>
        <td>perform sha256 hashing</td>
    </tr>
    <tr>
        <td>sha512</td>
        <td>sha512 hashing</td>
    </tr>
    <tr>
        <td>spacify:separator = " "</td>
        <td>place a separator between every input character</td>
    </tr>
    <tr>
        <td>strlen</td>
        <td>count the characters in a string</td>
    </tr>
    <tr>
        <td>strstr:"substring":before = false</td>
        <td>return the string starting from the first occurrence of substring if before = false. otherwise return the string until the first occurrence.</td>
    </tr>
    <tr>
        <td>substr:start position:length</td>
        <td>return the substring from start position onward, optionally truncated after length characters</td>
    </tr>
    <tr>
        <td>tolower</td>
        <td>convert all characters to lower case</td>
    </tr>
    <tr>
        <td>toupper</td>
        <td>convert all characters to upper case</td>
    </tr>
    <tr>
        <td>trim:characters = " \t\n\r\0\x0B"</td>
        <td>trim the specified characters off both sides of the input</td>
    </tr>
    <tr>
        <td>truncate:length = 80:etc = "...":break_words = false</td>
        <td>truncate inputs that are longer than length and append etc at the end. break_words = true allows truncating parts of words</td>
    </tr>
    <tr>
        <td>ucfirst</td>
        <td>replace first character with an upper case character</td>
    </tr>
    <tr>
        <td>urlencode</td>
        <td>encode input for use in an url</td>
    </tr>
    <tr>
        <td>urldecode</td>
        <td>decode input for use in an url</td>
    </tr>
</table>


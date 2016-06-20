# Personalization

With ResponsiveEmail you can easily personalize your mailings. You simply
add an extra property, "data", to your JSON, or add extra information to
the property "recipients" if you send a mass mailing (see our [REST API "REST API"](../api/post-send)
).
This information can be used to replace parts of your mail.

## Add personal data to the JSON

If you send a mail with only one recipient, you can add the personal data
with property "data".

```json
{
    "recipient": "john@doe.com",
    "data"     : {
        "firstname"  : "John",
        "familyname" : "Doe"
    }
}
```
If you have multiple recipients, the personal data can be passed as follows:

```json
{   
    "recipients" : [
        "jane@doe.com": {
            "firsname": "Jane",
            "familyname": "Doe"
        },
        "john@doe.com": {
            "firstname": "John",
            "familyname": "Doe"
        }
    ]
}
```
When you use the above JSONs you can access the content of "firstname" and
"familyname" in the "from" and "to" address, the header, the text, and the
html fields or in the "mime". To make life easy for you, you standard have
access to the "envelope" and "recipient" information.

## Using the personal data

Let's say you have the following JSON:
```json
{
    "recipient": "john@example.com",
    "data": {
        "ourname": "The ResponsiveEmail test team",
        "name": "John Doe",
        "age": 33,
        "job": "programmer",
        "children": [
            "Peter", "Angela", "Brandon"
        ]
    }
    "from": "....",
    "to": "...",
    ...
}
```

If you use the above JSON data for your mail, you can use inside the "from"
and "to" address, the subject line, and inside the text and HTML versions
of your email these variables.

```json
{
    "recipient": ...,
    "data": ...,
    "from": "info <info@example.com>",
    "to": "{$name} <john@example.org>",
    "subject": "Hello {$name}!",
    "text": "Hi {$name},\n\nYour age is {$age}, and your job is {$job}.\n\nCheers,\n\n{$ourname}"
````
If you had used the above JSON, ResponsiveEmail would replace the variables
in the "from", and "to" address, the subject line and the text version. 
For ease of use the "envelope" and "recipient" are already extracted from
the mail for you. You can use these without specifying them as a data
property.

Note that with this personalization, you can also send your mass mails with
only one REST call. 


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

If you want to know more about programming a Smarty template you can visit
our [programming page](../personalization-programming.md)

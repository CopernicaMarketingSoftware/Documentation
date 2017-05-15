
# Personalize emails

As you could have [read](rest-send-multiple-recipients) you can send a mail
to multiple recipients with one POST request. Sometimes you indeed want
to send identical mails to multiple persons, yet, often you want to give
each mail a personal touch. With SMTPeter this is possible too. SMTPeter
allows you to add some code in your message that will be replaced with data
specific for each recipient.

The way how you indicate what parts of a message needs to be replaced with
personal data is based on special syntax. This syntax makes
it easy to combine text and code, but more on this later. Firstly, we discuss
how personalization data can be added to a POST request.

## Adding data for a single recipient mail

If you send a mail to only one recipient, adding data is easy. You just
add a "data" property to your JSON containing the data that you want to
use for personalizing your mail. An example of this is:

```json
{
    "recipient": "john@doe.com",
    ...,
    "data"     : {
        "firstname"  : "John",
        "familyname" : "Doe",
        "children"   : ["Jane", "Joe", "Jacky", "Josef"]
    }
}
```
You can use {$firstname} to access "John", {$familyname} to access "Doe",
and with {$children} you get an array containing "Jane", "Joe", "Jacky",
and "Josef" (see our [programming page](personalization-programming) to for a complete
discussion about using variables and programming). You can use these variables
in the "from" and "to" address, the header, the text, and the html fields or
in the "mime". For ease of use you get automatically the "envelope" and
"recipient" variables that contain data extracted from the. So, you can
use these without specifying them as a data property.


## Adding data for a multiple recipient mail

If you have multiple recipients, just adding a "data" property to the JSON
will not suffice. After all, we need to know what data belongs to which
recipient, otherwise the data will not be personal. To achieve this you can
add a JSON object to each recipient in your recipients vector. This JSON
object that you add to each recipient contains the personal data for the
particular recipient. The JSON that you send may look as follows:

```json
{   
    "recipients" : [
        "jane@doe.com": {
            "firsname": "Jane",
            "familyname": "Doe",
            "children" : ["Jacky", "Joe"]
        },
        "john@doe.com": {
            "firstname": "John",
            "familyname": "Doe",
            "children" : ["Jacky", "Joe"]
        }
    ],
    ...
}
```
When you use the above JSONs you can access the content of "firstname" and
"familyname" with {$firstname} and {$familyname} respectively. Just like
above in the single recipient case you can use these variables
in the "from" and "to" address, the header, the text, and the html fields or
in the "mime". For each recipient a mail will be generated with his/her
personal data. Also in this case the "envelope" and "recipient" data are already
extracted from the mail for you. You can use these without specifying them
as a data property.


## Some requirements

Passing the personal data is very flexible, yet, there are some requirements
about the property names you can pass as data. The requirements are:

* They may contain alphanumeric characters but may not start with a number.
* They may contain dash (-) and underscore (_) symbols. 
* They may not start with a dash or underscore. 
* variables are case sensitive, meaning that {$NAME} is different from {$name}.


## A simple example

Here is a simple example of using personal data into a mail. If you are
looking for an extensive discussion about what is possible you should
read our [programming page](personalization-programming)

Let's say you have the following JSON:
```json
{
    "recipient": "john@example.com",
    "data": {
        "ourname": "The SMTPeter test team",
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
}
````
If you had used the above JSON, the variables in the "from", and "to" address,
the subject line and the text version will be replaced with the data in
"data".

Since the "envelope" and "recipient" data are automatically extracted from
the mail for you. You can use these without specifying them as a data
property. Note that this makes sending out your mass mails with only one
REST call easy.

If you want to send personalized emails you also may be interest in using
our [e-mail templates](rest-send-template). 


* [Using personalisatie](personalization)
* [Modifiers overview](personalization-modifiers)

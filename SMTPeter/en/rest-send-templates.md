# Sending emails based on templates

A couple of examples have been given ([1](rest-send-json "Let SMTPeter create a MIME"), 
[2](rest-mime)) about what kind of data to send to SMTPeter for sending mails.
Besides these options you can also use [Responsive Email](https://www.responsiveemail.com/)
templates. The usage of Responsive Email templates has a couple of advantages
over sending a Mime or letting SMTPeter create the mime based on your to,
html, text, etc. Firstly, you can create the template with the extensive
*drag-and-drop* editor in the dashboard, so you don't have to write the raw
HTML yourself. Not only is it easy to create a template, you also have
a clear overview of all your templates in the dashboard. A second benefit
of using template is that mails based on a template are responsive. This
means that a mail opened on a regular PC can be displayed differently than
a mail opened on a mobile device like tablet or smart phone. This implies
that your mail always looks great!


## Use a template

In SMTPeter's dashboard you have access to the the extensive *drag-and-drop*
editor. Here you can create your *responsive email* template, modify it,
and manage the. Each template has its own ID that you can use when sending
an email. A possible JSON for using a template that you use in your POST
request looks like this:

```json
{
    "recipient":    "john@doe.com",
    "template":     12
}
```
In this case template with ID 12 will be sent to `john@doe.com`. Since the
templates use [Responsive Email](https://www.responsiveemail.com/) and
Responsive Email supports JSON, it is also possible to send the template
as a JSON. This can be a string or a real JSON.


## Using personalization and templates

Just like mails where you create your own HTML or MIME, you can use personalization
data in mails based on templates. If you have only one recipient you can
add the data by specifying a `data` property in the JSON like:

```json
{
    "recipient":    "john@doe.com",
    "template":     12 | **or string/object**,
    "data": {
        "firstname":    "John",
        "lastname":     "Doe"
    }
}
```
If you have multiple recipients you can add the data per recipient like:


```json
{
    "recipients" : [
        "jane@doe.com": {
            "firstname": "Jane",
            "lastname": "Doe",
            "kids" : ["Jacky", "Joe"]
        },
        "john@doe.com": {
            "firstname": "John",
            "lastname": "Doe",
            "kids" : ["Jacky", "Joe"]
        }
    ],
    "template":     12 | **or string/object**,
}
```

In the template you can use the variables `{$firstname}`, `{$lastname}`,
and `{$kids}`. For more information about the using personalization we
refer to the links below.

* [Using personalization ](personalization)
* [Modifiers overview](personalization-modifiers)

<!--- @todo how to set a to --->
<!--- @todo manage templates via rest --->

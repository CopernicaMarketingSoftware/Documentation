# Sending emails based on templates



A couple of examples ([1](rest-send-json "Let SMTPeter create a MIME"), 
[2](rest-mime)) of how you can send data to SMTPeter have already been given.
Besides these options you can also use [Responsive Email](https://www.responsiveemail.com/)
templates. Responsive Email templates brings a couple of advantages.
Firstly, you can create the template with the extensive *drag-and-drop* 
editor in the dashboard, so you don't have to write the raw
HTML yourself. Not only is it easy to create a template, you also have
a clear overview of all your templates in the dashboard. A second benefit
of using template is that mails based on a template are responsive. This
means that a mail opened on a regular PC can be displayed differently than
a mail opened on a mobile device like tablet or smart phone. This implies
that your mail always looks great!


## Template IDs

In SMTPeter's dashboard you have access to the the extensive *drag-and-drop*
editor. Here you can create, manage and edit your *responsive email* templates.
Each template has its own ID that you can use when sending an email. A possible 
JSON for using a template that you use in your POST request looks like this:

```json
{
    "recipient":    "john@doe.com",
    "template":     12
}
```

Because of the fact that the templates make use of [Responsive Email](https://www.responsiveemail.com/)
and thus JSON is supported, you can instead of supplying an ID also supply a complete JSON. You are free
to supply the data as a "string" or a real JSON:

```json
{
    "recipient":    "john@doe.com",
    "template":     {
        "from":         "jane@doe.com",
        "subject":      "this is the subject"

        /* plus all other properties described on https://www.responsiveemail.com */
    }
}
```


## Personalize templates

Just like emails for which you've created your own HTML or MIME, you can use personalization
data in emails based on templates. If you only have one recipient you can
add the data by specifying a `data` property in the JSON like:

```json
{
    "recipient": "john@doe.com",
    "template": 12,
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
    "template": 12
}
```

In the template you can use the variables `{$firstname}`, `{$lastname}`,
and `{$kids}`. For more information about the use of personalization, 
please navigate to one of the following links:


## Overwrite elements from a template

Normally you curate your templates with the template editor, which you can find
in SMTPeter's dashboard. Under the hood, all these templates are being saved as JSON.
You can even check this in the template editor. Just click on the option to display 
or edit the source code. If you choose to make use of the API and point to a certain 
template (we used template #12 in the examples above), that specific template will
be loaded in as JSON code and also converted to MIME. After this process is done 
(in just a second), the mailing will be sent out. With the API you can also add 
extra properties to overwrite the saved elements within the templates:

```json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "subject":      "alternatief onderwerp"
}
```

With the example above you send a mailing based on template 12, but with a deviant
subject. By providing the "subject" property, the saved subject from template 12 will
not be used. In this case, the alternative subject you send along with the REST call
is going to be used.

The following template properties can all be overwritten by specifying them in the REST API:

- subject;
- text;
- from;
- replyTo;
- to;
- cc;
- headers;
- attachments.

It's now possible for example to supply a different subject line, but also to add attachments to a mailing:

```json
{
    "recipient": "john@doe.com",
    "template": 12,
    "attachments": [{
        "data": "base64-encoded data",
        "name": "attachment.pdf",
        "type": "application/pdf"
    }]
}
```

Or if you want SMTPeter to download the attachment for you:

```json
{
    "recipient": "john@doe.com",
    "template": 12,
    "attachments": [{
        "url": "http:://example.com/path/to/document.pdf",
    }]
}
```
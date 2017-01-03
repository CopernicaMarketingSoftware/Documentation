# REST API method: send

To instruct SMTPeter to send out a message, you simply have to HTTP POST
the message that you like to delivery to the "send" method:

```text
https://www.smtpeter.com/v1/send
```

The body should contain the email message that you want to send, plus the 
SMTPeter features that you want to activate. The message can be supplied in
many different formats: as a raw MIME string, or as individual properties
to let SMTPeter construct the mime:

```text
POST /v1/send?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 246

{
    "recipient":    "john@doe.com",
    "subject":      "This is the subject",
    "html":         "This is example content",
    "from":         "info@example.com",
    "to":           "john@doe.com"
}
```

The above example call demonstrates one of the many ways how you can send email 
with the REST API. Just like all API other calls, you can pass data both as an
"application/json" JSON string, or as regular "application/x-www-form-encoded"
HTTP POST data. In the above example (and in all other examples on this page) 
we use JSON because that is much more readable.

In the example we did not pass a raw MIME message to SMTPeter, but used 
individual "subject", "html", "from" and "to" properties instead. SMTPeter 
uses these properties to construct the mail message before it gets delivered
to the recipient. This means that you can leave the complex task of building 
a MIME message to SMTPeter. This, however, is of course optional. You can also
pass a mime string to the REST API, which we will demonstrate further down in 
this article.

We used both a "recipient" and a "to" field. The "recipient" field contains
the address to which the mail is going to be sent. The "to" field contains 
the field that will be displayed inside the mail as the "to" address. For most
messages, these two addresses are identical. However, it is also perfectly
legal to send email to addresses that are not listed in the "to" field. This
is exactly how "BCC" works: email is delivered to addresses that are not
listed in the "to" header of the email.


## Return value

After successfully posting your request, SMTPeter sends back a result 
JSON object holding a unique identifier for each recipient to which
the mail will be delivered.

````json
{
    "id1" : "recipient1@example.com",
    "id2" : "recipient2@example.com"
}
````

The returned ids can be used to obtain information using other methods of the
REST API. Because you can send a message to multiple recipients with a 
single call, the returned value may contains multiple ids and recipients. 



## Minimal properties

You need at least two properties to deliver an email: the recipient address 
that is going to be used in the "RCPT TO" part of the SMTP protocol, and 
the full MIME data. 

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````

To ease readability, we've removed the majority of the MIME code from the 
example. If you do not want to create the MIME message yourself, you 
can leave out the property "mime", and 
[use special MIME properties](rest-mime) like "subject", "text" and "html"
so that SMTPeter can construct the mime data - which is exactly what we did
in the first example that we gave.

You only have to supply a recipient address to deliver an email. However, if 
you're familiar with the SMTP protocol, you may be aware of the fact that you
normally also need to supply an envelope address to deliver email. This
envelope address is the address to which bounces or out-of-office replies get
sent. Because SMTPeter takes care of processing your bounces, you do
not have to supply such an envelope address. SMTPeter adds its own envelope
address to collect the bounces.

If you to handle the bounces yourself, you can add an extra "envelope" address
to the input data. Besides this envelope address, you might also be interested 
in adding a ["dsn" property](rest-dsn) to specify the type of bounce messages 
you want to receive.

````json
{
    "recipient":    "john@doe.com",
    "envelope":     "myaddress@example.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````


## Using templates

In all of the examples that we gave so far, we required you to send the full
message to SMTPeter - either as a MIME string or as individual "text" and 
"html" properties. But you can also make use of pre-stored templates so that
you only have to send personalization data to the REST API. SMTPeter 
constructs the email message based on the earlier created template and 
personalizes it with the supplied data.

Via the SMTPeter dashboard you have access to a powerful drag-and-drop editor
to manage, edit and create responsive email templates. Every template has a 
unique numeric identifier that you can use in the REST API to send out email.

````json
{
    "recipient":    "john@doe.com",
    "template":     12,
    "data": {
        "firstname":    "John",
        "lastname":     "Doe"
    }
}
````

You can pass [personalization data](personalization) to the REST call, so 
that the mail gets personalized. The above example will send template #12 to
john@doe.com, with the variables {$firstname} and {$lastname} replaced with 
John Doe's name.


## Multiple recipients

To send a single message to multiple recipients, remove the "recipient"
propery, and replace it with a "recipients" property holding an array
of email addresses:

````json
{
    "recipients":   [ "john@doe.com", "someone@else.com" ],
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n...."
}
````

Only pure email addresses are supported. It is not permitted to use display 
names or to put the addresses inside angle brackets.



## Add data to recipient or recipients

You can add personal data to the recipient or recipients. This data can be
used later to [personalize the mail](personalization). If you have one
recipient, you can add the personal data with property "data".

```json
{
    "recipient": "john@doe.com",
    "data"     : {
        "firstname"  : "John",
        "familyname" : "Doe"
    }
}
```

If you have multiple recipients, the data can be passed as follows:

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

## Special features

You can add special properties to the input JSON to enable or disable specific
SMTPeter features. You can for example enable click, open and bounce tracking,
or you can tell SMTPeter to inlinize your CSS code.

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "inlinecss":    true,
    "trackclicks":  true,
    "trackopens":   false,
    "trackbounces": true,
    "preventscam":  true
}
````

### Inlinize CSS code

By setting the "inlinecss" variable to true you enable the feature that 
CSS stylesheets in the header of your email are converted into inline style
attribytes in the HTML code.


### Tracking clicks, opens and bounces

SMTPeter automatically replaces all hyperlinks in your messages with its
own URLs so that you can track clicks and opens. The envelope address
of the mailing will be set to a SMTPeter address, so that all
bounces and out-of-office replies can be tracked by SMTPeter. If you
want to disable these tracking settings, you can include the 
"trackclicks", "trackopens" and "trackbounces" options, and set them 
to false:

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  false,
    "trackopens":   false,
    "trackbounces": false
}
````

When click-tracking is enabled (which is the default), *all* hyperlinks in
your email are modified to track the clicks. However, some email programs
show a warning to the user when links are modified. This is especially the
case if a link is modified in such a way that the clickable text does
not match the actual hyperlink. You can add a "preventscam" property to
tell SMTPeter not to modify these type of links:

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true
}
````

### Settings for Delivery Status Notifications

If you do not want SMTPeter to track bounces for you, all bounces are sent
sent back to your envelope address. If you want this, you must add the
"envelope" address to the JSON too:

````json
{
    "envelope":     "your@address.com",
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackbounces": false
}
````

The above JSON instructs SMTPeter to not track bounces, but to use your
envelope for messages that could not be delivered. Be aware that you must
include an envelope address to receive bounces!

With the optional "dsn" property you can further finetune what kind of Delivery 
Status Notification messages you want to receive. The "dsn" variable accepts a 
JSON object with four (optional) fields:

````json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true,
    "dsn": {
        "notify": ,         "FAILURE",
        "ret":              "FULL",
        "envid":            "your-identifier",
        "orcpt":            "original@recipient.address.com"
    }
}
````

The "notify" property is the most important one: you can specify what kind of events 
should trigger an email notification. Possible values are "NEVER", "FAILURE", 
"SUCCESS" or "DELAY". A comma seperated list of values is also supported.

The "ret" value may hold the values "FULL" or "HDRS" to specify whether the
notification should hold the full original email, or just the headers.

The "envid" and "orcpt" fields can be used if you want to control what extra
data will be included in the notifications. The value of the "envid" will 
be included in the "original-envelope-id" property of the returned status
message, and the "orcpt" value is copied to the "original-recipient" 
property.

### Setting for embedded images

Having embedded images in your mime may give some [issues](images). SMTPeter
can subtract the embedded images from your mime, host them, and rewrite
the links in the HTML part of the mime to the remote location.
The option can be enabled to set the "images" property in the JSON to
"hosted". The default is "default", which simply does nothing.

```json
{
    ...,
    "images": "hosted"|"default"
}

```

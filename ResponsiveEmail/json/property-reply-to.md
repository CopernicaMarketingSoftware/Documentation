# Properties from and replyTo

The visible _from_ address, and the visible _reply-to_ address are the address
of the sender of the email, and the address that is used when the receiver
of the email presses the 'reply' button. In the input JSON object, you
can set these properties through the `from` and `replyTo`
properties.

Although all properties in the JSON are optional, you are strongly advised
to include at least a *from* address. Not having a from address in an email
is generally not a good idea, as your email will then most likely be rejected
by the spam checking routines of email clients. The *reply-to* address on the
other hand is fully optional, and mostly not needed. Only if you want to use a
different address to be used when someone replies to an email than the address
of the sender, you can include a `replyTo` property in the JSON.

Both the `from` and `replyTo` properties can be JSON objects holding
properties for the name and the email address. However, you can also
set the `from` and `replyTo` properties to string values holding
email addresses.

## Examples


```javascript
{
    "name": "My template",
    "from" : {
        "name" : "Name 1",
        "address" : "info@example.org"
    },
    "replyTo" : {
        "name" : "Name 2",
        "address" : "reply-to@example.org"
    },
    "subject": "I am the best example",
    "background": {
        "color": "#FC00CA"
    },
    "content": {
        "blocks": [
            {
                "type": "text",
                "content": "Hello I am the best example text!"
            }, 
            {
                "type": "image",
                "src": "http://www.example.com/best-example.gif"
            }
        ]
    }
}
```

The above code shows the recommended way of setting the from address
and the reply-to address: as JSON objects with the name and
email address as nested properties. But you can also assign string
values:

```javascript
{
    "name": "My template",
    "from" : "info@example.org",
    "replyTo" : "reply-to@example.org",
    "subject": "I am the best example",
    "background": {
        "color": "#FC00CA"
    },
    "content": {
        "blocks": [
            {
                "type": "text",
                "content": "Hello I am the best example text!"
            }, 
            {
                "type": "image",
                "src": "http://www.example.com/best-example.gif"
            }
        ]
    }
}
```

## Related information

The sender addresses are stored in the header of the email. Other 
[top level properties](../json/top-level-properties) 
to change the mime header of the generated mime are for example 
[`subject`](../json/property-subject), 
[`to`](../json/property-to), 
[`cc`](../json/property-cc) and the property 
[`headers`](../json/property-headers).

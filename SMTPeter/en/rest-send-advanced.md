# Advanced send options

By adding special properties to the input JSON you can enable or disable specific
SMTPeter features. You can for example enable click, open and bounce tracking,
or you can tell SMTPeter to inlinize your CSS code.

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "inlinecss":    true,
    "trackclicks":  true,
    "trackopens":   false,
    "trackbounces": true,
    "preventscam":  true
}
```

### Inlinize CSS code

By setting the "inlinecss" variable to true you enable the feature that 
CSS stylesheets in the header of your email are converted into inline style
attributes in the HTML code. Because of how some email clients handle CSS 
a standard stylesheet might cause your email to look different than intended. 
See the article on [inline CSS](./inline-css) for more background and 
how to prevent this.


### Tracking clicks, opens and bounces

SMTPeter automatically replaces all hyperlinks in your messages with its
own URLs so that it can track clicks and opens. The envelope address
of the mailing will also be set to a SMTPeter address, so that all
bounces and out-of-office replies are tracked by SMTPeter. If you
want to disable these tracking settings, you can include the 
"trackclicks", "trackopens" and "trackbounces" options, and set them 
to false:

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  false,
    "trackopens":   false,
    "trackbounces": false
}
```

When click-tracking is enabled (which is the default), *all* hyperlinks in
your email are modified to track the clicks. However, some email programs
show a warning to the user when links are modified. This is especially the
case if a link is modified in such a way that the clickable text does
not match the actual hyperlink. You can add a "preventscam" property to
tell SMTPeter not to modify these type of links:

```json
{
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackclicks":  true,
    "preventscam":  true
}
```

The preventscam option prevents that SMTPeter modified hyperlinks like

```html
<a href="http://www.example.com">www.example.com</a>
```

## Settings for Delivery Status Notifications

If you do not want SMTPeter to track bounces for you, all bounces are sent
sent back to your envelope address. If you want this, you must add the
"envelope" address to the JSON too:

```json
{
    "envelope":     "your@address.com",
    "recipient":    "john@doe.com",
    "mime":         "MIME-Version: 1.0\r\nFrom: <info@example.com>\r\n....",
    "trackbounces": false
}
```

The above JSON instructs SMTPeter to not track bounces, but to use your
envelope for messages that could not be delivered. Be aware that you must
add an envelope address to the JSON too to receive bounces!

With the optional "dsn" property you can further finetune what kind of Delivery 
Status Notification messages you want to receive. The "dsn" variable accepts a 
JSON object with four (optional) fields:

```json
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
```

The "notify" property is the most important one: you can specify what kind of events 
should trigger an email notification. Possible values are "NEVER", "FAILURE", 
"SUCCESS" or "DELAY". A comma separated list of values is also supported.

The "ret" value may hold the values "FULL" or "HDRS" to specify whether the
notification should hold the full original email, or just the headers.

The "envid" and "orcpt" fields can be used if you want to control what extra
data will be included in the notifications. The value of the "envid" will 
be included in the "original-envelope-id" property of the returned status
message, and the "orcpt" value is copied to the "original-recipient" 
property.

### Setting for embedded images

Having embedded [images](./images) in your MIME may give some issues. SMTPeter
can remove the embedded images from your MIME, host them and rewrite
the links in the HTML part of the MIME to the remote location to prevent issues.
The option can be enabled to set the "images" property in the JSON to
"hosted". The default is "default", which simply does nothing.

```json
{
    ...,
    "images": "hosted"|"default"
}
```

## Tagging a mail

It is possible to add one or more tags to a mail. These tags can for example
be used to track the number of clicks or opens for a certain mailing. For
example, you send a special summer sale mailing and are curious how much
opens and clicks this mailing generates. In this case you can tag each mail
that belongs to this mailing with the tag summerSale2016. Subsequently,
you can filter the opens and click on this tag summerSale2016 to see how
many clicks and opens this mailing has generated.
Tags can be added as an array via the `tags` property in the json like:
```json
{
    ...,
    "tags" : [
        "tag1",
        "tag2",
        ...
    ],
    ...
}
```
It is not allowed to have white-spaces or semicolons in your tags.

## More information

* [REST API](./rest-api)
* [Send MIME data](./rest-mime)
* [Make MIME data with SMTPeter](./rest-send-json)
* [Images with SMTPeter](./images)
* [Inline CSS](./inline-css)

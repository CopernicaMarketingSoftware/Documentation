# Property `device`

One of the ideas behind responsive email is that you can include or exclude 
content based on the device on which the email is opened. That is exactly
what the `device` property is for. This is a properted nested inside the
[`visibility`](/copernica-docs:ResponsiveEmail/json/property-visibility) property, and
that accepts a string value to specify whether the content should be
visible when the email is opened on a mobile device and/or on a desktop computer.


| Supported values for the `device` property |
| --- |
| Value |  | Desc. |
| "always" | _default_ | The block is always visible, on all possible screen sizes. |
| "desktop" |  | The block is only visible on big, desktop like, screen sizes. |
| "mobile" |  | The block is only visible on small, mobile like, screen sizes. |


## Email client support

Under the hood, the `device` property is translated into CSS @media queries.
Most modern time email clients and web browsers support this, so for most
email clients the setting is respected and your content becomes visible
or is hidden when you want it to.

However, not all email clients respect or support media queries. Some of
them are simply too old and were built when media queries were not even
invented, while others simply strip the CSS code from the mail. This means
that there are always exceptional cases where specific device specific
content still appears in the mail, even when the mail is opened on a
completely different device.


## Example

Mobile devices have small screens, and often use low bandwitdth internet 
connections. Using high resolution images is then not always a good
practice. With the `device` property you can leave these hires images
out if the mail is opened on a mobile device.


````javascript
    {
        "from" : "info@example.com",
        "subject" : "Mail with hires images hidden on mobile devices",
        "content" : {
            "blocks" : [ {
                "type" : "text",
                "content" : "<p>Introduction paragraph</p>"
            }, {
                "type" : "image",
                "src" : "http://www.example.com/hires-image.jpg",
                "visibility" : {
                    "device" : "desktop"
                }
            }, {
                "type" : "image",
                "src" : "http://www.example.com/lores-image.jpg",
                "visibility" : {
                    "device" : "mobile"
                }
            } ]
        }
    }
````

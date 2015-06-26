# Property `visibility`

Maybe the coolest thing of responsive email is that you can enable or
disable specific content based on the device on which it is displayed,
and based on the interests of the receiver. To enable this feature,
every block in the input JSON has a `visibility` property. With this property
you can exactly specify under what circumstances the content should
be visible in the mail, and under what circumstances the content
should be hidden.

The block level `visibility` property accepts an object value with sub properties.
At this moment in time, you can use a sub property to specify whether
the block should be included when the message is generated for use
in an email and/or for use in a webversion, and a sub property to specify
on which sort of screen size the block should be visible.

| Block visibilty properties |
| --- |
| Property | Value | Desc. |
| [output](/copernica-docs:ResponsiveEmail/json/property-output) | _string_ | Should the block be included in the webversion and/or in the email version? |
| [device](/copernica-docs:ResponsiveEmail/json/property-device) | _string_ | Should the block be visible when the mail is opened on a device with a certain size? |


## Server-side evaluation

The responsive API allows you to specify both visibility constraints that
are used during the email generation process (in other words: before the 
email is sent), and constraints that are evaluated by the email client when the 
message is displayed to the receiver. When a responsive email is created, 
you can tell the API whether it should generate the full MIME code that is 
going to be sent over SMTP, or that you only want to generate the HTML code
to host somewhere on the web. The output for both these versions can be
different, even if they're both based on the same JSON input.

This server-side evaluation can be useful if you want to include 
a "click here if you can not read this message" hyperlink in an email. Such a 
link should of course only be included in the actual delivered email, and not 
in the version that is hosted on the web, because that web hosted message is 
exactly the page that the links leads to.

The sub property [`output`](/copernica-docs:ResponsiveEmail/json/property-output) does this. You can assign the value "webonly" or "mailonly" to tell the responsive API to only output the content when either the web hosted version or the mail version of the message is generated. For an example, see the [documentation about the property](/copernica-docs:ResponsiveEmail/json/property-output).


## Client-side evaluation

Besides server side evaluation, you can also set a visibility sub property
to specify that a certain piece of content should only be visible on a 
mobile device, or should only be visible when the mail is opened on a 
desktop computer. Such a block will always be included in the email message, 
because it is not beforehand known whether the message is going to be
opened on a mobile device or not. The email client however, will now show
the content if it does not match the constraint.

This feature is enabled by setting the 
[device](/copernica-docs:ResponsiveEmail/json/property-device) sub property. For more information, and example code, see [the documentation](/copernica-docs:ResponsiveEmail/json/property-device) of that property.
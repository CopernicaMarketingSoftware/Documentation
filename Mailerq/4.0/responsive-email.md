# Sending responsive emails with MailerQ

MailerQ reads messages from a RabbitMQ message queue, and expects these messages 
to be formatted in JSON format.  Every JSON message should at least have the 
following three properties:

*   envelope
*   recipient
*   mime

The `mime` property in the JSON can either be a full valid MIME string, or 
(if your license allows you to use this feature) a nested JSON object that 
contains the email content. If it is a string, MailerQ will just send the MIME 
message "as is" to the recipient. But when it is a nested object, MailerQ uses 
the "Responsive Email" algorithm to create a fully responsive email on the fly.

## Example content

If you use the responsive email feature, the `mime` property of the JSON may be 
a nested object. In this object you can use all the properties that are 
documented on the [ResponsiveEmail.com](https://www.responsiveemail.com/support/json/introduction "ResponsiveEmail.com documentation") 
website. To give you an idea of what is possible, check the following input:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": {
        "from": "my-sender-address@my-domain.com",
        "to": "info@example.org",
        "subject": "Example subject",
        "textVersion": "This is the example message text",
        "headers": {
            "x-my-special-header": "special-value"
        },
        "content": {
            "blocks": [ {
                "type": "image",
                "src": "http://www.example.com/logo.png"
            }, {
                "type": "feed",
                "source": "http://rss.cnn.com/rss/edition.rss"
            }, {
                "type": "button",
                "label": "Click the button!",
                "link": {
                    "url": "http://www.mailerq.com"
                }
            } ]
        },
        "attachments": [ {
            "url": "http://www.example.com/a-special-file.pdf",
            "name": "brochure.pdf"
        } ]
    }
}

````

The above example is just a quick overview of what type of JSON is supported. 
The engine is very powerful, and the example only uses a small subset of all the 
features. MailerQ can processes this type of JSON, and downloads the necessary 
resources (like the RSS feed and the attachments, and even the image if it is 
necessary to find out the image size) to construct a HTML email that is fully 
responsive and that works on all kinds of devices.

To get a better idea of what is possible and to see more examples of the type 
of input JSON that is recognized, go to the [ResponsiveEmail.com](https://responsiveemail.com) 
website. You will also find a nice drag and drop editor over there that can be 
used to design your emails.

## Embedded algorithm

Some users think that MailerQ makes a connection to the ResponsiveEmail.com web 
service to transform the JSON into MIME. This is not the case. MailerQ and 
ResponsiveEmail.com are both products from the same company, and we have simply 
embedded the entire ResponsiveEmail.com algorithm in MailerQ. MailerQ can run 
this algorithm natively, and does not have to make any calls to the 
ResponsiveEmail.com web service. You therefore do not need a ResponsiveEmail.com 
API key to use this feature.

# Webhooks: opens

Copernica can rewrite image links in emails to track opens. If this option is enabled 
the image will be downloaded from our server instead of yours, allowing 
Copernica to track the opens of the image and therefore the email. This way we can notify 
you through our [statistics](./statistics) or a WebHook.

If you set up a WebHook for opens, the Marketing Suite notifies you in realtime
about each registered image download. For each open that we monitor we send 
a HTTP POST call (HTTPS is possible too) to your server with the relevant 
information about the open. 

Note: this might generate a lot of traffic, so be sure that your server is capable
of handling this.

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

| Variable  | Description                                                     |
|-----------|-----------------------------------------------------------------|
| id        | Unique identifier of the message that was opened                |
| recipient | Email address of the person that opened the mail                |
| ip        | IP address from which the message was opened                    |
| time      | Time when the message was opened                                |
| useragent | Optional user agent string (extracted from HTTP request header) |
| referer   | Optional referer (extracted from HTTP request header)           |
| tags      | The tags that you associated with the mail                      |

The "id", "recipient" and "tags" variables allow you to link the open to the 
originally sent email message.

## More information

* [Webhooks](./webhooks)

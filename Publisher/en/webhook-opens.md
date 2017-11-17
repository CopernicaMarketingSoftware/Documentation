# WebHooks: opens

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
| id        | unique identifier of the message that was opened                |
| recipient | email address of the person that opened the mail                |
| ip        | ip address of the opened                                        |
| time      | time when the url was opened                                    |
| useragent | optional user agent string (extracted from http request header) |
| referer   | optional referer (extracted from http request header)           |
| tags      | the tags that you associated with the mail                      |

The "id", "recipient" and "tags" variables allow you to link the open to the 
originally sent email message.

## More information

* [WebHooks](./webhooks)

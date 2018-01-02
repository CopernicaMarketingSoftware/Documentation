# Webhooks: clicks

Copernica advises you to enable click-tracking to rewrite all hyperlinks. 
This allows Copernica to track every click on a link before redirecting 
to the original URL. This is an automated process that happens so fast 
it is usually unnoticeable for your receiver. 

When a click webhook has been set up these click are also sent to 
your server as HTTP(S) POST calls. The calls happen in real-time and 
contain more information about the click to allow for easy linking the 
click to your existing data. 

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.

Associative arrays such as "parameters" and "fields" are sent per key-value pair,
e.g. *parameters[key]=value*.
Arrays such as "interests" are sent per item, e.g. *interests[]=xyz*.

| Variable  | Description                                                     |
|-----------|-----------------------------------------------------------------|
| id        | unique identifier of the message that was clicked               |
| recipient | email address of the clicker                                    |
| ip        | ip address of the clicker                                       |
| time      | time when the url was opened                                    |
| original  | the original url                                                |
| useragent | optional user agent string (extracted from http request header) |
| referer   | optional referer (extracted from http request header)           |
| tags      | the tags that you associated with the mail                      |

The "id", "recipient" and "tags" variables allow you to link the click to the 
originally sent email message.

## More information

* [Webhooks](./webhooks)

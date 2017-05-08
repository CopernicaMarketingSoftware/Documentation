# Feedback loops for opens

SMTPeter can rewrite image links in emails to track opens. When an email
is opened for which this option was set, the image will not be downloaded from your
own server, but from the cache on SMTPeter web servers in stead. This
allows us to track all opens, and to use that for statistics.

If you set up a feedback loop for opens, SMTPeter notifies you in realtime
about each registered image download. For each open that we monitor we send 
a HTTP POST call (HTTPS is possible too) to your server with the relevant 
information about the open.


## Variables

With each POST call the following variables are passed to your script:

| Variable  | Description
|-----------|
| id        | Unique identifier of the message that was opened
| recipient | Email address of the person that opened the mail
| ip        | IP address of the opened
| url       | The original image url (the url <i>before</i> it was rewritten)
| useragent | Optional user agent string (extracted from http request header)
| referer   | Optional referer (extracted from http request header)

The "ID" and "recipient" variables allow you to link the open to the 
originally sent email message.

## More information

* [Feedback loops](./feedback-loops)
* [Set up a feedback loop](./feedback-setup)

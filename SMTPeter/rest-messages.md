# Retrieving sent messages

All emails that you send through SMTPeter are [archived](archiving "Email archiving").
The REST API can be used to retrieve (almost) all the properties from emails 
that have passed through SMTPeter. For example, the "text" and "html" methods 
allow yout to retrieve the text and html version of the mail.

The following list shows the methods that can be used to retrieve properties 
of sent emails. All these methods require a unique message ID parameter. This
is the same identifier that was returned when you injected email with the
["send" method of the REST API](rest-sent), or when you sent via the
[SMTP API](smtp-api).

```text
https://www.smtpeter.com/v1/recipient/MESSAGEID
https://www.smtpeter.com/v1/envelope/MESSAGEID
https://www.smtpeter.com/v1/text/MESSAGEID
https://www.smtpeter.com/v1/html/MESSAGEID
https://www.smtpeter.com/v1/header/MESSAGEID
https://www.smtpeter.com/v1/attachments/MESSAGEID
https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME
https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER
https://www.smtpeter.com/v1/embeds/MESSAGEID
https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME
https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER
```

## Envelope and recipient

The original envelope and recipient address that you used to inject an email 
can be retrieved with the "recipient" and "envelope" methods. Both methods 
return the email address in "text/plain" format.

```text
https://www.smtpeter.com/v1/envelope/MESSAGEID
https://www.smtpeter.com/v1/recipient/MESSAGEID
```

Keep in mind that SMTPeter normally changes the envelope address to
a custom address to track bounces and errors. The envelope address that is
returned by this method is therefore normally different than the address 
that you originally injected. If you injected mail without an envelope,
an empty string is returned.


## Message content

To get the text or HTML version of a sent message you can simply use the 
"text" and "html" methods. The full original headers can be fetched with
the "headers" method. The URI of these calls are:

```text
https://www.smtpeter.com/v1/text/MESSAGEID
https://www.smtpeter.com/v1/html/MESSAGEID
https://www.smtpeter.com/v1/header/MESSAGEID
```

where "MESSAGEID" is of course the id of the message. The returned data 
is in text/plain format.


## Attachments

To get the attachments of a message you can use the following methods:

```text
(1) https://www.smtpeter.com/v1/attachments/MESSAGEID
(2) https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER
```

MESSAGEID is the message id for which you want to retrieve the attachments,
NAME the name of the attachment and NUMBER the rank of the attachment (starting
from zero). 

With method (1) you can retrieve the names and ranks of the attachments belonging
to a message, with method (2) and (3) you can download the attachment by providing
the name or rank respectively.


## Embedded content

Emails can be sent with embedded images. Such images are embedded into the
full MIME message sort of similar to how attachments are linked to
an email. The REST API has a number of methods to list all embedded content
that was associated with an email, and to extra one embedded item based on
its name or ID.

```text
(1) https://www.smtpeter.com/v1/embeds/MESSAGEID
(2) https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER
```

MESSAGEID stands for the message id for which you want to retrieve the embedded
content, NAME the name of the embedded content, and NUMBER the rank of the
embedded content (starting from zero). 

With method (1) you can retrieve the names and ranks of the embedded content
of the message, with method (2) and (3) you can download the content by providing
the name or rank respectively.


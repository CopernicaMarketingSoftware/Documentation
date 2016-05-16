# Retrieving sent messages

All emails that you send through SMTPeter are [archived](archiving "Email archiving").
The REST API can be used to retrieve (almost) all the properties from
emails that have passed through SMTPeter. For example, the "text" and "html" 
methods allow yout to retrieve the text and html version of the mail.

The following methods can be used to retrieve properties of an already
sent email:

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

## Get the text of a sent message

To get the text of a sent message you call the text method together with
the id of the message for which you want the text. The URI of this call
is:

```text
https://www.smtpeter.com/v1/text/MESSAGEID
```
where "MESSAGEID" is the id of the message. You receive the text of the
message as text/plain.

## Get the html of a sent message

To get the html from a sent message you call the html method together with
the id of the message for which you want the html. The URI of this call
is:

```text
https://www.smtpeter.com/v1/html/MESSAGEID
```
where MESSAGEID is the the id of the message. You receive the html of the
message as text/html.


## Get the header of a stored message

You can access the header of each message you have sent via the header method
together with the id of the message for which you want the header. The URI
of this call is:

```text
https://www.smtpeter.com/v1/header/MESSAGEID
```
where MESSAGEID is the unique id of the message for which you want to get
the header. The header is send as plain text.


## Get the attachments of a stored message

To get the attachments of a message you can use the following methods:

```text
(1) https://www.smtpeter.com/v1/attachments/MESSAGEID
(2) https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER
```
where MESSAGEID is the message id for which you want to retrieve the attachments,
NAME the name of the attachment and NUMBER, the rank of the attachment (starting
from zero). 

With method (1) you can retrieve the names and ranks of the attachments belonging
to a message, with method (2) and (3) you can download the attachment by providing
the name or rank respectively.

## Get the embedded content of a sent message

To get the embedded content of a sent message you can use the following methods:

```text
(1) https://www.smtpeter.com/v1/embeds/MESSAGEID
(2) https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER
```
where MESSAGEID is the message id for which you want to retrieve the embedded
content, NAME the name of the embedded content, and NUMBER the rank of the
embedded content (starting from zero). 

With method (1) you can retrieve the names and ranks of the embedded content
of the message, with method (2) and (3) you can download the content by providing
the name or rank respectively.

<!--- @todo get messageIDs for a particular date --->

# Retrieving sent messages

All emails that you send through SMTPeter are [archived](copernica-docs:SMTPeter/archiving "Email archiving").
With the "text", "html", and "header" REST GET methods you can retrieve
the text, html, and headers from these messages. It is also possible to
get the attachments or embedded content from the messages. The URIs that
belong to these methods are:

```text
https://www.smtpeter.com/v1/text/MESSAGEID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/html/MESSAGEID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/header/MESSAGEID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/attachments/MESSAGEID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/embeds/MESSAGEID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER?access_token=YOUR_API_TOKEN
```

## Get the text of a sent message

To get the text of a sent message you call the text method together with
the id of the message for which you want the text. The URI of this call
is:
```text
https://www.smtpeter.com/v1/text/MESSAGEID?access_token=YOUR_API_TOKEN
```
where "MESSAGEID" is the id of the message. You receive the text of the
message as text/plain.

## Get the html of a sent message

To get the html from a sent message you call the html method together with
the id of the message for which you want the html. The URI of this call
is:

```text
https://www.smtpeter.com/v1/html/MESSAGEID?access_token=YOUR_API_TOKEN
```
where MESSAGEID is the the id of the message. You receive the html of the
message as text/html.


## Get the header of a stored message

You can access the header of each message you have sent via the header method
together with the id of the message for which you want the header. The URI
of this call is:

```text
https://www.smtpeter.com/v1/header/MESSAGEID?access_token=YOUR_API_TOKEN
```
where MESSAGEID is the unique id of the message for which you want to get
the header. The header is send as plain text.


## Get the attachments of a stored message

To get the attachments of a message you can use the following methods:

```text
(1) https://www.smtpeter.com/v1/attachments/MESSAGEID?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER?access_token=YOUR_API_TOKEN
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
(1) https://www.smtpeter.com/v1/embeds/MESSAGEID?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER?access_token=YOUR_API_TOKEN
```
where MESSAGEID is the message id for which you want to retrieve the embedded
content, NAME the name of the embedded content, and NUMBER the rank of the
embedded content (starting from zero). 

With method (1) you can retrieve the names and ranks of the embedded content
of the message, with method (2) and (3) you can download the content by providing
the name or rank respectively.

<!--- @todo get messageIDs for a particular date --->

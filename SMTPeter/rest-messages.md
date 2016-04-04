# Retrieving sent messages

All emails that you send through SMTPeter are [archived](copernica-docs:SMTPeter/archiving "Email archiving").
With the "text" and "html" REST methods you can retrieve the text and html
from these messages. The URIs that belong to these methods are:

```text
https://www.smtpeter.com/v1/text/MESSAGEID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/html/MESSAGEID?access_token=YOUR_API_TOKEN
```

## Get the text of a stored message

To get the text of a stored message you call the text method together with
the id of the message for which you want the text. The URI of this call
is:
```text
https://www.smtpeter.com/v1/text/MESSAGEID?access_token=YOUR_API_TOKEN
```
where "MESSAGEID" is the id of the message. You receive the text of the
message as text/plain.

## Get the html of a stored message

To get the html from a stored message you call the html method together with
the id of the message for which you want the html. The URI of this call
is:

```text
https://www.smtpeter.com/v1/html/MESSAGEID?access_token=YOUR_API_TOKEN
```
where MESSAGEID is the the id of the message. You receive the html of the
message as text/html.


<!--- @todo get messageIDs for a particular date --->

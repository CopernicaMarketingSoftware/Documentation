# Fetching the header of a message

You can access the header of each message you have sent via SMTPeter with
the REST API header method. The method is accessible via the following call

```text
https://www.smtpeter.com/v1/header/MESSAGEID?access_token=YOUR_API_TOKEN
```
where MESSAGEID is the unique id of the message for which you want to get
the header. The header is send as plain text.

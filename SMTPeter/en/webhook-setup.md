# Setting up a Webhook

Webhooks can be set up via the SMTPeter dashboard. The interface
is very straight forward: you enter a feedback URL (for example:
"https://www.yourwebsite.com/path/to/your/script.php") and the type
of webhook that you want to set up (clicks, bounces, and so on). 
That's all it takes.

## URL validation

Before SMTPeter starts making calls to your URL, the web address first has
to be validated. SMTPeter does this to prevent that users accidentally instruct
us to send confidential information to a wrong server. During the validation
procedure you are asked to copy a small text file to your webserver, so
that we can see that the server really belongs to you.

The name and contents of the text file are unique for each webhook,
and can be fetched from the SMTPeter dashboard. You must copy the file to one of
two possible locations: to the root of your webserver, or to the same directory 
where your webhook script is located. Thus: if you've set up "https://domain.com/dir/script.php"
as your webhook script, you must copy the "smtpeter-xxxxx.txt" file
to your webserver so that it becomes accessible via either 
"https://domain.com/dir/smtpeter-xxxxx.txt" or "https://domain.com/smtpeter-xxxxx.txt".

You can remove the text file from your server after the address has been 
validated.


## Testing the webhook

The SMTPeter dashboard comes with a useful tool to test your webhook. 
You can enter the POST data that you want to send to your webhook and 
SMTPeter will send it to your script right away, so you can test it.

## More information

* [Webhooks](./webhooks)



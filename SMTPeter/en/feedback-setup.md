# Setting up a feedback loop

Feedback loops can be set up via the SMTPeter dashboard. The interface
is very straight forward: you enter a feedback URL (for example:
"https://www.yourwebsite.com/path/to/your/script.php") and the type
of feedback loop that you want to set up (clicks, bounces, and so on). 
That's all it takes.


## URL validation

Before SMTPeter starts making calls to your URL, the web address first has
to be validated. SMTPeter does this to prevent that users accidentally instruct
us to send confidential information to a wrong server. During the validation
procedure you are asked to copy a small text file to your webserver, so
that we can see that the server really belongs to you.

The name and contents of the text file is unique for each feedback loop,
and can be fetched from the SMTPeter dashboard. You must copy it to one of
two possible locations: to the root of your webserver, or to the same directory 
where your feedback script is located. Thus: if you've set up "https://domain.com/dir/script.php"
as your feedback script, you must copy the "smtpeter-xxxxx.txt" file
to your webserver so that it becomes accessible via either 
"https://domain.com/dir/smtpeter-xxxxx.txt" or "https://domain.com/smtpeter-xxxxx.txt".

You can remove the text file from your server after the address has been 
validated.


## Testing the feedback loop

The SMTPeter dashboard comes with a useful tool to test your feedback
loop. You can enter the post data that you want to send to your feedback
loop, and SMTPeter will send it to your script right away.



# Feedback loops

The Marketing Suite allows you to set up feedback loops. These feedback loops
can be used to receive real timer event notifications. The Marketing Suite
will notify your server every time an event occurs (click on a link, 
opening of an email, an incoming bounce, a failed delivery, or the editing of a profile).

The feedback is sent over the HTTP or HTTPS protocol using the HTTP POST
mechanism. When you [set up a feedback loop](#feedback-setup), you register 
a web address and specify the type of events that you are interested in. 
Once your URL has been validated, the Marketing Suite starts making calls to it.

## Watch out!

Before you set up a feedback loop, please do make sure that your server
is capable of handling the load. Especially the feedback loop that is
called [when someone opens a mail](feedback-opens) receives huge
numbers of calls.

If you're not sure whether your server can handle the load, or when you do
not need realtime feedback, you better use the [general statistics](statistics).

## Feedback setup

Feedback loops can be set up via the dashboard. The interface
is very straight forward: you enter a feedback URL (e.g. 
"https://yourwebsite.com/path/script.php") and the type of feedback loop 
that you want to set up (clicks, bounces, and so on). 
That's all it takes.

The following feedback loops can be used:
* [Feedback loops for bounces](feedback-bounces)
* [Feedback loops for failures](feedback-failures)
* [Feedback loops for clicks](feedback-clicks)
* [Feedback loops for opens](feedback-opens)
* [Feedback loops for profile creations](feedback-creates)
* [Feedback loops for profile updates](feedback-updates)
* [Feedback loops for profile deletions](feedback-deletes)

## URL validation

Before calls are made to your URL, the web address first has
to be validated. The Marketing Suite does this to prevent
that users accidentally instruct us to send confidential 
information to a wrong server. During the validation
procedure you are asked to copy a small text file to your webserver, so
that we can see that the server really belongs to you.

The name and contents of the text file is unique for each feedback loop,
and can be fetched from the dashboard. You must copy it to one of
two possible locations: to the root of your webserver, or to the same directory 
where your feedback script is located. Thus: if you've set up "https://domain.com/dir/script.php"
as your feedback script, you must copy the "smtpeter-xxxxx.txt" file
to your webserver so that it becomes accessible via either 
"https://domain.com/dir/smtpeter-xxxxx.txt" or "https://domain.com/smtpeter-xxxxx.txt".

You can remove the text file from your server after the address has been 
validated.

## Testing the feedback loop

The dashboard comes with a useful tool to test your feedback
loop. You can enter the post data that you want to send to your feedback
loop, and send it right away.

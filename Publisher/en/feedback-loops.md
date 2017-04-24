# Feedback loops

The dashboard in MarketingSuite allows you to configure *feedback loops*. 
Feedback loops are processes that are triggered whenever a certain event 
happens, such as a click or an open, and report it to the user in real 
time via HTTP POST. Please note that they are not available in Publisher.

You could use this if you want to update data in your own application 
upon certain events Copernica picks up. To achieve this, place a script 
on your own server that executes upon Copernica's calls, and in the 
MarketingSuite dashboard, set the triggers. That is all!

<!--
The good thing about feedback loops is that the data Copernica sends 
you is a lot richer than the data Copernica receives in the first place. 
All Copernica sees when receiving a click or open is the IP addresss and 
HTTP headers of the incoming request. To that, we add the e-mail address, 
profile data and the linked tags and send it to you. This way, your 
script receives the data that makes it easy to link the data to data 
in your own system.-->

## Microsoft's, Gmail's and Yahoo's feedback loops
If you've been around for a while in the email marketing business, 
you might know about the feedback loops ESP's like Microsoft and Gmail 
offer. These, however, are different feedback loops than the ones 
described in this article.

Feedback loops from ESP's are used to notify senders (like Copernica) 
when users hit the "this is spam"-button or interact with the email 
otherwise. These loops send feedback from the ESP to us, whereas the 
feedback loops we offer are from us to you. Contrary to the ESP feedback 
loops, ours are non-aggregated and sent in real-time.

## Watch out!

Before you set up a feedback loop, please do make sure that your server
is capable of handling the load. Especially the feedback loop that is
called [when someone opens a mail](feedback-opens) receives huge
numbers of calls.

If you're not sure whether your server can handle the load, or when you do
not need realtime feedback, you better use the [general statistics](statistics).

## Setting up a feedback loop

Setting up a feedback loop happens from the Marketing Suite dashboard.
In the **Feedback Loops** menu, you can fill in the address the HTTP POST 
call is sent to in the **manage** menu. It's pretty self explanatory: 
select the events you're interested in and provide the location of your script.

The following feedback loops can be used:
* [Feedback loops for bounces](feedback-bounces)
* [Feedback loops for failures](feedback-failures)
* [Feedback loops for clicks](feedback-clicks)
* [Feedback loops for opens](feedback-opens)
<!--
* [Feedback loops for profile creations](feedback-creates)
* [Feedback loops for profile updates](feedback-updates)
* [Feedback loops for profile deletions](feedback-deletes) -->

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

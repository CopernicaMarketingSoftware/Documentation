# Feedback loops

In the Marketing Suite menu you find a tab called `FEEDBACK LOOPS`. 
Feedback loops are processes that notify their user of events that happen 
in real time through HTTP POST. This allows you to always have the most 
recent results of your mailing. Please note that this functionality is 
currently only available in the Marketing Suite.

WARNING: Some feedback loops generate a large amount of calls. Please make 
sure your server is capable of handling the load before setting up a 
feedback loop.

## Feedback loops with Marketing Suite

Feedback loops can be used to sync data that passes through Copernica 
directly into your own application. Feedback loops require a script on 
your own server to execute whenever information is provided through the 
feedback loop. You can set several triggers in the feedback loop tab such 
as opens, clicks, profile edits and bounces.

The data you receive is very rich and allows you to easily link it to the 
data already present in your system. Copernica receives the IP address and 
HTTP headers of the incoming request and adds the e-mail address, profile 
data and linked tags to send to you. Based on this information it is 
easy to add the information to the correct profile.

## Microsoft's, Gmail's and Yahoo's feedback loops

Another type of feedback loop is the feedback loop that ESP's (Email 
service providers) such as Microsoft or Gmail offer. These feedback loops 
can be used to notify senders when a message is reported as spam or interacts 
with the email. These loops are used to send aggregated information to us, 
while our feedback loops send notifications to you in real-time. Copernica 
handles spam reports for you according to your [unsubscribe behavior](./database-unsubscribe-behavior).

## Handling the calls

As mentioned before feedback loops may generate a lot of calls. This can 
be taxing on your server, so make sure it can handle the load. Especially 
the [feedback loop for opens](feedback-opens) may cause a huge number of calls. 
If you are unsure about the server capacity or not interested in real-time 
feedback you can also use the [general statistics](statistics).

## Setting up a feedback loop

Click on the tab called `feedback loops` inside the Marketing Suite.
In the feedback loops menu, you can fill in the address the HTTP POST 
call is sent to in the manage menu. It's pretty self explanatory: 
select the events you're interested in and provide the location of 
your script.

There are several types of feedback loops. The articles linked below explain 
these types in more detail:

* [Feedback loops for bounces](feedback-bounces)
* [Feedback loops for failures](feedback-failures)
* [Feedback loops for clicks](feedback-clicks)
* [Feedback loops for opens](feedback-opens)
* [Feedback loops for profile creations](feedback-creates)
* [Feedback loops for profile updates](feedback-updates)
* [Feedback loops for profile removals](feedback-deletes)

## Feedback loops for specific database or collection

The Marketing Suite gives you the possibility to see all feedback
loops that are linked to a certain database or collection. It's 
thus easier to check which feedback loops are set up. 

## URL validation

Before calls are made to your URL, the web address first has
to be validated. The Marketing Suite does this to prevent
that users accidentally instruct us to send confidential 
information to a wrong server. During the validation
procedure you are asked to copy a small text file to your webserver, 
so that we can see that the server really belongs to you.

The name and contents of the text file is unique for each feedback loop,
and can be fetched from the Marketing Suite. You must copy it to one of
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

## More information

- [Statistics](./statistics)
- [Unsubscribe behaviour](./database-unsubscribe-behavior)

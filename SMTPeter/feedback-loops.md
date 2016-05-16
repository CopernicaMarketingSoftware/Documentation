# Feedback loops

SMTPeter allows you to set up feedback loops. These feedback loops allow
you to receive realtime event notifications. Every time when something happens
on the SMTPeter servers (like an incoming bounce, a failed  delivery or 
when someone clicks on a link), SMTPeter makes a call to your server to 
notify you about this event.

The feedback is sent over the HTTP or HTTPS protocol using the HTTP POST
mechanism. When you [set up a feedback loop](feedback-setup), you register 
a web address and specify the type of events that you are interested in. 
Once your URL has been validated, SMTPeter starts making calls to it.


## Watch out!

Before you set up a feedback loop, please do make sure that your server
is capable of handling the load. Especially the feedback loop that is
called [feedback-opens](when someone opens a mail) receives huge
numbers of calls.

If you're not sure whether your server can handle the load, or when you do
not need realtime feedback, you better use the [REST API](rest-api) to 
periodically download [the latest log files](rest-logfiles). The REST API 
gives you access to exactly the same data as the feedback loops, but you 
stay in control and you decide when to fetch the data.


## Type of events

The following feedback loops can be used:

* [Feedback loops for bounces](feedback-bounces)
* [Feedback loops for failures](feedback-failures)
* [Feedback loops for clicks](feedback-clicks)
* [Feedback loops for opens](feedback-opens)


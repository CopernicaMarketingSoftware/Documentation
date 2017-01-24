# Feedback loops
The dashboard in MarketingSuite allows you to configure *feedback loops*. Feedback loops are processes that are triggered whenever a certain event happens, such as a click or an open, and report it to the user in real time via HTTP POST.

You could use this if you want to update data in your own application upon certain events Copernica picks up. To achieve this, place a script on your own server that executes upon Copernica's calls, and in the MarketingSuite dashboard, set the triggers. That is all!

The good thing about feedback loops is that the data Copernica sends you is a lot richer than the data Copernica receives in the first place. All Copernica sees when receiving a click or open is the IP addresss and HTTP headers of the incoming request. To that, we add the e-mail address, profile data and the linked tags and send it to you. This way, your script receives the data that makes it easy to link the data to data in your own system.

## Microsoft's, Gmail's and Yahoo's feedback loops
If you've been around for a while in the email marketing business, you might know about the feedback loops ESP's like Microsoft and Gmail offer. These, however, are different feedback loops than the ones described in this article.

Feedback loops from ESP's are used to notify senders (like Copernica) when users hit the "this is spam"-button or interact with the email otherwise. We're talking about a feedback from the ESP to us, whereas the feedback loops we offer are from us to you. Contrary to the ESP feedback loops, ours are non-aggregated and sent in real-time.

## Setting up a feedback loop
Setting up a feedback loop happens from the Marketing Suite dashboard, In the *configuration* menu, you can fill in the address the HTTP POST call is sent to. It's pretty self explanatory: select the events you're interested in and provide the location of your script.

We've got a built-in security system in the feedback loops. To prevent sending data to servers that don't belong to you, you have to prove you have access to the server you've set up. After vreating a feedback loop, you have to place a small verification file onto your server. Only after Copernica downloads and verifies this file do we start making calls.

## Data
Copernica sends all data in HTTP POST format to your script. The only thing you have to do, is place a simple script onto your server that catches these data and uses them for something. The following data are sent with the calls, if possible:
- *ip*
- *useragent*
- *referer*
- *timestamp*
- *tags*
- *recipient*
- *type*

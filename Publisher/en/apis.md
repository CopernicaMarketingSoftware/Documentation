# Automatic links

There are multiple ways to link Copernica to other applications. 
Copernica has two APIs to read or edit data in Copernica and due to 
[*WebHooks*](./webhooks) it's possible to get notifications of clicks, opens and 
bounces in real time.

## REST vs. SOAP

Copernica has two different APIs: a REST API and a SOAP API, of which 
the REST API is the newest. We advise to use the REST API if possible, 
because it is easier to use. It's also faster due to the lack of complex 
SOAP layer between calls.

## WebHooks

Except API calls, Copernica also supports webhooks. WebHooks, 
in their essence, are the opposite of API calls: instead of requesting 
data from the application, the applications sends you information.

WebHooks are triggered by Copernica when an event happens, such as 
a click or an open. Copernica sends an HTTP POST call to to the user's 
server to notify them on this event. It is up to the user to place a 
script onto your server that receives the call and processes it.

Copernica only starts calling your script once you've configured it 
through the dashboard in MarketingSuite. You have to explicitly specify 
which events you want to be notified on and what address should be used 
to approach your scripts.

The downside of webhooks is that you're not in control over the 
speed of calls. Especially when you set up a webhook that is 
triggered each time an email is opened, the stream of calls could become 
enormous. If your servers aren't capable of handling such a large stream 
of data, it's best not to use webhooks.

## Log files

All events that are sent to webhooks, are also written onto logfiles. 
If you're not able to handle webhooks due to lack of processing 
power or when your script temporarily goes offline, it's always possible 
to read in the logfiles and find the events anyway.

Logfiles can be downloaded from the dashboard in MarketingSuite. 
All mailing related events (such as sent emails, clicks and opens) are 
kept in log files and can be read from the dashboard. Besides that, you 
can download these files using the REST API.

For the time being, the full documentation on the REST API can be found 
[here](./rest-api), and the SOAP API [here](https://archive.copernica.com/en/support/rest/the-copernica-rest-api).

## More information

* [REST API methods](./rest-api)
* [REST events](./rest-get-events)

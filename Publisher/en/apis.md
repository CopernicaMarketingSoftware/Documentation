# Automatic links

Copernica can be linked to other applications using our API's. API's 
(Application Programming Interfaces) allow for exchange of data and form 
the bridge between applications. Copernica has a SOAP API as well as a 
REST API, both of which can be used to read and edit information. Another 
option to link applications is through the use of [*Webhooks*](./webhooks), 
which Copernica uses to send real-time notifications about events like 
clicks, opens and bounces.

## REST vs. SOAP

Before you start using an API you should know which API fits your needs 
best. SOAP, for example, is language and platform independent, while REST 
depends on HTTP. SOAP is also standardized and uses extensive XML files, while 
our REST API uses smaller, more manageable JSON files. The REST API is faster 
because of this. If you are new to APIs we recommend starting with REST.

## WebHooks

Except API calls, Copernica also supports Webhooks. Webhooks, 
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

The downside of Webhooks is that you're not in control over the 
speed of calls. Especially when you set up a webhook that is 
triggered each time an email is opened, the stream of calls could become 
enormous. If your servers aren't capable of handling such a large stream 
of data, it's best not to use Webhooks.

## Log files

All events that are sent to Webhooks, are also written onto logfiles. 
If you're not able to handle Webhooks due to lack of processing 
power or when your script temporarily goes offline, it's always possible 
to read in the logfiles and find the events anyway.

Logfiles can be downloaded from the dashboard in MarketingSuite. 
All mailing related events (such as sent emails, clicks and opens) are 
kept in log files and can be read from the dashboard. Besides that, you 
can download these files using the REST API.

For the time being, the full documentation on the REST API can be found 
[here](./restv3/rest-api), and the SOAP API [here](./soap-api-documentation).

## More information

* [REST API methods](./restv3/rest-api)

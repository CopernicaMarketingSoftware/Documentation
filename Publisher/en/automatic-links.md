# Automatic links
There are multiple ways to link Copernica to other applications. Copernica has two APIs to read or edit data in Copernica and due to feedback loops it's possible to get notifications of clicks, opens and bounces in real time.

## REST vs SOAP
Copernica has two different APIs: a REST API and a SOAP API, of which the REST API is the newest. We advise to use the REST API if possible, because it is easier to use. It's also faster due to the lack of complex SOAP layer between calls.

If you're looking to do less common and more complex calls, you'll prefer the SOAP API. Where the REST API only supports common calls, such as adding and editing profile data, the SOAP API also supports less common ones.

## Feedback Loops
Except API calls, Copernica also supports feedback loops. Feedback loops, in their essence, are the opposite of API calls: instead of requesting data from the application, the applications sends you information.

Feedback loops are triggered by Copernica when an event happens, such as a click or an open. Copernica sends an HTTP POST call to to the user's server to notify them on this event. It is up to the user to place a script onto your server that receives the call and processes it.

Copernica only starts calling your script once you've configured it through the dashboard in MarketingSuite. You have to explicitly specify which events you want to be notified on and what address should be used to approach your scripts.

The downside of feedback loops is that you're not in control over the speed of calls. Especially when you set up a feedback loop that is triggered each time an email is opened, the stream of calls could become enormous. If your servers aren't capable of handling such a large stream of data, it's best not to use feedback loops.

## Log files
All events that are sent to feedback loops, are also written onto logfiles. If you're not able to handle feedback loops due to lack of processing power or when your script temporarily goes offline, it's always possible to read in the logfiles and find the events anyway.

Logfiles can be downloaded from the dashboard in MarketingSuite. All mailing related events (such as sent emails, clicks and opens) are kept in log files and can be read from the dashboard. Besides that, you can download these files using the REST API.

For the time being, the full documentation on the REST API can be found [here](https://archive.copernica.com/en/support/apireference), and the SOAP API [here](https://archive.copernica.com/en/support/rest/the-copernica-rest-api).
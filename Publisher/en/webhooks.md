# Webhooks

In the Marketing Suite configuration menu you can find the menu `Webhooks`, 
previously called Feedback Loops. Webhooks are processes that notify their 
user of events that happen in real time through HTTP POST. This allows 
you to always have the most recent results of your mailing. Please note 
that this functionality is currently only available in the Marketing Suite.

While Webhooks are very useful, they should be used with caution as they 
can generate large amounts of calls. If you are unsure about your server 
capacity or do not need real-time feedback you can also view the 
[statistics](./statistics "Viewing statistics in the Marketing Suite") or 
[logfiles](./logfiles-ms "How to retrieve Marketing Suite logfiles") or 
use one of [Copernica's APIs](./apis "Copernica's SOAP and REST APIs").

There are several types of Webhooks. The articles linked below explain 
these types in more detail:

* [Webhooks for bounces](webhook-bounces)
* [Webhooks for failures](webhook-failures)
* [Webhooks for deliveries](webhook-deliveries)
* [Webhooks for clicks](webhook-clicks)
* [Webhooks for opens](webhook-opens)
* [Webhooks for (sub)profile creations](webhook-creates)
* [Webhooks for (sub)profile updates](webhook-updates)
* [Webhooks for (sub)profile removals](webhook-deletes)

## Webhooks with Marketing Suite

Webhooks can be used to sync data that passes through Copernica 
directly into your own application. Webhooks require a script on 
your own server to execute whenever information is provided through the 
Webhook. You can set several triggers in the Webhooks menu such 
as deliveries, opens, clicks, profile edits and bounces.

The data you receive is very rich and allows you to easily link it to the 
data already present in your system. Copernica receives the IP address and 
HTTP headers of the incoming request and adds the e-mail address, profile 
data and linked tags to send to you. Based on this information it is 
easy to add the information to the correct profile.

By navigating to a database or collection you can also easily view all 
Webhooks that are linked to it, making it easy to see 
which Webhooks apply to this specific set of data.

## Setting up Webhooks

The first step for setting up a Webhook is to navigate to the `CONFIGURATION` 
menu, where you can find the Webhooks menu under the `Account` section. 
To create a Webhook you pick a type and then add the callback URL, where 
the data will be sent to after configuration.


The next step is to verify your web address. This extra step ensures that 
your potentially confidential data will be sent to the correct server. 
You can add your main domain at [validated domains](https://ms.copernica.com/#/admin/company/domains) under `Your company` in the [configuration](https://ms.copernica.com/#/admin) section. If you click this domain in the validation tab, you will find a TXT record that needs to be added to your DNS configuration. Once you have set this up in your DNS, you can ensure that this domain and its subdomains can be used for Webhooks by clicking the validate button.

You can test your new Webhook by clicking on `Test webhook` in the Webhook itself or  
the `Check now` button in the Webhook menu to test all your Webhooks.

## Security

To protect your endpoint from abuse and false information injection, Copernica 
[signs all requests](./webhook-security) to your endpoint, so you can be sure 
it's actually Copernica sending you the data. 

## More information

* [Statistics](./statistics)
* [Logfiles](./logfiles-ms)
* [REST API](./rest-api)
* [SOAP API](./soap-api-documentation)
* [Webhooks for bounces](webhook-bounces)
* [Webhooks for failures](webhook-failures)
* [Webhooks for deliveries](webhook-deliveries)
* [Webhooks for clicks](webhook-clicks)
* [Webhooks for opens](webhook-opens)
* [Webhooks for (sub)profile creations](webhook-creates)
* [Webhooks for (sub)profile updates](webhook-updates)
* [Webhooks for (sub)profile removals](webhook-deletes)

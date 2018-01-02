# Webhooks

In the Marketing Suite menu you find a tab called `WEBHOOKS`, previously 
called Feedback Loops. Webhooks are processes that notify their 
user of events that happen in real time through HTTP POST. This allows 
you to always have the most recent results of your mailing. Please note 
that this functionality is currently only available in the Marketing Suite.

WARNING: Some webhooks generate a large amount of calls. Please make 
sure your server is capable of handling the load before setting up a 
WebHook.

## Webhooks with Marketing Suite

Webhooks can be used to sync data that passes through Copernica 
directly into your own application. Webhooks require a script on 
your own server to execute whenever information is provided through the 
WebHook. You can set several triggers in the Webhooks tab such 
as opens, clicks, profile edits and bounces.

The data you receive is very rich and allows you to easily link it to the 
data already present in your system. Copernica receives the IP address and 
HTTP headers of the incoming request and adds the e-mail address, profile 
data and linked tags to send to you. Based on this information it is 
easy to add the information to the correct profile.

## Setting up Webhooks

Click on the tab called `WEBHOOKS` inside the Marketing Suite.
In the Webhooks menu, you can fill in the address the HTTP POST 
call is sent to in the manage menu. It's pretty self explanatory: 
select the events you're interested in and provide the location of 
your script.

There are several types of webhooks. The articles linked below explain 
these types in more detail:

* [Webhooks for bounces](webhook-bounces)
* [Webhooks for failures](webhook-failures)
* [Webhooks for clicks](webhook-clicks)
* [Webhooks for opens](webhook-opens)
* [Webhooks for profile creations](webhook-creates)
* [Webhooks for profile updates](webhook-updates)
* [Webhooks for profile removals](webhook-deletes)

## Webhook for specific database or collection

The Marketing Suite gives you the possibility to see all webhooks that 
are linked to a certain database or collection, making it easy to see 
which webhooks apply to this specific set of data.

## URL validation

Before calls are made to your URL, the web address first has
to be validated. The Marketing Suite does this to prevent
that users accidentally instruct us to send confidential 
information to a wrong server. During the validation
procedure you are asked to copy a small text file to your webserver, 
so that we can see that the server really belongs to you.

The name and contents of the text file is unique for each webhook 
and can be fetched from the Marketing Suite. You must copy it to one of
two possible locations: to the root of your webserver, or to the same directory 
where your webhook script is located. Thus: if you've set up "https://domain.com/dir/script.php"
as your webhook script, you must copy the "smtpeter-xxxxx.txt" file
to your webserver so that it becomes accessible via either 
"https://domain.com/dir/smtpeter-xxxxx.txt" or "https://domain.com/smtpeter-xxxxx.txt".

You can remove the text file from your server after the address has been 
validated.

## Testing the webhook

The dashboard comes with a useful tool to test your webhook. You can 
enter the post data that you want to send to your WebHook and send it right away.

## Handling the calls

As mentioned before webhooks may generate a lot of calls. This can 
be taxing on your server, so make sure it can handle the load. Especially 
the [webhook for opens](webhook-opens) may cause a huge number of calls. 
If you are unsure about the server capacity or not interested in real-time 
feedback you can also use the [general statistics](statistics).

## More information

- [Statistics](./statistics)
- [Unsubscribe behaviour](./database-unsubscribe-behavior)

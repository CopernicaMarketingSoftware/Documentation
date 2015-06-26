# Mail Transfer Agent Management Console

MailerQ comes equipped with a full MTA management console. The management console allows you to monitor the performance of your email delivery in real-time. If necessary, the management console can be used to change settings to maximize deliverability on the fly. If you have multiple instances of MailerQ running in a cluster you can easily switch between them.

## View the Management Console demo

For those of you that want to see the MailerQ management console in action, you can! Go to our [Management Console demo](http://demo.mailerq.com "MailerQ Demo environment") and see our interface in action. The data in the environmnet is fictional, but all settings are available. Feel free to play around with the settings and explore the options available.

## Status overview

The status overview shows a summary of the email messages passing through MailerQ. Here you can see how many messages have been processed, delivered, retried, failed and more. It also shows the amount of SMTP connections are currently active and how many are being attempted.

![MailerQ status](copernica-docs:Mailerq/Images/mailerq-overview.png)

### AMQP monitor

The Overview interface also shows a summery of the messages going through your RabbitMQ queues. It shows exactly how many messages RabbitMQ has received, the amount of rescheduled messages, the messages in memory and the results (success, failure, retries). It also shows the amount of active temporary queues.

## MTA IPs

To get a more detailed picture, the MailerQ MTA management console allows you to zoom in on per-IP performance. This list is updated in real time.

![MailerQ IP's](copernica-docs:Mailerq/Images/mailerq-mta-ips.png)

## Domains

Not every domain likes to receive email at high rates. The domains view provides real-time information on per-domain performance e.g. queues or failed deliveries. Use this info to make adjustments on the fly for example modify email throttle settings.

![MailerQ domains](copernica-docs:Mailerq/Images/mailerq-domains.png)

## Email throttling

Setting up email throttling can be done in the MailerQ Management Console. All throttling settings can be adjusted in real-time, making it easy to improve your email delivery when needed. You can choose to set up throttling settings for a single domain for all IP addresses or for all IP addresses.

![MailerQ domains](copernica-docs:Mailerq/Images/mailerq-email-throttling.png)

## Flood patterns

Flood patterns are rules that override the default throttling settings of MailerQ when the Mail
Transfer Agent receives a specific error from a receiving mail server.

## DKIM keys

MailerQ supports DKIM, Domain Key Identified Mail, a mehtod for email authentication. Adding DKIM keys can be easily done in the management console.

## Paused deliveries

The paused deliveries tab in the Management Console of our Mail Transfer Agent shows you exactly what email deliveries are currently paused. It shows which IP address is paused to which remote IP/domain and until when the delivery is paused. You can also manually pause email deliveries if necessary.

## Redirected deliveries

Email deliveriy can also be redirected from one IP to another IP. For example when one of your IPs is greylisted by a receiving domain. The redirected delivery shows all redirecting rules and which delivery is currently being redirected. You can also manually set up redirections.


## Log files

Every delivery attempt is registered by MailerQ is saved in the MailerQ log files. These files can be viewed in the MailerQ management console.


## Live SMTP monitor using web sockets

One of MailerQ's cool features (if we may say so) is the live SMTP monitor. By starting up the monitor in the management console, your browser opens a [HTML 5 websocket](http://www.websocket.org) to the core MailerQ process. All SMTP traffic received and sent out by MailerQ is also sent to this websocket, so you can exactly keep an eye on what is happening to your mailings.

![MailerQ SMTP monitor with websockets](copernica-docs:Mailerq/Images/mailerq-websocket.png)
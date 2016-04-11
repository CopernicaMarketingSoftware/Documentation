# Management Console: Live SMTP monitor using web sockets

One of MailerQ's cool features (if we may say so) is the live SMTP 
monitor.  By starting up the monitor in the management console, your 
browser opens a [HTML 5 websocket](http://www.websocket.org) to the core
MailerQ process. All SMTP traffic received and sent out by MailerQ is 
also sent to this websocket, so you can exactly keep an eye on what is 
happening to your mailings.

![MailerQ SMTP monitor with websockets](mailerq-websocket.png)

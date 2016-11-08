# Management Console: Domains view

The Domains view shows you live message statistics on a per-domain basis. 
Clicking on a domain takes you to a domain-specific view that show the message statistics
for the domain, in a similar format as the [the Overview page](mgmt-overview#filtering-the-graph).

If there is something wrong with deliveries to a certain domain the domain page will warn you about
all irregularities that occur. 

The current throttling settings applied to a domain can be reviewed in the "Email throttle settings"
section. Note that throttle settings are cascaded from general to specific, which means you may see
more settings than you specified for the domain. Additionally, the domain may be throttled because of flood control.
(you will be warned if this is the case)
Refer to the [Email throttling page](mgmt-throttling) for more information about throttling and flood control.
If a throttle setting limits the amount of deliveries being sent it will be marked in red.

The "Remote IPs" section lists the destination IPs found in the host's DNS record and indicates if there is
a problem with a specific IP.
By pressing the green "Running" button you can pause deliveries to an individual IP. If an IP is paused, MailerQ
will first look for other available IPs to send messages to; if no IP is found the message is put in a temporary queue in RabbitMQ.

If one or more forced errors are configured for the domain they will appear in the "Forced errors" section.

To give you an idea of where your messages are in MailerQ, the "Queues" section contains counters indicating how many messages are 
contained in each queue. MailerQ keeps an in-memory queue for the messages it plans to send as soon as possible, this is a fast
queue that is flushed as soon as connections are available. If MailerQ gets more messages than it can handle at a time it will
temporarily save this messages in a seperate RabbitMQ queue; as soon as MailerQ can send more messages to the domain it will
consume messages from this queue. Lastly, there is a counter for the messages that are still being processed by MailerQ,
these messages are still being sent over SMTP or being appended to the logs.

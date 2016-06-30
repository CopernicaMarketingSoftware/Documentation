# Management Console: Domains view

The Domains view shows you live message statistics on a per-domain basis. 
Clicking on a domain takes you to a domain-specific graph on 
[the Overview page](mgmt-overview#filtering-the-graph).

<!-- TODO: include this. 
MailerQ keeps a maximum number of messages in its main memory, specified by XXX.
To avoid filling this up entirely with messages to a single domain, you can also
specify a maximum per domain; see XXX.  When this maximum is exceeded, the excess
messages are pushed into a domain-specific RabbitMQ queue, allowing later
retrieval.
-->

Not every domain likes to receive email at high rates.  To throttle the number of
emails sent to a specific domain, refer to the [Email throttling](mgmt-throttling) 
view.

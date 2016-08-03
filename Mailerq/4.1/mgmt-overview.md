# Management Console: Status overview interface

Once you open the management console, you first see the Status
Overview interface. This shows a summary of the email messages passing through
MailerQ. Here you can see how many messages have been processed, delivered,
retried, failed and more, either for one specific MTA or for all combined.
It also shows the number of SMTP connections that are currently active and how 
many are being attempted.

The green "Running" button allows you to pause certain MTAs, which will then
show up in the [Paused Deliveries](management-console#pause-deliveries) view.
Do note however that pausing will quickly fill up the RabbitMQ queues.

## Filtering the graph

Selecting a single MTA through the dropdown menu also allows you to rename an 
MTA.  Note that renaming will not affect the MTA hostname; this MTA name is only 
used within MailerQ.

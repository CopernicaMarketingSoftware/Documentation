# Management Console: Tags view

You may be injecting various types of messages into MailerQ, for example messages belonging to
your various customers or campaigns. To help you get a better overview, MailerQ allows you to tag 
the messages you inject with one or more labels of your choosing. 
The "Tags" view will show a list of all tags that have been recently used in a message, containing counters 
of recent deliveries and possibly of recent errors.

Selecting a tag will take you to a tag-specific status page with live statistics of the message rates and
possible errors.
If you require more specific information about the individual messages you can select the "View in logs"
button, which will take you to a live overview of deliveries with this tag as they are sent to the log files.
(see the [logs page](mgmt-logs) for more information)

The green "Running" button allows you to pause deliveries with a certain tag, which will temporarily store
these messages in a RabbitMQ queue belonging to the tag. Note however that pausing a tag is a temporary solution 
and it is generally not advisable to keep messages in RabbitMQ if you do not plan on sending them.
If you mean to block deliveries with a certain tag you can choose to configure a [forced error](mgmt-forced) instead of pausing the tag.
Any forced error that is configured for a tag will be displayed on the tag overview page.

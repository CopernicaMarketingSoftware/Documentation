# Configuration file

MailerQ reads its configuration from the `/etc/mailerq/config.txt` config 
file.  This file holds configuration options for the connection to RabbitMQ, 
NoSQL storage engine and database (MySql, Sqlite or PostgreSql) and other 
options for MailerQ itself.

The config file, and the documentation, has been split up in different
sections. Please choose the select the section that you're interested in.

* [RabbitMQ settings](rabbitmq-config "RabbitmQ configuration")
* [Cluster settings](cluster "Cluster configuration")
* [Database settings](database-access "Database access")
* [Message store settings](message-store-options "Message Store options")
* [Default delivery throttle](delivery-limits "Delivery Throttling")
* [Logging](logging "Logging")
* [Incoming messages](incoming-messages "Incoming messages")
* [Smarthost & debugging](smarthost "Smarthost & debugging")
* [Management console](management-console "Management console")
* [Other options](other-configuration "Other configuration options")


## Are you looking for more settings?

The config file is not the only place where MailerQ gets its configuration
from. Most of the settings relevant for deliveries are not stored in the 
config file, but are loaded from the database. The web based management 
console allows you to read or change these settings, and you can of course
also access the database directly to read or update these settings.

Besides the settings in the config file, it is also possible to override
settings on a per-message basis. You can do this by adding special headers
to the email messages, or by assing properties to the JSON messages if you
inject messages into RabbitMQ directly.


# Configuration file

MailerQ reads its configuration from the `/etc/mailerq/config.txt` config 
file.  This file holds configuration options for the connection to RabbitMQ, 
NoSQL storage engine and database (MySQL, SQLite or PostgreSQL) and other 
options for MailerQ itself.

The config file, and the documentation, has been split up in different
sections.

* [RabbitMQ settings](rabbitmq-config "RabbitmQ configuration")
* [Cluster settings](cluster-config "Cluster configuration")
* [Database settings](database-access "Database access")
* [Message store settings](message-store-options "Message Store options")
* [Defauly delivery throttle](delivery-limits "Delivery Throttling")
* [Logging](logging "Logging")
* [Incoming messages](incoming-messages "Incoming messages")
* [Smarthost & debugging](smarthost "Smarthost & debugging")
* [Management console](management-console "Management console")
* [Other options](other-configuration "Other configuration options")


## Management console and database

The config file is not the only place where MailerQ gets its configuration
from. Most of the settings relevant for deliveries are fetched from the
database and can be set using the management console or can be directly
written to the database.


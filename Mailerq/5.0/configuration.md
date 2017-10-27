# Configuration file

MailerQ reads its configuration from the "/etc/mailerq/config.txt" config 
file. This file holds configuration options for the connection to RabbitMQ, 
NoSQL storage engine and database (MySql, Sqlite or PostgreSql) and other 
options for MailerQ itself.

The config file, and the documentation, has been split up in different
sections. Please select the section that you're interested in or 
find the desired setting in the [A-Z settings overview](settings-alphabetical).

* [RabbitMQ settings](rabbitmq-config "RabbitmQ configuration")
* [Multiple instances](multiple-instances "Multiple MailerQ instances on a single server")
* [Cluster settings](cluster "Cluster configuration")
* [Database settings](database-access "Database access")
* [Message store settings](message-store-options "Message Store options")
* [Logging](logging "Logging")
* [Smarthost & debugging](smarthost "Smarthost & debugging")
* [Management console](management-console "Management console")
* [Responsive Email](responsiveemail "ResponsiveEmail.com integration")
* [Other options](other-configuration "Other configuration options")

## Are you looking for more settings?

The config file is not the only place where MailerQ gets its configuration
from. Most of the settings relevant for deliveries are not kept in the 
config file, but are loaded from a relational database. The web based management 
console allows you to read or change these settings, and you can of course
also access the database directly to read or update these settings.

## More information

* [Minimal configuration](minimal-configuration "The minimal configuration for MailerQ")
* [A-Z settings list](settings-alphabetical "See all settings from A-Z")


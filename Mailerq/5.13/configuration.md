# Configuration

MailerQ has lots of configuration options. Each option can be supplied in
three different ways:

1. Via a configuration file. Its location is `/etc/mailerq/config.txt`.
2. Via a command-line option.
3. Via an environment variable.

When a configuration option is given on the command-line, it overrides the
value specified in the configuration file. Similarly, when a configuration
option is set in an environment variable, it overrides both the configuration
file as well as the command-line option.

## Overridability

Overridability of keys follows a simple pattern. If you want to override such a
key via the command-line, add two dashes in front of the key name. If you want
to override the key via an environment variable, uppercase the key, prepend the
string `MAILERQ_` to it, and replace dashes with underscores.

As an example, the configuration key `rabbitmq-address` can also be given on
the command-line by running

```bash
mailerq --rabbitmq-address=amqp://rabbit.example.com
```

MailerQ will then use `rabbit.example.com` for its RabbitMQ server, instead of
the value that's given in `/etc/mailerq/config.txt`. Similarly, you can provide
an environment variable:

```bash
MAILERQ_RABBITMQ_ADDRESS=amqp://rabbit.example.com mailerq
```

The above will cause MailerQ to use `rabbit.example.com`. If you supply both,
then the environment variable "wins".

## In-depth settings

In the rest of this documentation, we only denote the name of the configuration
key as specified in the configuration file.

The documentation for the various options is split up in different sections.
Please select the section that you're interested in or find the desired
setting in the [A-Z settings overview](settings-alphabetical).

* [RabbitMQ settings](rabbitmq-config "RabbitmQ configuration")
* [Cluster settings](cluster "Cluster configuration")
* [Database settings](database-access "Database access")
* [Message store settings](message-store-options "Message Store options")
* [Logging](logging "Logging")
* [Smarthost & debugging](smarthost "Smarthost & debugging")
* [Management console](management-console "Management console")
* [Responsive Email](responsiveemail "ResponsiveEmail.com integration")
* [Multiple instances](multiple-instances "Multiple MailerQ instances on one server")
* [DNS settings](dns-settings "DNS settings")
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


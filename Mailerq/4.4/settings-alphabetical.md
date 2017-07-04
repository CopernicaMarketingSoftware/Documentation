# Configuration A-Z

This article contains a list of all configuration settings, sorted 
alphabetically. Each setting links to a documentation article that explains 
the setting more in-depth. Want to search by topic? [Click here](configuration "Configure by topic").

| Setting                                                                  | Description
|--------------------------------------------------------------------------|------------------------------------------------------------------------------------------
| [Cache dimensions](responsiveemail#config-file-variables)                | Max no. of images in cache (Used in ResponsiveEmail)
| [Cache size](responsiveemail#config-file-variables)                      | Max size of image cache (Used in ResponsiveEmail)
| [Cluster address](cluster#config-file-options)                           | Address for a cluster to share between instances
| [Cluster exchange](cluster#config-file-options)                          | Set cluster exchange
| [Database](database-access#database-settings-in-the-config-file)         | Relational database for config data and delivery settings
| [Database TTL](database-access#time-to-live)                             | Time to live: Database reload interval (Default 600s)
| [Download log compression](logging#download-logs)                        | Download log compression
| [Download log directory](logging#download-logs)                          | Download log directory
| [Download log history](logging#download-logs)                            | Download log history
| [Download log maxage](logging#download-logs)                             | Download log maximum age
| [Download log maxsize](logging#download-logs)                            | Download log maximum size
| [Download log prefix](logging#download-logs)                             | Download log prefix
| [Error log](logging#error-logs)                                          | Name and error of error
| [Error log directory](multiple-instances#log-files-location)             | Error log directory
| [Error log prefix](multiple-instances#log-files-location)                | Error log prefix
| [Heartbeat enabled](other-configuration#user-statistics)                 | Toggle user statistics (default: true)
| [License](other-configuration#license)                                   | MailerQ license file
| [Lock](multiple-instances#lock)                                          | Process ID for MailerQ instance to prevent from starting instances more than once
| [Maximum attempts](other-configuration)                                  | Maximum attempts to deliver email
| [Maximum delivery time](other-configuration)                             | Maximum time spent trying to deliver email
| [RabbitMQ address](rabbitmq-config#rabbitmq-address)                     | Location and authentication to connect to RabbitMQ
| [RabbitMQ consumers](rabbitmq-config#multiple-threads)                   | Amount of consumer threads (default: 1)
| [RabbitMQ dsn](rabbitmq-config#rabbitmq-queues)                          | Your RabbitMQ delivery status notification queue  
| [RabbitMQ durable](rabbitmq-config#persistent-and-durable-settings)      | Durable/not durable RabbitMQ queues (default: true)
| [RabbitMQ encoding](rabbitmq-config#compression)                         | Choose encoding for messages (such as gzip)
| [RabbitMQ inbox](rabbitmq-config#rabbitmq-queues)                        | Your RabbitMQ inbox queue
| [RabbitMQ exchange](rabbitmq-config#the-exchange)                        | RabbitMQ exchange
| [RabbitMQ failure](rabbitmq-config#rabbitmq-queues)                      | Your RabbitMQ failure queue
| [RabbitMQ local](rabbitmq-config#rabbitmq-queues)                        | Your RabbitMQ local queue 
| [RabbitMQ outbox](rabbitmq-config#rabbitmq-queues)                       | Your RabbitMQ outbox queue (must be unique if multiple instances of MailerQ are used)
| [RabbitMQ persistent](rabbitmq-config#persistent-and-durable-settings)   | Persistent/not persistent RabbitMQ queues (default: false)
| [RabbitMQ publishers](rabbitmq-config#multiple-threads)                  | Amount of publisher threads (default: 1)
| [RabbitMQ queues](rabbitmq-config#rabbitmq-queues)                       | Names of the RabbitMQ queues to manage email (inbox, failures, retries, etc...)
| [RabbitMQ refused](rabbitmq-config#rabbitmq-queues)                      | Your RabbitMQ refused queue
| [RabbitMQ reports](rabbitmq-config#rabbitmq-queues)                      | Your RabbitMQ report queue
| [RabbitMQ results](rabbitmq-config#rabbitmq-queues)                      | Your RabbitMQ result queue
| [RabbitMQ retry](rabbitmq-config#rabbitmq-queues)                        | Your RabbitMQ retry queue
| [RabbitMQ success](rabbitmq-config#rabbitmq-queues)                      | Your RabbitMQ success queue
| [Received log compression](logging#received-messages)                    | Received log compression
| [Received log directory](logging#received-messages)                      | Received log directory
| [Received log history](logging#received-messages)                        | Received log history
| [Received log maxage](logging#received-messages)                         | Received log maximum age
| [Received log maxsize](logging#received-messages)                        | Received log maximum size
| [Received log prefix](logging#received-messages)                         | Received log prefix
| [Retry interval](other-configuration)                                    | Interval for retrying to send
| [Smarthost (hostname)](smarthost#how-to-configure-the-smarthost-feature) | Smarthost name (only needed if Smarthost is desired)
| [Smarthost password](smarthost#how-to-configure-the-smarthost-feature)   | Smarthost password
| [Smarthost port](smarthost#how-to-configure-the-smarthost-feature)       | Smarthost port
| [Smarthost username](smarthost#how-to-configure-the-smarthost-feature)   | Smarthost username
| [SMTP IP](rabbitmq-config#listening-ip/ports-combinations)               | SMTP server IP
| [SMTP sink IP](smarthost#using-smarthost-for-debugging)                  | SMTP sink IP
| [SMTP sink password](smarthost#using-smarthost-for-debugging)            | SMTP sink password
| [SMTP sink port](smarthost#using-smarthost-for-debugging)                | SMTP sink port
| [SMTP sink username](smarthost#using-smarthost-for-debugging)            | SMTP sink username
| [Send log compression](logging#send-logs)                                | Send log compression
| [Send log directory](logging#send-logs)                                  | Send log directory
| [Send log history](logging#send-logs)                                    | Send log history
| [Send log maxage](logging#send-logs)                                     | Send log maximum age
| [Send log maxsize](logging#send-logs)                                    | Send log maximum size
| [Send log prefix](logging#send-logs)                                     | Send log prefix
| [Server ID](multiple-instances#server-id)                                | Server ID to prevent multiple instances from assigning same message ID
| [Storage address](message-store-options)                                 | Address for external message storage
| [Storage policy](message-store-options)                                  | Message store policy
| [Storage threads](message-store-options)                                 | Storage threads
| [Storage TTL](message-store-options)                                     | Time to live: Storage reload interval
| [User](other-configuration#user)                                         | Change user for MTA
| [www certificate](mgmt-setup#setting-up-a-secure-management-console)     | Certificate file for secure connection to management console
| [www ciphers](mgmt-setup#setting-up-a-secure-management-console)         | Supported ciphers for secure management console
| [www connections](mgmt-setup#activation)                                 | Limit for simultaneous HTTP connections to built-in HTTP server
| [www IP](multiple-instances#listening-ip/ports-combinations)             | Web interface IP (IP/port combination unique for every instance of MailerQ)
| [www dir](mgmt-setup#activation)                                         | Directory for installing MailerQ management console files
| [www host](multiple-instances#listening-ip/ports-combinations)           | Web interface host (IP/port combination unique for every instance of MailerQ)
| [www password](mgmt-setup#activation)                                    | Management console password
| [www port](mgmt-setup#activation)                                        | Port number for the management console
| [www private key](mgmt-setup#setting-up-a-secure-management-console)     | Private key for secure connection to management console
| [www secure port](mgmt-setup#setting-up-a-secure-management-console)     | Secure (HTTPS) port number for the management console

## More information

* [MailerQ configuration](configuration "Configuring MailerQ")
* [MailerQ minimal configuration](minimal-configuration "Minimal configuration for MailerQ")
* [Management console](management-console "The management console")

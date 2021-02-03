# MailerQ Webhook

This application allows you to forward MailerQ's result to an (external) web endpoint. The endpoint can simply listen for JSON messages and process them as it sees fit. 
Webhook uses the results queue in RabbitMQ where MailerQ publishes all its results. If needed, Webhook can duplicate these messages into a separate queue and consume from there, so that the original queue is left untouched.
When Webhook encounters a message that it cannot parse (invalid JSON), it can forward this message to an error queue so that you can later retrieve it.
Both the mirror queue and the error queue can be created in advance by the user, or left to be created by the Webhook. Please see the example configuration below how to setup the various queues.

## Installation
###Installing MailerQ on Debian / Ubuntu based systems
You can run the following commands in your terminal to add our repository to your package manager, download and install MailerQ Webhook.

```
# Download and add the repository key
wget -qO - https://packages.mailerq.com/mailerq.key | sudo apt-key add -
# Add the MailerQ repository to apt
echo "deb https://packages.mailerq.com/debian stable main" | sudo tee /etc/apt/sources.list.d/mailerq.list
# Update the apt cache
sudo apt update
# Install the latest MailerQ
sudo apt install mailerq-webhook
```

###Installing MailerQ on Red Hat based systems
You can enter the following commands in your terminal to add our repository to your package manager, download and install MailerQ Webhook.

```
# Add the MailerQ repository to yum
sudo wget https://packages.mailerq.com/rpm/mailerq.repo -O /etc/yum.repos.d/mailerq.repo
# Install the latest MailerQ
sudo yum install mailerq-webhook
```

## Configuration

By default, Webhook reads its options from `/etc/mailerq/webhook.txt`. This can be overridden by passing `--config-file /path/to/config.txt` on the command line. All options can also be individually overriden by passing them on the command line as `--option <value>`.

The following is an example configuration file containing all possible options with the default value and an explanation of each option. `rabbit-address` and `endpoint` are mandatory settings and therefore have no default, but examples are given.

```
# Log output control
# Supply a list of streams (stdout,stderr) or paths to log to
application-log:            stdout

# Username the application should drop to
# Leave empty to keep Webhook running as root
user:    

# Endpoint configuration
# Endpoint url where all results should be forwarded to
endpoint:                   http://localhost:8080

# Number of simultaneous connections to open to the endpoint
connections:                10

# RabbitMQ configuration.
# Address of RabbitMQ broker, the format is:
# rabbitmq-address: amqp[s]://login:password@hostname/[vhost]
rabbitmq-address:           amqp://guest:guest@localhost/

# MailerQ results queue (must match MailerQ config)
# This is where results objects will be retrieved from
rabbitmq-results:           results

# Queue on which to mirror the results
# Setting this makes the Webhook mirror the messages from rabbitmq-results
# This allows you to use the results in other applications as well
# Leaving this empty will simply consume messages directly from rabbitmq-results
rabbitmq-mirror:            

# Exchange to bind mirror queue to
# This is only used if rabbitmq-mirror is set
# If this is empty/not set, Webhook will create the mirror queue if it doesn't exist yet
# This should match the MailerQ config
rabbitmq-exchange:          

# TTL for mirror queue created by Webhook, 0 for no expiration
# If the mirror queue doesn't exist and no exchange is configured, the Webhook will create a temporary queue
# This setting controls how long the temporary queue (and its messages) should be retained after Webhook exits
# If the queue still exists when Webhook restarts, it can resume where it left off
rabbitmq-mirror-expire:     0

# Queue or routingkey to publish failed messages
# Setting this will make the Webhook forward messages that could not be parsed to the given queue
# This can be used for debugging purposes or simply to make sure no information is ever lost
# If error-exchange is not set, Webhook will try to create the queue
error-routingkey:            

# Exchange to publish failed messages
# Setting this will cause Webhook to publish failed messages to the given exchange with error-routingkey
# If this is set, you MUST create the queue yourself, if the message fails to route, Webhook will exit to prevent loss of data
error-exchange:             

# Prefetch amount (Quality of Service)
# You can use this to balance speed and memory usage
# The default setting of 1000 should be fine in almost all cases
qos:                        1000
```

# Multiple MailerQ instances on a single server.

You can run multiple MailerQ instances on a single server. But it does
require some extra work.

If you run multiple instances on the same machine, these instances will still all
load their configuration from the central /etc/mailerq/config.txt config
file. This is no problem for most of the settings, but some specific 
settings need to different for each instance. For example, the different 
instances all need a seperate lock file, and have to use different port
numbers to listen to.


## Seperate config file

If you want to run multiple instances at the same time, you still need to
create a central /etc/mailerq/config.txt file with MailerQ's configuration. This 
file contain the settings *that apply to all instances*. But besides this
central config file, you also need additional config files (for example 
/etc/mailerq/instance-1.txt, /etc/mailerq/instance-2.txt, et cetera) for
the individual instances. In these config file you put the instance-specific
settings.

If you start a MailerQ instance, you have to use the `--config-file` command
line option to specify the configuration file to use:

````
mailerq --config-file /etc/mailerq/instance-2.txt
````

With the above command you start a MailerQ process that loads both the normal
/etc/mailerq/config.txt file, as well as the additional /etc/mailerq/instance-2.txt file.

When MailerQ starts, the settings are loaded in the following order:
 
    1. Hardcoded default settings
    2. Default config file (/etc/mailerq/config.txt)
    3. Config file set in --config-file argument (optional)
    4. Command line arguments (optional)

To simplify the configuration files, you can use the default config file for 
all the shared settings and instance specific files with just the unique options.

## Unique settings per instance

There are a couple of settings that almost always must be unique if you run
more than once instance:

- outbox queues
- listening IP/port combinations 
- log files location
- lock file
- server ID

The outbox queue must be unique per instance to manage which messages are sent 
by which MailerQ instance. Port number are limited resources and it is normally
not possible to have multiple processes that all listen to the same port number.
These settings have to be unique too:
 
````
rabbitmq-outbox:        outbox1
smtp-ip:                10.0.0.1
www-ip:                 10.0.0.1
www-host:               mta001.example.com
````
 
## Log files location

To avoid corruption (you don't want that different processes write to the same
log file at the same time) it is advised to use separate log files or log 
directories for the instances. If you choose to use different directories, make 
sure to create then and change ownership to the MailerQ user.
 
This is an example if you use different directories:
 
````
error-log:              /var/log/mailerq/instance1/errors.log
send-log-directory:     /var/log/mailerq/instance1/
download-log-directory: /var/log/mailerq/instance1/
received-log-directory: /var/log/mailerq/instance1/
````
 
This is an example if you use different prefixes:
 
````
error-log:              /var/log/mailerq/instance1-errors.log
send-log-prefix:        instance1-attemtps.log
download-log-prefix:    instance1-downloads.log
received-log-prefix:    instance1-received.log
`````
 
## Lockfile

To prevent a MailerQ instance from starting more than once, MailerQ stores its 
process ID (pid) in a lockfile. This must be unique for every instance:
 
````
lock:                   /tmp/mailerq-instance1.pid
````
 
## Server ID

Each message that is accepted by MailerQ gets a unique message ID. To prevent 
that multiple instances assign exactly the same ID to a message, you can assign 
a "server-id" variable. This identifier guarantees that message ID's never 
conflict.
 
````
server-id:              1
````

## Clustering

We recommend to enable the clustering when running multiple MailerQ instances. 
Because when changes are applied in one web interface, they are also immediately
applied to all instances in a cluster. To enable clustering set the following 
options in the default configuration file:
 
````
cluster-address:        amqp://user:password@rabbitmq.example.com/
cluster-exchange:       cluster
````

## Init.d scripts

If you like to use init scripts to start multiple MailerQ instances, you can 
copy the default init script:
 
````
$ sudo cp /etc/init.d/mailerq /etc/init.d/mailerq-instance1
````
 
and alter the following settings inside the copied file (/etc/init.d/mailerq-instance1):
 
````
NAME="mailerq-instance1"
DESC="MailerQ daemon instance1"
PIDFILE="/tmp/mailerq-instance1.pid"
DAEMON="/usr/bin/mailerq --config-file /etc/mailerq/instance1.txt"
````
 
Now you can start your instances from the terminal like:
 
````
$ sudo service mailerq-instance1 start
````
or

````
$ sudo systemctl start mailerq-instance1
````
 
## Process supervisor (monit example) or cron

To keep instances running you can use a process supervisor like Monit. 
With our previous example, a simple Monit script for MailerQ instance looks like:
 
```
check process mailerq with pidfile /tmp/mailerq-instance1.pid
  group mail
  start program = "/etc/init.d/mailerq-instance1 start"
  stop program = "/etc/init.d/mailerq-instance1 stop"
  if failed host 10.0.0.1 port 25 protocol smtp then restart
```
 
Alternatively you can use cron to restart your MailerQ instances if they are 
not running. This can be set in the crontab for either the root or MailerQ user.
 
````
* * * * * kill -0 $(cat /tmp/mailerq-instance1.pid) || /usr/bin/mailerq --config-file /etc/mailerq/instance1.txt &
* * * * * kill -0 $(cat /tmp/mailerq-instance2.pid) || /usr/bin/mailerq --config-file /etc/mailerq/instance2.txt &
````


## Example config files

An example of two configuration files for different instances:
 
/etc/mailerq/instance1.txt:
````
rabbitmq-outbox: outbox1
rabbitmq-inbox: outbox1
smtp-ip: 10.0.0.1
www-ip: 10.0.0.1
www-host: mta001.example.com
error-log: /var/log/mailerq/instance1-errors.log
send-log-prefix: instance1-attempts.log
download-log-prefix: instance1-downloads.log
received-log-prefix: instance1-received.log
lock: /tmp/mailerq-instance1.pid
server-id: 1
````
 
/etc/mailerq/instance2.txt:
````
rabbitmq-outbox: outbox2
rabbitmq-inbox: outbox2
smtp-ip: 10.0.0.2
www-ip: 10.0.0.2
www-host: mta002.example.com
error-log: /var/log/mailerq/instance2-errors.log
send-log-prefix: instance2-attempts.log
download-log-prefix: instance2-downloads.log
received-log-prefix: instance2-received.log
lock: /tmp/mailerq-instance2.pid
server-id: 2
````

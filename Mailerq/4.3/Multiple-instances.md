# Multiple MailerQ instances on a single server.
With MailerQ it’s possible to run multiple instances on a single server. Although you specify most settings of those instances in the default config file, some settings must be unique per instance. The instance specific settings can be overridden using the --config-file option.
 
## 1. Unique settings per instance
There are a couple of settings that must be unique per instance. The unique settings are:   
- outbox queues
- listening IP/port combinations 
- log files location
- lock file
- server ID
 
### Outbox queue
Outbox queue must be unique per instance to manage which messages are sent by which MailerQ instance. 
 
```
rabbitmq-outbox:	outbox1
```
 
### Listening IP/Ports combinations
There can only be one process listening on a given IP/port combination. MailerQ uses the listening ports for the web interface and the SMTP server. You can choose to use different IPs, ports or IP/port combinations. The simplest setup is to use different IPs.
 
```
smtp-ip: 10.0.0.1
www-ip: 10.0.0.1
www-host: mta001.example.com
```
 
### Log files location
To avoid corruption it is advised to use separate log files or log directories per instance. If you choose to use different directories, make sure to create then and change the owner to the MailerQ user:
 
```
$ sudo mkdir /var/log/mailerq/instance1
$ sudo chown mailerq:mailerq /var/log/mailerq/instance1
```
 
This is an example if you use different directories:
 
```
error-log:              /var/log/mailerq/instance1/errors.log
send-log-directory:     /var/log/mailerq/instance1/
download-log-directory: /var/log/mailerq/instance1/
received-log-directory: /var/log/mailerq/instance1/
```
 
This is an example if you use different prefixes:
 
```
error-log:           /var/log/mailerq/instance1-errors.log
send-log-prefix:     instance1-attemtps.log
download-log-prefix:	instance1-downloads.log
received-log-prefix:	instance1-received.log
```
 
### Lockfile
To prevent a MailerQ instance from starting more than once, MailerQ stores its process ID (pid) in a lockfile. This must be unique for every instance:
 
```
lock: /tmp/mailerq-instance1.pid
```
 
### Server ID
Each message that is accepted by MailerQ gets a unique message ID. To prevent that multiple instances assign exactly the same ID to a message, you can assign a "server-id" variable. This identifier guarantees that message ID's never conflict.
 
```
server-id: 1
```
 
## 2. Settings parsing order.
When MailerQ starts, the settings are loaded in the following order:
 
1. Hardcoded default settings
2. Default config file (/etc/mailerq/config.txt)
3. Config file set in --config-file argument (optional)
4. Command line arguments (optional)

To simplify the configuration files, you can use the default config file for all the shared settings and instance specific files with just the unique options.
 
An example of two configuration files for different instances:
 
/etc/mailerq/instance1.txt:
```
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
```
 
/etc/mailerq/instance2.txt:
```
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
```
 
## 3. Clustering
We recommend to enable the clustering when running multiple MailerQ instances. Because when changes are applied in one web interface, they are also immediately applied to all instances in a cluster. To enable clustering set the following options in the default configuration file:
 
```
cluster-address:	amqp://user:password@rabbitmq.example.com/
cluster-exchange:	cluster
```
 
## 4. Starting multiple instances
To start multiple instances you can simply run these commands: 
```
$ sudo mailerq --config-file /etc/mailerq/instance1.txt &
$ sudo mailerq --config-file /etc/mailerq/instance2.txt &
```
 
Or if you like to use init scripts for starting multiple MailerQ instances, you can copy the default init script:
 
```
$ sudo cp /etc/init.d/mailerq /etc/init.d/mailerq-instance1
```
 
and alter the following settings inside the copied file (/etc/init.d/mailerq-instance1):
 
```
NAME="mailerq-instance1"
DESC="MailerQ daemon instance1"
PIDFILE="/tmp/mailerq-instance1.pid"
DAEMON="/usr/bin/mailerq --config-file /etc/mailerq/instance1.txt"
```
 
Now you can start your instances from the terminal like:
 
```
$ sudo service mailerq-instance1 start
```
or
```
$ sudo systemctl start mailerq-instance1
```
 
### Process supervisor (monit example)
To keep instances running you can use a process supervisor like Monit. 
With our previous example, a simple Monit script for MailerQ instance looks like:
 
```
check process mailerq with pidfile /tmp/mailerq-instance1.pid
  group mail
  start program = "/etc/init.d/mailerq-instance1 start"
  stop program = "/etc/init.d/mailerq-instance1 stop"
  if failed host 10.0.0.1 port 25 protocol smtp then restart
```
 
### Cron
Alternatively you can use cron to restart your MailerQ instances if they are not running. This can be set in the crontab for either the root or MailerQ user.
 
```
* * * * * kill -0 $(cat /tmp/mailerq-instance1.pid) || /usr/bin/mailerq --config-file /etc/mailerq/instance1.txt &
* * * * * kill -0 $(cat /tmp/mailerq-instance2.pid) || /usr/bin/mailerq --config-file /etc/mailerq/instance2.txt &
```

# Setting up RabbitMQ

MailerQ heavily depends on RabbitMQ for all its queueing. You therefore need a 
running RabbitMQ instance (or better: a cluster of instances) before you can start 
MailerQ. We do not intend to write a full installation guide for RabbitMQ here 
(you better check the [www.rabbitmq.com](https://www.rabbitmq.com) website for that), 
but we do have some tips, tricks and recommendations.


## Make sure you use the right RabbitMQ version

The RabbitMQ version that is installed in the repository of your operating 
system might be outdated. You really need a version that is up-to-date, 
because MailerQ uses a couple of new features that were only recently added to RabbitMQ. 
We recommend downloading and installing RabbitMQ directly from the [www.rabbitmq.com](https://www.rabbitmq.com) 
website instead of using the version that comes with your OS.

[Click here to download and install RabbitMQ](https://www.rabbitmq.com/download.html).

The RabbitMQ installation has to be **at least version 3.3.1+** for MailerQ to be 
able to connect to it.


## Check your login and password

By default, when you install RabbitMQ, it creates the first user with login 
"guest" and password "guest". You can only use this default login if you connect 
to RabbitMQ locally (from localhost). If you connect from a remote host, the "guest/guest" 
login does not work. Therefore, if you install RabbitMQ and MailerQ on different machines, 
you either need to add a user with a different name and password, or you should configure 
RabbitMQ to allow "guest/guest" logins from remote hosts as well.

The `loopback_users` setting in the RabbitMQ config file can be used for that. 
By including this option in the RabbitMQ config file, you tell RabbitMQ that it is ok to 
login with "guest/guest", even if the user comes from a remote location. If you do 
include this setting, please make sure that you also have a firewall running, 
because you do not want everyone from all over the internet to connect to your 
RabbitMQ instance!

[Read more about setting up loopback_users](https://www.rabbitmq.com/access-control.html).


## Management plugin

Just like MailerQ, RabbitMQ comes with a very nice web interface. However, this 
web interface is not enabled by default, and must be explicitly configured. We 
recommend doing this, because it is much easier to control RabbitMQ via a web 
browser, than with command line tools. You can find an article on the RabbitMQ 
website that explains how to do this:

[https://www.rabbitmq.com/management.html](https://www.rabbitmq.com/management.html)


## Don't run out of resources

MailerQ not only uses RabbitMQ to fetch the messages that it is going to send, 
but also publish back the delivery results (if you have this configured). If 
you do not process these delivery results in time, you run the risk that your 
RabbitMQ server runs out of resources (memory or disk space). This can especially 
happen in a production  environment, where many messages are published and consumed.

So, when you run MailerQ in production, do make sure that you have set up cronjobs 
or other scripts that periodically or continuously process the messages from the 
result queues. If you do not do this, your RabbitMQ server will run out of resources fast.

Are you looking for a tool to consume messages from RabbitMQ message queues, and 
to pipe the input to scripts to process these messages? Check our [AMQPipe application](https://www.amqpipe.com).


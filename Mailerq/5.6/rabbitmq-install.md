# Setting up RabbitMQ

MailerQ depends on RabbitMQ for message queueing. Before you
can even start MailerQ, you first need a running RabbitMQ instance.  The 
[www.rabbitmq.com](https://www.rabbitmq.com) website has all the information 
you need for setting up RabbitMQ. We do however have some tips, tricks and 
recommendations for setting up RabbitMQ with MailerQ. 

## Make sure you use the right RabbitMQ version

The RabbitMQ version that is installed in the repository of your operating 
system might be outdated. You really need a version that is up-to-date, 
because MailerQ uses a couple of RabbitMQ features that were only recently added. 
We therefore recommend downloading and installing RabbitMQ directly from the 
[www.rabbitmq.com](https://www.rabbitmq.com) website instead of using the 
version that comes with your OS.

[Click here to download and install RabbitMQ](https://www.rabbitmq.com/download.html).

The RabbitMQ installation has to be **at least version 3.3.1+** for MailerQ to be 
able to connect to it.

## Check your login and password

By default, RabbitMQ is installed with a user with login `guest` and password `guest`.
These are the login credentials that you have to include in the configuration file 
of MailerQ. However, this guest/guest login only works for clients that connect 
to RabbitMQ locally (from the same machine). If you run MailerQ and RabbitMQ on 
different servers, the `guest/guest` login does not work. Therefore, if you install 
RabbitMQ and MailerQ on different machines, you either need to add a user with a 
different name and password, or you should configure RabbitMQ to allow `guest/guest` 
logins from remote hosts as well.

To allow remote guest/guest logins, you can use the `loopback_users` setting in the 
RabbitMQ config file. By including this option in the RabbitMQ config file, you tell 
RabbitMQ that it is ok for clients to login with `guest/guest`, even if the connection 
comes from a remote location. If you do include this setting, please make sure that 
you also have a firewall running, because you do not want everyone from all over the 
internet to connect to your RabbitMQ instance!

[Read more about setting up loopback_users](https://www.rabbitmq.com/access-control.html).


## Management plugin

Just like MailerQ, RabbitMQ comes with a very nice web interface. However, this 
web interface is not enabled by default, and must be explicitly configured. We 
recommend doing this, because it is much easier to control RabbitMQ via a web 
browser, than with command line tools.

[Read more about setting up the browser interface.](https://www.rabbitmq.com/management.html).


## Don't run out of resources

MailerQ not only uses RabbitMQ to fetch the messages that it is going to send, 
but also publish back the delivery results (if you have this configured). If 
you do not process these delivery results in time, the queues in RabbitMQ will
get fuller and fuller and you run the risk that your RabbitMQ server runs out of 
resources (memory or disk space), which might crash the server. This can especially
happen in a production environment, where many messages are published and consumed.

So, when you run MailerQ in production, do make sure that you have set up cronjobs 
or other scripts that periodically or continuously process the messages from the 
result queues.


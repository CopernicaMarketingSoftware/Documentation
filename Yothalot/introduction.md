# Introduction

Yothalot is a C++ application for running parallel map/reduce algorithms on big
data clusters. If you have a lot of data and want to process it using either
native C++ code or simple PHP scripts, Yothalot is the tool for you.
Yothalot is maintained by [Copernica BV](https://www.copernica.com/) in Amsterdam,
the leading Dutch provider of email marketing solutions.

Yothalot is designed with simplicity in mind: it uses the [GlusterFS](http://www.gluster.org/)
distributed file system for storing distributed data, and you can create a Yothalot cluster
by simply starting up multiple Yothalot processes on servers in your network. The map/reduce
jobs that you assign to the cluster are automatically split up in smaller tasks
and are sent to cluster nodes that have local access to the files being
processed.

To keep things simple, Yothalot relies heavily on existing and proven open
source technologies: GlusterFS for the distributed file system, RabbitMQ for
robust inter process communication, and PHP as the simple script language that
you can use for writing the jobs (although there is a C++ API too).


## Clustered file system

Yothalot is based on [GlusterFS](http://www.gluster.org/), which is a
distributed network file system, that
behaves just like a normal (POSIX) file system - but that happens to be
distributed over many different servers. Because GlusterFS acts like a regular
file system, you can use traditional tools and functions to read, write and
manipulate files, without needing special tools or libraries to work with files.

GlusterFS automatically distributes files over the servers in the cluster, keeps
track on which files are stored on which server, and
(based on your GlusterFS configuration) replicates files over different servers,
this way no data is lost when a server in the cluster crashes or
goes offline. The Yothalot job manager automatically tries to assign tasks
to servers that hold a local copy of the file, so that reading or writing from
files does not consume network bandwidth.


## Fail safe message queues

Yothalot works with [RabbitMQ](https://www.rabbitmq.com/) for inter process message
queuing. All jobs that you assign to the Yothalot cluster, and the communication
between jobs use RabbitMQ message queues. RabbitMQ is a highly reliable tool, that
automatically requeues messages when servers or jobs crash, making it an ideal
solution for Yothalot.

RabbitMQ automatically detects when a job or server crashes (because a message is
not acknowledged), and automatically puts these jobs back in the queue and
reschedules them. This is exactly the sort of reliability that is needed when
running jobs in large clusters, in which a single job or single node could fail.

RabbitMQ comes with a very handy web based user interface, and can be started
in a cluster configuration, so that your message queues keep running even when
one of the RabbitMQ nodes goes offline.


## Scripting

Yothalot comes with a straightforward but powerful PHP API that allows you to
write and deploy your map/reduce jobs. Because PHP is crazy simple and at the
same time hugely popular, you can easily find programmers to write map/reduce
jobs.

Because PHP is a scripting language, you do not have to compile or deploy the
scripts. When you're debugging your code, you can simply save your changes, and
schedule your job. Writing map/reduce algorithms has never been easier.


## Native API

If, however, you prefer speed over simplicity, Yothalot also comes with a C++ API.
With this API you can write super fast C++ applications that run map/reduce jobs.

# Introduction

Yothalot is an application for running map/reduce algorithms on big
data clusters, that is much simpler to setup and use compared to other
map/reduce solutions. It is the perfect choice if you want to start 
running your own map/reduce jobs, but do not feel like setting up a 
HDFS file system, or if you do not want to write and maintain Java code.


## Clustered file system

Yothalot is based on GlusterFS, which is a distributed network 
filesystem, that behaves just like a normal (POSIX) file system - but 
that happens to be distributed over many different servers. Because 
GlusterFS acts like a regular file system, you can use traditional 
tools and functions to read, write and manipulate files, without needing
special tools or libraries to work with files.

GlusterFS automatically distributes files over the servers in the 
cluster, and (based on your GlusterFS configuration) stores multiple 
copies of each file, so that no files are lost when a server in the
cluster crashes or goes offline.

Yothalot is built on top of the GlusterFS filesystem. When you process 
files stored on GlusterFS, Yothalot automatically tries to assign tasks 
to a server that holds a local copy of the file, so that reading or 
writing from a file does not require network access.


## Fail safe message queue'ing

Yothalot works with RabbitMQ for inter process message queue'ing. All 
jobs that you assign to Yothalot, and the communication between the jobs
use RabbitMQ message queues.

Message queue'ing with RabbitMQ is highly reliable. RabbitMQ automatically 
detects when a job or server crashes (because a message is not 
acknowledged), and automatically puts these jobs back in the queue and 
reschedules the job to be executed by a different server. This is 
exactly the sort of reliability that you need when running jobs in
large clusters, in which a single job or single node could fail.


## Scripting

Very often you want to use scripting languages to write a map/reduce task,
for example because you only have to collect the results from a set of
log files ones. You do not want to compile and deploy native code for
such a job, but run a single script.

Yothalot has a very powerful PHP API that you can use for writing
MapReduce scripts.


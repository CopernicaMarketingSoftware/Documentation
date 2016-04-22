# Resources

It is possible to put limits on how many system resources a MailerQ instance may use.


## Resource options

The following limits can be put on the resources available to MailerQ:

```
    max-threads:                10
    max-connections:            10000
    max-messages:               10000
    max-queues:                 20
    max-memory:                 4GB          
```

The "max threads" option limits the number of worker threads
used for sending out mail and doing SMTP communications.
On a dedicated machine it is wise to set this to a value close to the number
of cores in the machine.

Setting "max-connections" limits the number of connections in total, which
prevents the server from running out of available filedescriptors. 
Consider leaving at least 100 filedescriptors to the application that can be used for
communication with databases, logfiles, message queues and dns servers.


The "max-messages", "max-queues" and "max-memory" options are used to limit how
many messages may be loaded into in-memory queues at a time, how many queues may
be loaded at a time and how much total memory may be loaded at a time respectively.



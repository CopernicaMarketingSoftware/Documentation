# Mailing statistics

In one of the earlier versions of MailerQ, the web based management console 
showed all kind of historical mailing statistics, like an overview of
the mailings that were sent in the past, and the domains, IP and email
addresses that caused the biggest number of failures. However, although 
it was cool feature, it has been removed from MailerQ because it took 
way too much resources from the servers. Why was that?

To understand this, you need to realize that keeping and presenting
statistics is a complicated process, and that the implementation of it totally 
depends on the volume of emails that is being sent. If you send out a 
couple of thousands messages per day, it is perfectly doable to have a
simple implementation that stores all results in a relational database, 
and have the management console simply query that database to show the 
statistics. This was also the solution used by the early version of MailerQ.

However, inserting data into such a database becomes an issue once you start 
sending big volumes of mail from a whole cluster of MailerQ instances. Imagine
that you have 20 MailerQ instances that all try to insert gigabytes of data 
into the very same database. This single database then becomes the bottleneck 
of your mail architecture. 

How do you solve this? By using a different database per MailerQ instance? Or 
a different database per CPU? And how do you merge all these data if you want 
access to the aggregated statistics? These are all complicated issues, and it
is not really the job of the program that sends out the messages (MailerQ) to 
solve this. In reality, you are much better of by using optimized tools for 
data collecting and data processing.


## Tracking deliveries for low volumes

MailerQ does not insert data into database tables for the send attempts. There
is a very good reason for this: MailerQ is a scalable application that does
not want to be limited by the performance of a database. All the results of 
MailerQ deliveries (successful deliveries, but also the failures and retries) 
are published to fast RabbitMQ message queues instead, and not to slow databases.

But if your send volume is not too high, it would still be nice to store all
results in database anyway, and use old fashioned SQL queries for getting
statistical information. To achieve this, you can simple write a couple of
scripts that retrieve the results from RabbitMQ, and store the things you need
in a database. You then only need to make a simple website that queries these
database and present the information to the user.


## Statistics for large volumes

However, if you use MailerQ, you probably send out huge volumes of email. It
makes no sense to insert all the results into database tables, and run live
queries on these tables. That would be totally unscalable, and the performance 
will deteriorate once the volumes get higher. This is exactly the situation 
that we had to deal with at Copernica (the company behind MailerQ). How did
we solve it?

Well, we wrote scripts that collect all results from the message queues, and 
that write these results to log files on a distributed file system. This is very
scalable: if the rate at which the results comes in is higher than our scripts
or disks can handle, we can simply scale up by running more scripts or by
adding more servers and disks.

As a consequence, all our delivery results are stored in gigabytes of log 
files on a distributed file system, ready to be used for collecting all sorts 
of statistics. In practice, most of this information is never needed,
because people turn out not to be very interested in the statistics from three 
years ago, and prefer data about the mailings they sent yesterday. And besides
that: the statistics are not opened by all the users at the same time. It
is therefore nice that we have stored all this data in cheap and scalable log
files, instead of not-very-scalable databases.

The only thing that we permanently store in the database are the key numbers 
of recently sent campaigns, which we immediately present to the user 
the moment he or she opens the statistics dashboard. All the other information 
is stored in log files, waiting for the unlikely event that someone is interested 
in it. 

The moment someone opens the statistics, we show the denormalized data from
the database, and at the very same time we start distributed map/reduce 
jobs that process all the log files for that specific customer. This 
distributed map/reduce job runs on many servers in parallel, and collects
all the relevant information and stores it in a temporary database. This job
only takes a couple of seconds to run, fast enough to be ready when the user
starts navigating through the dashboard, which loads the data from this
temporary database.

If you are interested in creating a similar setup, it is nice to know that
we have released the special tool that we use for running these distributed 
map/reduce jobs. This tool is called [Yothalot](https://www.yothalot.com), 
and allows you to run distributed map/reduce jobs on many different servers 
in parallel. It can be used for much more than just processing log files,
because it is a generic tool for processing data.



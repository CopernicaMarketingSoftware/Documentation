# Configuration of Yothalot

When you have [installed Yothalot](copernica-docs:Yothalot/installation "Installation")
you can configure it by changing settings in the configuration file `config.txt`
located in `/etc/yothalot`. This will change the default behavior of Yothalot.
The configuration file should be self explanatory. Its content is listed
below. If you want to you can overwrite the options set in this file by passing
extra command line arguments to Yothalot. Passing a command line argument that
overwrites the behavior can be done by putting `--` in front of the option.
One option that is not available in the configuration file but may be useful to
pass as an extra command line option is the location of the configuration
file if it is not in the default location (/etc/yothalot/config.txt). You
can do this with `--config-file <path>`.


```
#
#   Configuration file for the Yothalot application.
#
#
#
#
#   File that holds licensing information

license:                /etc/yothalot/license.txt

#   RabbitMQ configuration.
#
#   Yothalot uses RabbitMQ message queues to pass messages with information
#   on the mapreduce jobs between nodes. The address and login data to access
#   these queues should be configured here. The RabbitMQ host name, login name,
#   password and virtual host can be set via, rabbitmq-address. The format in which
#   can be set is: amqp://username:password@hostname. If rabbitmq-address is not
#   specified default values for user name, password, and host are assumed. 
#   The default value is of rabbitmq-address is: amqp://guest:guest@localhost/
#   
#   Yothalot uses names for queues several of its queues. The names of these queues
#   can be changed as well. With rabbitmq-jobs you can set set the name of the queue that
#   holds the messages of all the jobs. With rabbitmq-mapreduce you can set
#   the name of the queue that holds the mapreduce messages. With rabbitmq-racer
#   you can set the name of the queue that holds all the racer messages. The default
#   values of these settings are "jobs", "mapreduce", and "racer" respectively.
#   With rabbitmq-preload you can set the number of messages that pre-load.


rabitmq-address:        amqp://guest:guest@localhost/
rabbitmq-jobs:          jobs
rabbitmq-mapreduce:     mapreduce
rabbitmq-racer          racer
rabbitmq-preload:       10


#
#   Inter-node communication
#
#   The nodes communicate with each other via messages yet there has to 
#   be agreement over who is the master node that arranges these messages. The location
#   of the master node and the port to which it is listening can be set via master.
#   In the future a web interface will become available. To port of this
#   web interface can be set via www-port

master:                 http://localhost:8997
www-port:               8997


#
#   Limits
#
#   Yothalot uses in general all the resources that you have available up to the
#   amount that your license permits. If you use your Yothalot cluster also for
#   other task you can set the number of nodes that Yothalot is allowed to use
#   and the max number of jobs that may run concurrently, so Yothalot does not
#   use all the resources. Note: if you set max-nodes larger than your license
#   permits the max-nodes will be equal the the max-nodes of your license.

max-nodes:              100
max-jobs:               4


#
#   Logging
#
#   Yothalot will keep a log of its task. The location of this log can be
#   set via log-file. You can limit the file size of the log file with
#   log-maxfilesize. When the log file exceeds this limit, the log file will 
#   be copied to logfile.0 and new log files will be written to a clean logfile.
#   If there is laready a logfile.0 the contents of logfile.0 will be copied
#   to logfile.1, ad infinitum. However, you can set a maximum of this log history
#   via log-maxhistory.


log-file:               /path/to/YothalotDir/yothalot.log
log-maxfilesize:        10MB
log-maxhistory:         100

#
#   Location of GlusterFS
#
#   Yothalot needs to know where GlusterFS is mounted in order to have access to 
#   the data and to be able to write and read temporary files to GlusterFS. This
#   information can be retrieved by Yothalot itself if you only have one mount point
#   to a GlusterFS cluster. If you happen to have multiple mount points to multiple
#   GlusterFS you have to tell Yothalot which mount point you want to use. This 
#   information is passed to Yothalot via base-directory. If you are using the
#   PHP plugin, you should also update /etc/php5/cli/conf.d/xx-yothalot.ini with
#   the following line:
#   yothalot.base-directory = /GlusterFs/mountpoint/

# base-directory:         /GlusterFs/mountpoint/
```

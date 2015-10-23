# Manually start a Job

You can start a [MapReduce](copernica-docs:Yothalot/cpp-program "MapReduce program")
or [race](copernica-docs:Yothalot/cpp-program-race "Race program") program
manually by copying the program to the cluster and execute it with the options
you prefer.

The options that are available are:

*   --rabbitmq-host
*   --rabbitmq-user
*   --rabbitmq-password
*   --rabbitmq-vhost
*   --rabbitmq-exchange
*   --rabbitmq-mapreduce

Besides these options you can add the names of the input data.

## Option rabbbitmq-host
With this option you can set the host name of the RabbitMQ server that 
Yothalot should use for its connection.

## Option rabbitmq-user
With this option you can set the user name of the RabbitMQ server that
Yothalot should use for its connection.

## Option rabbitmq-password
With this option you can set the password of the RabbitMQ server that
Yothalot should use for its connection.

## Option rabbitmq-vhost
With this option you can set the virtual host name of the RabbitMQ server
that Yothalot should use for its connection.

## Option rabbitmq-exchange
With this option you can set the name of the exchange of RabbitMQ that is
used by Yothalot.

## Option rabbitmq-mapreduce
With this option you can set the name of the RabbitMQ queue for the mapreduce
jobs.

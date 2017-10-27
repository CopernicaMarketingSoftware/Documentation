# PHP example

To integrate MailerQ into your PHP environment, you can either write
PHP scripts that inject emails directly into RabbitMQ (using the AMQP
protocol), send mails to MailerQ over SMTP, or change the php.ini 
config file so that the builtin PHP "mail()" function automatically
injects mail into MailerQ.

## Using MailerQ in PHP mail() function

The PHP mail() function internally uses a command line utility (by default 
"sendmail") to send out the mail. Every time that you make a call to this
mail() function, the PHP engine starts up this command line utility and
sends out the message. By modifying the "php.ini" file you can change the 
command line utility into "mailerq" so that all mails sent from PHP are 
automatically delivered to MailerQ.

To use MailerQ for sending emails in PHP using mail() function, set the
"sendmail_path" property in the php.ini config file to:

````
sendmail_path = mailerq --envelope my-sender-address@my-domain.com --extract-recipients --ignore-dot

````

## Accessing RabbitMQ directly

Despite the simplicity of the above solution, it is more efficient to 
inject mails directly into RabbitMQ. In the following example we will
demonstrate you how to access RabbitMQ from PHP using the AMQP protocol. 
This example assumes that MailerQ is running and configured and that the 
[PECL AMQP package](http://pecl.php.net/package/amqp) extension is installed.

[Read more about the AMQP protocol](https://www.rabbitmq.com/tutorials/amqp-concepts.html)

The example consists of three files; `settings.php`, `send.php` and `result.php`. 
If you want to use these scripts, save the three files inside the same folder.

### settings.php

The `settings.php` file defines the settings that are needed to connect to 
RabbitMQ and it also contains the settings that are being used for sending 
an email. If you want to use the PHP example to test your MailerQ configuration, 
you will have to adjust the values inside the `settings.php` file to match your 
configuration of MailerQ.

```php
<?php

/**
 * This file holds the settings that the PHP test script uses to connect
 * to RabbitMQ and to construct the message that will be placed on the
 * outbox message queue.
 */

$address   = 'amqp://guest:guest@localhost';    // same as the rabbitmq-address option in the config file
$outbox    = 'outbox_test';                     // same as the rabbitmq-outbox option in the config file
$resultbox = 'results_test';                    // same as the rabbitmq-results option in the config file

// email message settings
$recipientDomain = 'example.org';      // domain where the test message should be delivered
$recipientEmail  = 'info@example.org'; // email where the test message should be delivered
$fromAddress     = 'me@my-domain.com'; // address where the email was sent from

?>

```

### send.php

This PHP script connects to RabbitMQ and places a JSON encoded message on 
the outbox message queue. To connect to RabbitMQ and to create the JSON encoded 
message, the script uses the values from the `settings.php` file. If you want 
to use this script to test your MailerQ configuration, you will have to run 
the `send.php` script before running the `result.php` script.

```php
<?php

/**
 * send.php
 * Script that connects to RabbitMQ, constructs a json encoded message
 * and puts that message on the outbox message queue.
 */

// include the settings
require_once('settings.php');

// try to set up a connection to the RabbitMQ server / try to log in
try
{
    // construct the connection to the RabbitMQ server
    // could add vhost, port as well
    $connection = new AMQPConnection(array(
        'host'      =>  $hostname,
        'login'     =>  $username,
        'password'  =>  $password
    ));

    // connect to the RabbitMQ server
    $connection->connect();
}
catch (AMQPException $exception)
{
    echo "Could not establish a connection to the RabbitMQ server.\n";
}

// try to create a channel for sending instructions
try
{
    // create the channel
    $channel = new AMQPChannel($connection);
}
catch (AMQPConnectionException $exception)
{
    echo "Connection to the broker was lost (creating channel).\n";
}

// try to declare the exchange, which will function as an outbox were
// rabbitmq will find the messages that need to be sent
try
{
    // declare the exchange
    $exchange   = new AMQPExchange($channel);
    $exchange->setName('exchange1');
    // this type sends to all queues connected to this exchange
    $exchange->setType('fanout');  
    $exchange->declareExchange();
}
catch (AMQPExchangeException $exception)
{
    echo "Channel is not connected to a broker (declaring exchange).\n";
}
catch (AMQPConnectionException $exception)
{
    echo "Connection to the broker was lost (declaring exchange).\n";
}

// create the queue mailerq will get its messages from,
// which will get those from the exchange
try
{
    // create the queue
    $queue   = new AMQPQueue($channel);
    $queue->setName($outbox);
    // queue survives rabbitmq restart
    $queue->setFlags(AMQP_DURABLE);
    $queue->declareQueue();
    // route from exchange1 to this queue; 
    // the routing key is optional and what it does depends on the
    // exchange type. fanout ignores it
    $queue->bind('exchange1','key2');
}
catch (AMQPQueueException $exception)
{
    echo "Channel is not connected to a broker (creating queue).\n";
}
catch (AMQPConnectionException $exception)
{
    echo "Connection to the broker was lost. (creating queue)/\n";
}

// JSON encoded message to put on the queue
$jsonMessage = json_encode(array(
    'envelope' => $fromAddress,
    'recipient' => $recipientEmail,
    'mime' => "From: " . $fromAddress . "\r\n"
            . "To: " . $recipientEmail . "\r\n"
            . "Subject: Example subject\r\n\r\n"
            . "This is the example message text"
));

// try to publish the message on the queue. fanout sends to all, key1 is used as filter
try
{
    $message = $exchange->publish($jsonMessage, 'key2');
}
catch (AMQPExchangeException $exception)
{
    echo "Channel is not connected to a broker (publishing message on queue).\n";
}
catch (AMQPConnectionException $exception)
{
    echo "Connection to the broker was lost (publishing message on queue).\n";
}
catch (AMQPChannelException $exception)
{
    echo "The channel is not open (publishing message on queue).\n";
}

// done, close the connection to RabbitMQ
$connection->disconnect();

?>


```

### result.php

This PHP script connects to the RabbitMQ server, and gets the message that was 
placed on the outbox message queue by the `send.php` script back from the result 
message queue. The result message from the result queue is shown to the user. 
The `result.php` can only output any relevant information when it is executed after 
there is something to show in the results queue, for example by executing the `send.php` script.

```php
<?php

/**
 * result.php
 * Script that connects to RabbitMQ, and takes all messages from
 * the result message queue. This could be useful when you want to 
 * parse messages from a custom queue and later re-post them, for example
 * to the outbox queue.
 */

// include the settings
require_once('settings.php');

// try to set up a connection to the RabbitMQ server
try
{
    // construct the connection to the RabbitMQ server
    $connection = new AMQPConnection(array(
        'host'      =>  $hostname,
        'login'     =>  $username,
        'password'  =>  $password,
        'vhost'     =>  $vhost
    ));

    // connect to the RabbitMQ server
    $connection->connect();
}
catch (AMQPException $exception)
{
    echo "Could not establish a connection to the RabbitMQ server.\n";
}

// try to create the channel
try
{
    // open the channel
    $channel = new AMQPChannel($connection);
}
catch (AMQPConnectionException $exception)
{
    echo "Connection to the broker was lost (creating channel).\n";
}

// try to create the queue
try
{
    // create the queue and bind the exchange
    $queue = new AMQPQueue($channel);
    $queue->setName($resultbox);
    $queue->setFlags(AMQP_DURABLE);
    // again with the optional routing key
    $queue->bind('exchange1', 'key2');
    $queue->declareQueue();
}
catch (AMQPQueueException $exception)
{
    echo "Channel is not connected to a broker (creating queue).\n";
}
catch (AMQPConnectionException $exception)
{
    echo "Connection to the broker was lost. (creating queue)/\n";
}

// Get all messages from the queue. 
while ($envelope = $queue->get()) {
    echo "Received:\n";
    echo $envelope->getBody() . "\n";
    echo "----------------------------------------------\n\n";
}

// done, close the connection to RabbitMQ
$connection->disconnect();

?>  
  

```

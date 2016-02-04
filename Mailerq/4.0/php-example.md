# PHP example

This example assumes that MailerQ is running and configured and that PHP 
is working on the server with the [PECL AMQP package](http://pecl.php.net/package/amqp) 
installed.

The PHP example consists of three files; settings.php, send.php and result.php. 
If you want to use these scripts, save the three files inside the same folder.

### settings.php

The settings.php file, defines the settings that are needed to connect to 
RabbitMQ and it also contains the settings that are being used for sending 
an email. If you want to use the PHP example to test your MailerQ configuration, 
you will have to adjust the values inside the settings.php file to match your 
configuration of MailerQ.

```php
<?php

/**
 * This file holds the settings that the PHP test script uses to connect
 * to RabbitMQ and to construct the message that will be placed on the
 * outbox message queue. 
 */

/**
 * RabbitMQ configuration options, replace those values with your own
 * values, those values have to correspond with the values in the MailerQ
 * config.txt file  
 */

$hostname  = 'localhost';    // same as the rabbitmq-host option in the config file
$username  = 'guest';        // same as the rabbitmq-user option in the config file
$password  = 'guest';        // same as the rabbitmq-password option in the config file
$vhost     = '/';            // same as the rabbitmq-vhost option in the config file
$outbox    = 'outbox_test';  // same as the rabbitmq-outbox option in the config file
$resultbox = 'results_test'; // same as the rabbitmq-results option in the config file

// email message settings
$recipientDomain = 'example.org';      // domain where the test message should be delivered
$recipientEmail  = 'info@example.org'; // email where the test message should be delivered
$fromAddress     = 'me@my-domain.com'; // address where the email was sent from

?>

```

### send.php

This php script connects to RabbitMQ and places a JSON encoded message on 
the outbox message queue. To connect to RabbitMQ and to create the JSON encoded 
message, the script uses the values from the settings.php file. If you want 
to use this script to test your MailerQ configuration, you will have to run 
the send.php script before running the result.php script.

```php
<?php

/**
 * send.php
 * Script that connects to RabbitMQ, constructs a json encoded message
 * and puts that message on the outbox message queue.  
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
    // create the channel
    $channel = new AMQPChannel($connection);
}
catch (AMQPConnectionException $exception)
{
    echo "Connection to the broker was lost (creating channel).\n";
}

// try to declare the exchange
try
{
    // declare the exchange
    $exchange   = new AMQPExchange($channel);
    $exchange->setName('exchange1');
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

// try to create the queue
try
{
    // create the queue
    $queue   = new AMQPQueue($channel);
    $queue->setName($outbox);
    $queue->setFlags(AMQP_DURABLE);
    $queue->declareQueue();
    $queue->bind('exchange1','key1');
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

// try to publish the message on the queue
try
{
    $message = $exchange->publish($jsonMessage, 'key1');
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

This php script connects to the RabbitMQ server and gets the message, that was 
placed on the outbox message queue by the send.php script, back from the result 
message queue. The result message from the result queue is shown to the user. 
The result.php can only output any relevant information, if it is executed after 
the send.php script was executed.

```php
<?php

/**
 * result.php
 * Script that connects to RabbitMQ, and takes the result message from
 * the result message queue.  
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
    $queue   = new AMQPQueue($channel);
    $queue->setName($resultbox);
    $queue->setFlags(AMQP_DURABLE);
    $queue->bind('exchange1', 'key1');
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

// Get the message from the queue. 
while ($envelope = $queue->get()) {
    echo "Received:\n";
    echo $envelope->getBody() . "\n";
    echo "----------------------------------------------\n\n";
}

// done, close the connection to RabbitMQ
$connection->disconnect();

?>    

```

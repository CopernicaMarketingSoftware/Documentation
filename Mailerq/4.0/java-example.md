# Java example

This example assumes that MailerQ is running and configured. It uses the 
[Java client library](http://www.rabbitmq.com/java-client.html) provided 
by RabbitMQ.

The Java example consists of two files; Send.java and Result.Java. If you want 
to use these scripts, save the two files inside the same directory.

### Send

This class connects to RabbitMQ and places a JSON encoded message on the outbox 
message queue. To connect to RabbitMQ and to create the JSON encoded message, 
the program uses the private variables defined inside the class. If you want 
to use the Java example to test your MailerQ configuration, you will have to run 
the Send class before running the Result class.

#### Send.java

```java
// import the rabbitmq libraries that are needed to connect to RabbitMQ
import com.rabbitmq.client.ConnectionFactory;
import com.rabbitmq.client.Connection;

// import the rabbitmq lbrary that is needed to create the RabbitMQ channel
import com.rabbitmq.client.Channel;

/**
 *  Simple Java class that creates a connection to a RabbitMQ server and
 *  places a message on the queue, so MailerQ can take this message from
 *  the queue and send it out as an email.
 */
public class Send {

    /**
     *  Settings for RabbitMQ
     */

    // same as the rabbitmq-host option in the config file
    private static String hostname = "localhost";

    // same as the rabbitmq-user option in the config file
    private static String username = "guest";

    // same as the rabbitmq-password option in the config file
    private static String password = "guest";

    // same as the rabbitmq-vhost option in the config file
    private static String vhost = "/";

    // same as the rabbitmq-outbox option in the config file
    private static String outbox = "outbox_test";

    /**
     *  Settings for sending out the test email
     */

    // domain where the test message should be delivered
    private static String recipientDomain = "example.org";

    // email where the test message should be delivered
    private static String recipientEmail = "info@example.org";

    // address where the email was sent from
    private static String fromAddress = "me@my-domain.com";

    /**
     *  Main method
     */
    public static void main(String[] argv) throws Exception {
        // create a new ConnectionFactory      
        ConnectionFactory factory = new ConnectionFactory();

        // set the host to RabbitMQ
        factory.setHost(hostname);

        // set the user name to connect to RabbitMQ
        factory.setUsername(username);

        // set the password to connect to RabbitMQ
        factory.setPassword(password);

        // set the virtual host to RabbitMQ
        factory.setVirtualHost(vhost);

        // create the new connection
        Connection connection = factory.newConnection();

        // create the channel
        Channel channel = connection.createChannel();

        // declare the queue
        channel.queueDeclare(outbox, true, false, false, null);

        // create the message
        String message = "{ "\"envelope\": \"" + fromAddress + "\", "
                       + "\"recipient\": \"" + recipientEmail + "\", "
                       + "\"mime\": \"" + "From: " + fromAddress + "\r\nTo: " 
                       + recipientEmail 
                       + "\r\nSubject: Example subject\r\n\r\n"
                       + "This is the example message text\" }";

        // publish the message on the queue
        channel.basicPublish("exchange1", "key1", null, message.getBytes());

        // some output
        System.out.println("Sent: '" + message + "'");

        // close the channel
        channel.close();

        // close the connection
        connection.close();
    }
}
```

### Result

This class connects to the RabbitMQ server and gets the messages, that were 
placed on the outbox message queue, by the Send class, back from the result 
message queue. The result messages from the result queue are shown to the user. 
The Result class can only output any relevant information, if it is executed 
after the Send class was run. The Result program will keep running, waiting for 
new messages till it is terminated (use `Ctrl-c`). You could run the Send class 
from an other terminal, to test the effect.

#### Result.java

```java
// import IOException
import java.io.IOException;

// import the rabbitmq libraries that are needed to connect to RabbitMQ
import com.rabbitmq.client.ConnectionFactory;
import com.rabbitmq.client.Connection;

// import the rabbitmq lbrary that is needed to create the RabbitMQ channel
import com.rabbitmq.client.Channel;

// import the rabbitmq library that can be used to buffer the message that
// was pushed by the RabbitMQ server
import com.rabbitmq.client.QueueingConsumer;

public class Result
{
    /**
     *  Settings for RabbitMQ
     */

    // same as the rabbitmq-host option in the config file
    private static String hostname = "localhost";

    // same as the rabbitmq-user option in the config file
    private static String username = "guest";

    // same as the rabbitmq-password option in the config file
    private static String password = "guest";

    // same as the rabbitmq-vhost option in the config file
    private static String vhost = "/";

    // same as the rabbitmq-results option in the config file
    private static String resultbox = "results_test";

    public static void main(String[] argv) 
        throws java.io.IOException, java.lang.InterruptedException
    {
        // create a new ConnectionFactory      
        ConnectionFactory factory = new ConnectionFactory();

        // set the host to RabbitMQ
        factory.setHost(hostname);

        // set the user name to connect to RabbitMQ
        factory.setUsername(username);

        // set the password to connect to RabbitMQ
        factory.setPassword(password);

        // set the virtual host to RabbitMQ
        factory.setVirtualHost(vhost);

        // create the new connection
        Connection connection = factory.newConnection();

        // create the channel
        Channel channel = connection.createChannel();

        // declare the queue
        channel.queueDeclare(resultbox, true, false, false, null);

        // message telling the user that the script is waiting for messages
        // that will be placed on the result queue by MailerQ
        System.out.println("Waiting for messages to be placed on the result queue. To exit press CTRL+C");

        // create the QueueingConsumer
        QueueingConsumer consumer = new QueueingConsumer(channel);

        // start the consumer
        channel.basicConsume(resultbox, true, consumer);

        // keep waiting for messages
        while (true) 
        {
            // get a delivery from the result queue
            QueueingConsumer.Delivery delivery = consumer.nextDelivery();

            // get the message as a string
            String message = new String(delivery.getBody());

            // print a message from the queue on the screen
            System.out.println("Received:");
            System.out.println(message);
            System.out.println("------------------------------------------");
        }
    }
}
```

## Putting it all together

You can compile both of these classes with just the RabbitMQ client on the classpath.

```bash
$ javac -cp rabbitmq-client.jar Send.java Result.java

```

To run the the Sender class

```bash
$ java -cp .:commons-io-1.2.jar:commons-cli-1.1.jar:rabbitmq-client.jar Send

```

To run the the Result class

```bash
$ java -cp .:commons-io-1.2.jar:commons-cli-1.1.jar:rabbitmq-client.jar Result

```

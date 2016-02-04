<h1>MailerQ Transport Plugin for Swift Mailer</h1>
<p>
    If you use Swift Mailer as your main mail engine in your project you can <a href="/Resources/MailerQTransportPlugin/mailerqtransport_plugin.zip" title="download MailerQ Transport Plugin">download MailerQ Transport Plugin</a>
    to extend functionality of the Swift Mailer. Below you can find an example showing how to combine those two projects
    together.
</p>
<h4>example.php</h4>
<p>
    <pre class="language-php"><code class="language-php">
&#60;?php
// load required dependencies
require_once 'swiftmailer/lib/swift_required.php';
require_once 'MailerQPlugin/MailerQConnection.php';
require_once 'MailerQPlugin/MailerQTransport.php';

// an array with additional options
$options = array(
'ips'           =>  ['1.2.3.4','1.2.3.5'],
'maxattempts'   =>  5
);

// set up a connection to AMQP server
$connection = new MailerQConnection('localhost', 'outbox', 'guest', 'guest', '/');

// create the message using Swift_Message
$message = Swift_Message::newInstance();
$message->setSubject('This email was sent using Swift MailerQ Transport Plugin');
$message->setBody('Example message');
$message->setFrom('example@domain.com', 'Example');

// deliver the message to
$message->setTo('example@domain.com');

// create a new MailerQTransport instance
$transport = new MailerQTransport($connection, $options);

// create a new SwiftMailer instance
$mailer = Swift_Mailer::newInstance($transport);

// send the actual message using the MailerQTransporter
$mailer->send($message);
    </pre></code>
</p>

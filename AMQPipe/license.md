# Signing your configuration

To run AMQPipe, you need a _signed_ configuration file. To sign your
configuration file, you run the instruction `amqpipe --sign <license-key>`, 
where the license-key is a unique identifier that you can get on the
AMQPipe website. When you run this command, AMQPipe adds a unique
signature to you configuration file, that will activate the program.

When you buy a license key, you specify the number of servers you
want to run AMQPipe on, and the duration of your license. After your
payment has been received, a license-key will automatically be sent to
you.

When you sign a configuration file, the AMQPipe connects to the AMQPipe.com
website to verify whether your license is still valid. When AMQPipe runs,
it will not connect to the AMQPipe.com web service. There is therefore
no risk that your AMQPipe instance will stop working if our webservice
gets offline, or when there is some other network hickup. AMQPipe is
a completely independently running service.


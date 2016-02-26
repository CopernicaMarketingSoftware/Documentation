# A minimal configuration

After you've downloaded and installed MailerQ, and when you have a running 
RabbitMQ server, you are ready to start MailerQ. However, you first have
to make some small adjustments to the configuration file.

The MailerQ configuration file is located in "/etc/mailerq/config.txt" and 
contains all settings that are relevant for running MailerQ. Most default
settings are good enough to get started, but you might want to take a look
at it. Especially the `rabbitmq-address` option needs attention.


## RabbitMQ address

The `rabbitmq-address` setting in the config file holds the address of the
RabbitMQ server that you want to use for message queueing. It has the
format "amqp://user:password@hostname/vhost". The default value 
("amqp://guest:guest@localhost/") only works if your RabbitMQ server
is running on the same machine as MailerQ, and when you've not altered
the default guest/guest credentials.


## License file

To start MailerQ, you need a license file that contains the IP addresses,
features and signature that allows MailerQ to start. To get such a license
file, go to [the license form on MailerQ.com](https://www-dev.mailerq.com/product/license).

This license file should be copied to "/etc/mailerq/license.txt".


## Software dependencies

MailerQ is almost fully statically linked and has hardly any dependencies on
external libraries. However, when it discovers that certain libraries are
available on your system, it does dynamically load them to make use of
specific features. The following libraries are nice to have installed, 
because MailerQ can use their features:

<table>
    <tr>
        <td>libopenssl</td>
        <td>library required for TLS encryption and license checking</td>
    </tr>
    <tr>
        <td>libmagic</td>
        <td>library for detecting the mime-type of files</td>
    </tr>
    <tr>
        <td>libuuid1</td>
        <td>library for generating unique identifiers</td>
    </tr>
    <tr>
        <td>libxml</td>
        <td>library for parsing and modifying XML/HTML code</td>
    </tr>
    <tr>
        <td>libcurl</td>
        <td>library for downloaded resources from the internet</td>
    </tr>
    <tr>
        <td>libmysqlclient *</td>
        <td>library for connecting to a mysql/mariadb database</td>
    </tr>
    <tr>
        <td>libmariadbclient *</td>
        <td>library for connecting to a mysql/mariadb database</td>
    </tr>
    <tr>
        <td>libpq *</td>
        <td>library for connecting to a postgresql database</td>
    </tr>
    <tr>
        <td>libsqlite3 *</td>
        <td>library for processing sqlite3 database files</td>
    </tr>
    <tr>
        <td>libmongo-c-driver *</td>
        <td>library for connecting to Mongo DB</td>
    </tr>
    <tr>
        <td>libcouchbase *</td>
        <td>library for connecting to Mongo DB</td>
    </tr>
</table>

The libraries marked with an asterisk are only required if you want MailerQ
to connect to such a system.


# Getting started with MailerQ

To get MailerQ up and running on your own computer or on a server you
need to take four simple steps:

- [download-instructions](Download and install MailerQ)
- [rabbitmq-install](Get access to a RabbitMQ message broker (or run one yourself))
- [license-file](Obtain a valid "license.txt" file from the MailerQ website)
- [minimal-configuration](Include the address of the RabbitMQ server in the MailerQ config file)

That's all. After these steps you're ready to start MailerQ and inject emails.


## System dependencies

MailerQ runs on Linux, so you need a Linux server or Linux computer to be
able to start and run MailerQ. We distribute the software in binary form for
Debian/Ubuntu based systems and for Red Hat based systems. Please drop us a 
message if you need a version for a different type of system.

The binary executable that you can download is statically linked against most 
libraries. This means that all the libraries required by MailerQ are are embedded 
into the binary code, so it normally runs straight out of the box and you do not 
have to fix all kinds of dependencies before you can get going. However, when 
MailerQ starts, it does a scan of your system to detect which libraries you have 
installed. If MailerQ happens to see that one or more of the following libraries 
are available, it does load them to use specific features from these libs:

<table>
    <tr>
        <td>libopenssl</td>
        <td>Used for TLS encryption, license checking and base64 encoding</td>
    </tr>
    <tr>
        <td>libmagic</td>
        <td>Used to detect the mime-type of files</td>
    </tr>
    <tr>
        <td>libuuid1</td>
        <td>Used for generating globally unique identifiers</td>
    </tr>
    <tr>
        <td>libxml</td>
        <td>Used for parsing and modifying XML/HTML code</td>
    </tr>
    <tr>
        <td>libcurl</td>
        <td>Used to download resources from the internet</td>
    </tr>
    <tr>
        <td>libimagemagick</td>
        <td>Used to find out the size of images</td> 
    <tr>
        <td>libmysqlclient</td>
        <td>Used to connect to a mysql/mariadb database</td>
    </tr>
    <tr>
        <td>libmariadbclient</td>
        <td>Used to connect to a mysql/mariadb database</td>
    </tr>
    <tr>
        <td>libpq</td>
        <td>Used to to connect to a Postgresql database</td>
    </tr>
    <tr>
        <td>libsqlite3</td>
        <td>Used to process sqlite3 database files</td>
    </tr>
    <tr>
        <td>libmongo-c-driver</td>
        <td>Used to connect to a MongoDB NoSQL server</td>
    </tr>
    <tr>
        <td>libcouchbase</td>
        <td>Used to connect to a Couchbase server</td>
    </tr>
</table>

From the above list, only the openssl library is required. All other libraries
are optional, and MailerQ can run without them. If a library is missing,
MailerQ will either fall back on its own implementation, or will run
without the features from the specific library.

Most of the MailerQ runtime settings are stored in a relational database.
This means that you must have at least one of the mysql, mariadb, postgresql
or sqlite3 libraries installed on your system.
 
 

### License file

After creating a MailerQ account, you can [download a license from this website](/product/license). 
MailerQ should be aware of the location of this license. This location can be 
set in the configuration file via:

```
license:		<Path to your license> (empty by default)
```

On a clean installation, the path to the license is set to the same directory 
as config.txt (i.e. `/etc/mailerq/license.txt`). If you have questions about your license, 
feel free to send an email to [info@mailerq.com](mailto:info@mailerq.com).

With these configuration steps you are ready to start. However, we do recommend 
reading the [page](rabbitmq-config "Connect MailerQ with RabbitMQ") 
on how MailerQ interacts with RabbitMQ and checking all other configuration 
options, so you can adjust your configuration accordingly.

## Let's get started!

Now you're ready to get started. Enter `mailerq` on the command line and your MTA is running.

```bash
$ mailerq
```

MailerQ comes with a web based
[management console](management-console "An MTA with a management console")
that you can use to monitor exactly what is happening. This MTA console can be opened
from your browser. The port number and password can be set in
the config file (for more information see [Management Console](management-console "Management console"). 
The default location is `http://your-server-name:8485`.

To start sending mails with MailerQ, you need to
[publish an e-mail to the appropriate message queue](send-email "Send emails with MailerQ")
in RabbitMQ or use one of our [examples](mailerq-examples "MailerQ examples").


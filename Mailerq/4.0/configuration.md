# Advanced Configuration

MailerQ can be configured, using the config file that can be found at 
`/etc/mailerq/config.txt`.  The `config.txt` file holds configuration options 
for the connection to RabbitMQ, storage engine (Couchbase, MongoDB, MySQL, 
SQLite or PostgreSQL) and database (MySQL, SQLite or PostgreSQL) and other 
options for [MailerQ itself](copernica-docs:Mailerq/database-access "The MailerQ database").

## License

To work properly, MailerQ needs a license file. The license file can be 
[downloaded](http://mailerq.com/product/license "MailerQ license") from the 
MailerQ website. You can store the file anywhere on the file system. The path to 
the license file can be configured by setting 

```
license: `<path to license.txt>`
```

The default path is `/etc/mailerq/license.txt`.

## User

If you have configured MailerQ to use ports lower than 1024 (like port 25 for 
SMTP and/or port 80 for the management console), the MTA must be started as user 
root. Once the ports have been opened, MailerQ changes its identity to the user 
set in the config file.

```
user: `<user name>`
```

The user name to change identify to after the SMTP and HTTP ports have been opened.

## Plugins

Normally, MailerQ tries to load plugins from the default plugin directory, which 
is `/usr/share/mailerq/plugins`. However, if you want to load plugins from 
another directory instead, you can use the option below to specify the directory 
from which to load the plugins. Beware, MailerQ will silently continue when the 
specified directory can not be found, possibly causing plugins not to be loaded 
without a warning.

#### The path to the directory where the plugins are located.
```
plugin-directory: <path>
```

## DNS settings

You can override the settings that MailerQ uses to communicate with DNS 
settings. By default, MailerQ does 4 attempts to resolve a domain, and uses a 
timeout of 5 seconds to wait for an answer before it proceeds to the next server 
to resolve the domain. These settings can be changed.

The first lookup is done using UDP. If the response from the DNS server is 
truncated because it does not fit in a UDP datagram, MailerQ opens a TCP 
connection to the same DNS server to repeat the request. You can also modify 
this behavior and enforce that MailerQ only uses TCP, or only uses UDP.

When MailerQ sets up an SMTP connection, it first sends out the `HELO` message 
as is required by the SMTP protocol. (In fact, it first tries the more modern 
`EHLO` command defined by the ESMTP protocol). With this `HELO` or `EHLO` message 
a hostname is sent to the remote server that identifies the sender. Normally, 
MailerQ automatically detects which hostname to use (it simply does a reverse 
DNS query).

If you want to override this with different values you can add a helo map file 
in which you provide your own HELO hostnames.

The file should contain IPs and hostnames in following format:

```
10.0.0.1 hostname1.example.com
10.0.0.2 hostname2.example.com
[...]
```

#### Timeout in milliseconds before MailerQ proceeds to next DNS server. Default is 5000 milliseconds.
```
dns-timeout: <timeout>
```

#### Number of attempts before giving up, defaults to 4.
```
dns-attempts: <attempts>
```

#### The communication channel to use, either `udp` or `tcp`. The default value is to use both.
```
dns-force: <udp|tcp>
```

Location of the file containing HELO map.
```
dns-helofile: <filename>
```

## Lockfile

To prevent that MailerQ starts more than once, MailerQ stores its process ID 
(pid) in a lockfile. The name and location of the lockfile can be set in the 
configuration file.

#### Location of the lock file. Default is `/tmp/mailerq.pid`.
```
lock: <filename>
```

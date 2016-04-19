# Advanced Configuration

MailerQ can be configured, using the config file that can be found at 
`/etc/mailerq/config.txt`.  The `config.txt` file holds configuration options 
for the connection to RabbitMQ, storage engine (Couchbase, MongoDB, MySQL, 
SQLite or PostgreSQL) and database (MySQL, SQLite or PostgreSQL) and other 
options for [MailerQ itself](database-access "The MailerQ database").

## License

To work properly, MailerQ needs a license file. The license file can be 
[downloaded](http://mailerq.com/product/license "MailerQ license") from the 
MailerQ website. You can store the file anywhere on the file system. The path to 
the license file can be configured by setting 

```
license:		<Path to your license> (empty by default)
```

## User

If you have configured MailerQ to use ports lower than 1024 (like port 25 for 
SMTP and/or port 80 for the management console), the MTA must be started as user 
`root`. Once the ports have been opened, MailerQ changes its identity to the user 
set in the config file.

```
user:           <user name> (empty by default)
```

The user name to change identify to after the SMTP and HTTP ports have been opened.


## Lockfile

To prevent that MailerQ starts more than once, MailerQ stores its process ID 
(pid) in a lockfile. The name and location of the lockfile can be set in the 
configuration file.

#### Location of the lock file.
```
lock: <filename>            (default: /tmp/mailerq.pid)
```

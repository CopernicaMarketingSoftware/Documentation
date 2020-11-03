# The MailerQ database

MailerQ uses a relational database to store all sorts of configuration data
and delivery settings. The data stored in the database includes the delivery
throttles and DKIM Keys. The database is read and updated by MailerQ, but you
are free to write your own scripts and programs that also modify this data.

MailerQ supports multiple database platforms: MySQL(5.5+), MariaDB(5.5+),
PostgreSQL(9.1+) and SQLite3. The SQLite database is by far the simplest to
set up because it does not require a server process to run. All you need is
the "sqlite3" library to be installed on your system. _Although it is the simplest
to set up, we advise you to not use an SQLite database in production, because it makes 
scaling up MailerQ a lot more difficult._

The other database systems, MySQL, MariaDB and PostgreSQL, take a little
more effort, but they are not too difficult to configure either. This is the most
future-proof, since it can be easily scaled or shared between instances. If you
already have such a database server running, you only have to create a new
database and put the address, login and password to that database in MailerQ's
configuration file. MailerQ will do the rest: the tables will be created and
filled with the settings that you enter via the management console.


## Database settings in the config file

Only one variable has to be set in the config file to connect to a
database: the "database-address" variable:

```
database-address:   sqlite:///path/to/database/file.sql
database-address:   mysql://user:password@hostname/databasename
database-address:   postgresql://user:password@hostname/databasename
```

SQLite is the simplest database to set up, just specify the path to a file
on the MailerQ server (this file does not even have to exist). However, an
SQLite database can not be used if you want to access the same database
from multiple machines.

If you do use SQLite, note that you need three (!) slashes in
the address: the "sqlite://" prefix, followed by the "/path/to/database".
If you use a MySQL, MariaDB or PostgreSQL database, make sure that the
database exists, and that MailerQ not only gets enough privileges to read
and write from and to the database, but also to create and modify tables.

On startup, MailerQ automatically checks if the tables in your database
exist, and whether the database structure is correct. Missing, broken or
incomplete tables are reported.


## Choosing the right engine

From a performance perspective it does not really matter which database
engine you choose to use. MailerQ periodically copies all settings from the
database to main memory, and uses this in-memory cache for lookups. No
realtime queries are executed, and no connections are kept open to the
database in between these reloads. The speed of the database does
therefore not have to be a factor in choosing the most appropriate engine.
It is better to choose a database that you feel most comfortable with.
Do you already use MySQL databases? Then it is best to use it for MailerQ
too. Do you run a single MailerQ instance, and does data not have to be
shared amongst multiple MailerQ instances? Then the SQLite database is sufficient.

MailerQ makes use of client libraries on your system to connect to the
database. To connect to a MySQL or MariaDB database, you must make sure that either
[libmysqlclient or libmariadbclient](system-dependencies) is installed on your system. For
PostgreSQL connections libpq has to be installed, and libsqlite3 is needed
for SQLite3 databases. If these libraries are not available on the system,
it is not possible to connect to the database.


## Time to live

As we mentioned, the database is not used for real time queries. Instead, all data
is periodically copied into main memory. This ensures that the speed of the
database is never a limiting factor in your mail deliveries, or that a slow
query slows down your email deliveries.

MailerQ normally reloads the database every 10 minutes. However, this is
a configurable interval. In the config file you can set the "database-ttl"
variable to any possible interval you like. This variable should be set to
the number of seconds that the data loaded from the database is kept in
main memory. The default value is 600, which is 10 minutes.

````
database-ttl:           60
````

If the database-ttl is set to 60 seconds, like we did above, the data is reloaded
every minute.


## Rebuilding the database

When MailerQ starts, it normally first connects to the database and checks whether
all tables are in a valid state. If this test fails, MailerQ does not start and
reports an error instead. With the `--repair-database` command line switch,
you can instruct MailerQ to repair all broken tables. Tables and columns that
are missing will be created, and obsolete columns are removed,

```bash
$ mailerq --repair-database
```

This option tells MailerQ to create and alter missing or broken tables. The only
time when you normally do this, is when you install MailerQ for the first time,
or when you are upgrading from a previous version.

If you want to enforce that all tables in the database are dropped and
replaced by brand new empty tables, you can start MailerQ with the
"--purge-database" command line option:

```bash
$ mailerq --purge-database
```

This option tells MailerQ not to check and repair tables, but to drop
them all and create new ones.


## Disable the database check

You may want MailerQ to skip the database consistency check on startup. For
example if you have manually modified the tables and added a couple of extra
columns. To skip the validation on startup, you can set the config file
variables 'database-validate' to false:

````
database-validate:      false
````


## Multiple MailerQ instances

It is possible to run multiple MailerQ instances that all connect to the
same database. If you do this, we recommend setting up a [cluster](cluster)
of MailerQ instances. The different MailerQ instances then notify each
other every time the settings in the database are updated, so that each
instance can update its cache.


## Reading and writing to the database directly

MailerQ has a powerful [web based MTA management console](management-console "Management console").
This console gives you access to the database using simple web forms.
During normal operations, it is therefore not necessary to run any queries on the
database yourself. But if you do like to access the data,
you are free to do so.

All tables in the database have a very straightforward structure.
Because MailerQ is compatible with many different database systems, we do
not use vendor specific SQL features and have kept all tables as simple
as possible. The tables use well known data types, and no foreign
keys or constraints. Booleans are stored as integers and "NULL" and "0" values
have the same semantics. The value "0" is often used to set something to
"unlimited", while "-1" values are used to fall back on the default setting.

All data is stored in the tables in UTF-8 encoding. If you use international
domain names and/or international email addresses, you should store them in UTF-8
format in the database.

The following tables are created:

| Tables                    | Description
|-----------------------    |-----------------------------------------------------------------------|
| capacity                  | all delivery capacities, eg max number of connections
| capacity_rules            | capacity rules per domain / MTA IP   
| dkim_keys                 | DKIM Keys to sign outgoing mails
| dkim_patterns             | rules that decide what DKIM Keys to use
| dns                       | overridden dns lookups
| errors                    | Forced Errors
| flood_responses           | alternative delivery limits to use when certain responses come in
| ips                       | all MailerQ's IP addresses
| locals                    | Local Email Addresses
| mtanames                  | alternative "EHLO" names
| paused                    | deliveries on pause
| response_actions          | response action, eg send mail from a different IP
| response_patterns         | patterns of responses that has to match
| response_patterns_actions | what kind of response actions must be executed
| rewrite_actions           | actions to perform when a message is loaded eg send from a different IP
| rewrite_triggers          | triggers to fire rewrite actions


Most tables are pretty self-explanatory, and every table can be filled by
using the management console. We'll give a short explanation of each table here.

### The capacity table

All delivery capacities are stored in this "capacity" table. It for example
holds the max number of connections that may be set up to a certain
domain, or the max number of messages to send within a minute.

The "localip" and "domain" columns  in this table can both be empty. If they are empty, the
setting applies to all local IPs and/or all domains. Only the most specific
record is used. Thus, if a mail is sent from IP 1.2.3.4 to domain example.com,
the record with the same localip and same domain is used. If no such
record exists, MailerQ looks for a record that only matches the domain or
the IP (and for which the other field is empty). If that record
also does not exist, the record for which both the domain and the IP are
empty is used.

The best way to get an understanding of the column in this table is to
play around with the management console, and see what kind of data ends
up in this table.


### The flood_responses table

The "flood_responses" table has a similar layout to the capacity table,
but with a "pattern" and a "type" column instead of an IP address and a domain.
For each failed delivery, the answer message from the remote server is checked
agains the patterns in this table. If there is a match, MailerQ will start
using the delivery capacity set in this table.

For example, if you insert a record in this table with pattern "flood detected"
and type "substr", and MailerQ receives an answer from a remote server
with a message like "message rejected, flood detected from your IP address",
MailerQ automatically switches the send capacity to the associated capacity.

Once again, the best way to get an idea of the meaning of the columns is
to just experiment with the management console, and then look at the data
in this table.


### The ips table

On startup, MailerQ detects all IP addresses that are linked to the server,
and stores these IP addresses in a database table. MailerQ does not use this
table for queries or for anything, it is just created so that other
programs or scripts can find out which IP addresses are available for sending
out emails.


### The DKIM Keys and Patterns

All DKIM private keys that are used for signing outgoing mails are stored
in the "dkim_keys" table. Only the domain, the selector and the expire time for
the signature are stored; other properties are retrieved from DNS.

To decide what keys should be used for outgoing emails, there is a separate
"dkim_patterns" table. The from address of every outgoing mail is compared
to the records in this table, and whenever there is a match, the associated
key is used for a DKIM signature.

The pattern type can be "regex", "fnmatch", "substr" or "exact", and decides
whether the "sign" column holds a regular expression, or some other kind
of pattern.


### Local Email Addresses

Incoming mails are compared with the addresses stored in the local email
address table. When there is a match, the mail is not sent to the regular
inbox RabbitMQ message queue, but to the locals queue instead. The "type"
column can be set to "regex", "fnmatch", "substr" and "exact".


### Delegates

If you want to send mail from a different IP address than is stored in
the message JSON, you can use the "delegates" table. For example, if you
notice that "example.com" no longer accepts incoming connections from
your "1.2.3.4" address, but that it does accept connections from "1.2.3.5",
you can add a row to the "delegates" table. This row instructs MailerQ
that it should send all mail that was originally planned to be sent from
"1.2.3.4" to "example.com" to be sent from address "1.2.3.5" instead.


### Paused Deliveries

To pause deliveries from and/or to IP addresses or domains, you can insert
records in the "paused" table. The "target" column in this table can hold
IP addresses, domain names and empty values. The "localip" column is
of course only used for IP addresses, but may also hold empty strings.

If you want to pause all deliveries from your own IP address "1.2.3.4"
to "example.com", you can simply insert such a record in the "paused"
table. An empty value in one of the columns of the "paused" table means that
all deliveries are paused. For example, if you insert an empty domain and IP
address "1.2.3.4", MailerQ pauses all deliveries from "1.2.3.4", no matter to
what domain they should be sent. If you insert a record with an empty domain
and IP "5.6.7.8" as target, all deliveries to IP address "5.6.7.8" will be
put on hold.


### The mtanames tables

By default, MailerQ does a reverse DNS lookup to find the hostname of
its local IP addresses. This hostname is the name used in the "HELO/EHLO"
SMTP handshake. If you want to use a different hostname instead, you can
insert a row into this table.


### Custom DNS lookups

To override the DNS resolver, you can add records to the "dns" table. MailerQ
normally uses normal DNS queries to find out to which IP addresses mail should
be sent. First it does an MX query to find the MX records, and then for each
MX record MailerQ looks for the associated A or AAAA records to find the
IP addresses.

However, in case you want to bypass these lookups for specific IP addresses,
you can add records to the "dns" table. If matching records are available,
MailerQ uses the IP addresses in these records instead of doing the DNS
queries. This feature can for example be useful if you know that certain
domains (like the ones that you own yourself) have special IP addresses on
which they receive email, besides the ones that are announced in DNS.

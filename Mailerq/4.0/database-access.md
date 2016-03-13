# The MailerQ database

MailerQ uses a relational database to store all sorts of configuration 
data and delivery settings. The data stored in the database includes
for example the delivery throttles and DKIM keys. The database is read
and updated by MailerQ, but you are free to write your own scripts and
programs that also modify this data.

MailerQ supports multiple database platforms. Currently, we support
MySQL, MariaDB, PostgreSQL and SQLite databases. The SQLite database is by far 
the simplest to set up because it does not require a server process to
run. All you need is the "sqlite3" library to be installed on your system.

The other database systems, MySQL, MariaDB and PostgreSQL, take a little
more effort, but are not too difficult to install either. You only 
need to create the database and put the login and password in the 
MailerQ configuration file. MailerQ does the rest and creates all
tables.


## Database settings in the config file

Only one variable has to be set in the config file to connect to a
database: the "database" variable:

```
database:           sqlite:///path/to/database/file.sql
database:           mysql://user:password@hostname/databasename
database:           postgresql://user:password@hostname/databasename
```

SQLite is the simplest database to set up, because you just specify the 
path to a file on the MailerQ server (this file does not even have to 
exist). However, an SQLite database can not be used if you want to access
the same database from multiple machines.

If you do use SQLite, note that you need three (!) slashes in
the address: the "sqlite://" prefix, followed by the "/path/to/database".

MailerQ automatically creates or alters missing or incomplete tables. 
If you use a MySQL, MariaDB or PostgreSQL database, make sure that the 
database exists, and that MailerQ not only gets enough privileges to read 
and write from and to the database, but also to create and modify tables.


## Choosing the right engine

From a performance perspective it does not really matter which database
engine you choose to use. MailerQ periodically (every ten minutes)
copies all settings from the database to main memory, and uses this in-memory
cache for lookups. No realtime queries are executed, and no connections are kept
open to the database in between these reloads. The speed of the database does
therefore not have to be a factor in choosing the most appropriate engine. 
It is better to choose a database that you feel most comfortable with.
Do you already use MySQL databases? Then it is best to use it for MailerQ
too. Do you run a single MailerQ instance, and does data not have to be
shared amongst multiple MailerQ instances? Then the SQLite database is sufficient.

MailerQ makes use of client libraries to connect to the database. To
connect to a MySQL or MariaDB database, you must make sure that either 
libmysqlclient or libmariadbclient is installed on your system. For
PostgreSql connections libpq has to be installed, and libsqlite3 is needed
for SQLite3 databases. If these libraries are not available on the system,
it is not possible to connect to the database.


## Rebuilding the database

When MailerQ starts, it first connects to the database and checks whether
all tables are in a valid state. Tables that do not exist are created,
and tables that miss columns are automatically altered and the missing
columns are added. This automatic table-checking is done every time
MailerQ starts up.

Normally, the only time when tables are created is the very first
time that you start MailerQ, and the only time when tables are altered 
is after upgrading to a new MailerQ version that uses a slightly different 
database schema.

If you want to enforce that all tables in the database are dropped and
replaced by brand new empty tables, you can start MailerQ with the 
"--purge-database" command line option:

```bash
$ mailerq --purge-database
```

This option tells MailerQ not to check and repair tables, but to drop
them all and create new ones.


## Multiple MailerQ instances

It is possible to run multiple MailerQ instances that all connect to the
same database. If you do this, we recommend setting up a [cluster](cluster)
of MailerQ instances. The different MailerQ instances then notify each
other every time the settings in the database are updated, so that each
instance can update its cache.


## Reading and writing to the database directly

MailerQ has a powerful [web based MTA management console](management-console "Management console"). 
This console gives you access to the database using simple web forms. 
It is therefore in normal operations not at all necessary to run any 
queries on the database by yourself. But if you do like to access the data
you are free to do so.

All created tables in the database have a very straight forward structure. 
Because MailerQ is compatible with many different database systems, we have
decided not to use vendor specific SQL features and keep all tables as simple
as possible. The tables use well known data types, and no foreign 
keys or constraints. Booleans are stored as integers and "NULL" and "0" values 
have the same semantics. The value "0" is often used to set something to 
"unlimited"

The following tables are created:

<table>
    <tr>
        <td>capacity</td>
        <td>delivery limits</td>
    </tr>
    <tr>
        <td>flood_responses</td>
        <td>alternative capacity to use when certain response comes in</td>
    </tr>
    <tr>
        <td>ips</td>
        <td>all MailerQ's IP addresses</td>
    </tr>
    <tr>
        <td>dkim_keys</td>
        <td>DKIM keys to sign outgoing mails</td>
    </tr>
    <tr>
        <td>dkim_patterns</td>
        <td>rules that decide which DKIM key to use</td>
    </tr>
    <tr>
        <td>locals</td>
        <td>local email addresses</td>
    </tr>
    <tr>
        <td>delegates</td>
        <td>rules to send mail from a different IP</td>
    </tr>
    <tr>
        <td>mtanames</td>
        <td>alternative "EHLO" names</td>
    </tr>
    <tr>
        <td>paused</td>
        <td>deliveries on pause</td>
    </tr>
    <tr>
        <td>dns</td>
        <td>overridden dns lookups</td>
    </tr>
</table>

Most tables are pretty self-explanatory, and every table can be filled by
using the management console. We'll give a short explanation of each table here.

### The capacity table

All send capacities are stored in this "capacity" table. It for example
holds the max number of connections that may set set up to a certain
domain name, or the max number of messages to send within a minute.

The "localip" and "domain" columns may be empty. If they are empty, the
setting applies to all local ips and/or all domains. Only the most specific
record is used. Thus, if a mail is sent from IP 1.2.3.4 to domain example.com,
the record with the same localip and same domain is used. If no such 
record exists, MailerQ looks for a record that only matches the domain or 
the IP (and for which the other field is empty). If that record
also does not exist, the record for which both the domain and the IP are
empty is used.

Values in the table that are set to "0" are treated as "unlimited". The
"domain_" prefix is used for domain specific settings, and the "ip_" for
IP specific settings. Example: if "domain_maxmessages" is set to 1000 and
"ip_maxmessages" to 100 it means that no more than 1000 messages per minute
may be sent to the domain, and no more than 100 messages per minute to 
each of the IP addresses that are being used by the domain.

The best way to get an understanding of the column in this table is to
play around with the management console, and see what kind of data ends
up in this table.


### The flood_responses table

The "flood_responses" table has almost a similar layout as the capacity table,
but with a "pattern" and a "type" column instead of an IP address and a domain.
For each failed delivery, the answer message from the remote server is checked
agains the patters in this table. If there is a match, MailerQ will start
using the delivery capacity set in this table instead.

Thus, if you insert a record in this table with pattern "*flood detected*"
and type "fnmatch", and MailerQ receives an answer from a remote server
which a message like "message rejected, flood detected from your IP address",
MailerQ automatically switches its send capacity to the capacity stored
in this "flood_responses" table. 

Once again, the best way to get an idea of the meaning of the columns is
to just experiment with the management console, and then look at the data
in this table.



### The ips table

On startup, MailerQ detects all IP addresses that are linked to the server,
and stores these IP addresses in a database table. MailerQ does not use this
table for queries or for anything, it is just created so that other
programs or scripts can find out which IP addresses are available for sending 
out emails.


### The dkim keys and patterns

The last table to discuss is the `dkim_keys` table. This holds all DKIM keys 
that are used by MailerQ for signing the outgoing messages. Each record holds a 
domain name, DKIM selector, the algorithm to use and of course the private key. 
MailerQ reloads all DKIM keys every 10 minutes so it is advised to wait at least 
10 minutes before you send out an email if you have just updated the database. 
DKIM keys stored via the management console are immediately active.

| Field name | Type            | Description                                                             |
|------------|-----------------|-------------------------------------------------------------------------|
| id         | int PRIMARY_KEY | Usual auto_increment id field                                           |
| domain     | varchar UNIQUE  | The domain for which this record holds the DKIM key. Must be lower case |
| selector   | varchar         | The selector for DKIM signing                                           |
| privatekey | mediumtext      | Private key used for encryption. It should be kept secret at all times  |
| algorithm  | varchar         | An algorithm used for data encryption ( accepts SHA-1 or SHA-256 )      |

````

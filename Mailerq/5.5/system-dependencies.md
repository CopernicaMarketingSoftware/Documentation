# System dependencies

MailerQ runs on Linux. We distribute the software in binary form for Debian/Ubuntu based
systems and for Red Hat based systems. Please drop us a message if you need
a version for a different type of system.

Most libraries that are needed by MailerQ are statically linked. This means
that most of the required libraries are embedded into the binary code, so
MailerQ runs straight out of the box with no need for you to fix dependencies
and install other software. However, when MailerQ starts, it does
do a scan of your system to detect which libraries are available. If MailerQ
happens to find one or more of the following libraries, it does load them to
use specific features from these libs:


| Tables                | Description
|-----------------------|-----------------------------------------------------------------------|
| libopenssl            | Used for TLS encryption, license checking and base64 encoding
| libz                  | Used for compression algorithms
| libmagic              | Used to detect the mime-type of files
| libuuid1              | Used for generating globally unique identifiers
| libidn                | Used for parsing international domain names
| libxml2               | Used for parsing and modifying XML/HTML code
| libimagemagick        | Used to find out the dimensions of images
| libmysqlclient        | Used to connect to a mysql/mariadb database
| libmariadbclient      | Used to connect to a mysql/mariadb database
| libpq                 | Used to to connect to a Postgresql database
| libsqlite3            | Used to process sqlite3 database files
| libmongo-c-driver     | Used to connect to a MongoDB NoSQL server
| libcouchbase          | Used to connect to a Couchbase server


From the above list, the openssl, libz and libidn libraries are required. All
other libraries are optional and MailerQ can run without them. If a library
is missing, MailerQ will either fall back on its own implementation, or will
run without the features from the specific library.

Most of the MailerQ runtime settings are stored in a relational database.
This means that you must have at least one of the mysql, mariadb, postgresql
or sqlite3 libraries installed on your system.

Sqlite3 is a local solution. Mysql or Mariadb can run on a different servers,
but then you need libmysqlclient on the mailerq box. Postgresql 9.5+ which
can be on a different server too, but then you need libpq >= 9.5 to use it.

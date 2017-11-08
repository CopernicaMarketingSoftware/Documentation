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

<table>
    <tr>
        <td>libopenssl</td>
        <td>Used for TLS encryption, license checking and base64 encoding</td>
    </tr>
    <tr>
        <td>libz</td>
        <td>Used for compression algorithms</td>
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
        <td>libidn</td>
        <td>Used for parsing international domain names</td>
    </tr>
    <tr>
        <td>libxml2</td>
        <td>Used for parsing and modifying XML/HTML code</td>
    </tr>
    <tr>
        <td>libcurl</td>
        <td>Used to download resources from the internet</td>
    </tr>
    <tr>
        <td>libimagemagick</td>
        <td>Used to find out the dimensions of images</td>
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

From the above list, the openssl, libz and libidn libraries are required. All
other libraries are optional and MailerQ can run without them. If a library
is missing, MailerQ will either fall back on its own implementation, or will
run without the features from the specific library.

Most of the MailerQ runtime settings are stored in a relational database.
This means that you must have at least one of the mysql, mariadb, postgresql
or sqlite3 libraries installed on your system.

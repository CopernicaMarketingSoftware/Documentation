# Exporting profiles
The export feature can be use to export the entire database
in one go or to export only parts of the database. For example,
you are able to export a single collection. An export creates a file
that you can download or you can have it emailed to your address.
You can export profiles and subprofiles to a tab delimited file or
in other format.

If you want to receive information about clicks, opens, etc. as they happen
you can also set up a [WebHook](./webhooks).

## The delimiter
The delimiter is a special character that is used to separate the fields in
the output file. This normally is a tab, but you can also choose for a comma
or semicolon. If the database contains columns that use the delimiter in field
values (for example a hardcoded tab inside a postal code), you can choose for
"Quoted columns". The values in the output file will then be wrapped in quotes
to prevent conflicts with the delimiter.

## FTP
Exports can be transferred over FTP as well as over SFTP (FTP over SSH).
In the target tab you can choose if you want to authenticate using a
password or public key.

The URL to the (S)FTP server should look as follows:

In case of FTP:
```text
ftp://ftp.example.com/~/
```

In case of SFTP:
```text
sftp://ftp.example.com/~/
```

We reformat the tilde used in the path to `/home/username/` if you want a
location different from the home folder, you can use absolute paths in the
following way:
```text
sftp://ftp.example.com/mnt/storage/
```

We use the name of the export as the filename and the extension is taken from
the information entered in the specifications of the file. Supplying a username
is mandatory. In the case of password authentication, the password has to
be entered. When authenticating with public key, a private key has to be
provided. For security purposes we encode the private key when the export is
created and decode it when the export is run.

## Exporting
The results of a mailing can be exported too. See [this article](./statistics-export)
for more information.

If you want to export profiles or subprofiles based on email results, you
can create a selection with condition type *Check on email campaign results*.
Use the export function in the *Profiles* section to download the profiles
from this selection.

### Exports in Publisher
To export a database or collection you need to select it under **Profiles**.
Under **Current view** you can find the option to import or export.

### Exports in Marketing Suite
You can export your database from the Marketing Suite in the database
management menu located under the **Gear** in the top-right corner of the
**Database & Profiles** section.

## Extra remarks
There are some features of the export functionality that can be confusing,
therefore we wil summarize the most important ones in the following:
* The fields *ID*, *Access code* and *Profile created* are fields created by
our system;
* You can only export fields from one collection at a time to a CSV file.
To export multiple collections, choose for export to XML;
* UTF-8 is normally the best encoding for output files;
* Date fields can be formatted in a the format that best suits your needs;
* If you want to keep the export files small, you can compress them.
This is especially useful if you want to send export files by mail.

## More information
We always recommend checking if your database is up-to-date before exporting
data. You can then easily sync it to your own system or use it for your
own statistics.

* [Database management](./database-management)
* [Importing a database](./database-import)

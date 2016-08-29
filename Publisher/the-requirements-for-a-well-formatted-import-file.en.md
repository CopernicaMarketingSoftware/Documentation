The import file contains the data that you want to import to your
database in the software. A correctly formatted import file is for
instance created in **Excel** and meets the following requirements.

-   The file has one row with profile data. A row contains information
    about one subscriber (profile), divided into several fields. E.g., a
    field for the first name, a field for the email address, and so
    forth.
-   The file has one or more columns. Each column contains similar
    information about all relations (for example the email addresses).
-   The first row has the column names. These do not necessarily have to
    match the database field names in your database; they can be linked
    together later in the import process. For instance the column in
    which email addresses are stored can be named 'email'.

![Import file ](images/excelimportfile.png)

### Import file with subprofiles

If you also you wish to import subprofiles, take into account the
following:

-   It is advised to start the name of a column with subprofile data
    with the name of the collection, followed by a dot and the name of
    the field:

> `collectionname.fieldname`

-   Each row with subprofile data must have at least one profile field
    with unique data. This unique identifier is needed to link the
    subprofile to the profile in the database.
-   If you are updating subprofiles as well, a field with a unique
    subprofile data must be present that can be used as the key field
    during the import.
-   If your import file contains data for multiple subprofiles from a
    profile, use seperate rows for the different subprofiles, following
    the same requirements as mentioned above.

![](images/importer12.png)

Convert the spreadsheet file to a delimited txt file before uploading
---------------------------------------------------------------------

Before you upload the file to the software, it should be converted to a
delimited **txt** or **csv** file. You may also use a comma (,), or a
semicolom (;) as a delimiter. We do not yet support XML for import files

[How to convert an Excel spreadsheet to a tab delimited text
file...](http://www.howtogeek.com/79991/convert-an-excel-spreadsheet-to-a-tab-delimited-text-file/)

Once you have created the import file, it can be uploaded to the
marketing software via*Current view \> import / export data \>*
**import**.

Data can be imported to and exported from your database. The functions
are found under the 'current view' menu of Profiles. To export data,
choose Export.

![](../images/export1.png)

Choose the source for the export. This can be a database, selection,
collection or miniselection.

-   To export all profiles from a database, select the database
-   To export all profiles from a (sub)selection, select the
    (sub)selection.
-   To export all subprofiles from a collection, select the collection.
    Each row in the export file will contain information on one
    subprofile and it's parent profile
-   To export all subprofiles from a miniselection, select the
    miniselection. Each row in the export file will contain information
    on one subprofile and it's parent profile
-   To export data from multiple collections, select the database or
    selection, select the fields that you would like to export. Choose
    to export to XML format.

Start export
------------

After you selected the target, the fields, and filled in a name for the
export, you can start the import by clicking **Export**. The export will
start immediately. When the file is ready, you will see a download link
to the tab-delimited text file with your export data.

Note: you can close the dialog while your export file is being compiled.
This won't interrupt the process. The file will remain available until
you remove it.

Additional Settings
-------------------

The export dialog has 4 extra tabs to further configure the export
settings.

### Tab Generic

-   **Export name:** Choose a descriptive name for your export.
-   **Description:** By default the description field is pre-filled with
    information about the export. Feel free to add of remove
    information.

![](../images/export2.png)

### Tab Fields

Select the fields that you would like to include in the export.

-   The fields ID, Access code and Profile created are system fields and
    cannot be modified. They are not necessarily included in the export.
-   One export can only contain one database with max one collection at
    once. If you want to export fields from multiple collections, choose
    XML as output file type.

### Tab Filter

Choose if you wish to export all (sub)profiles or only (sub)profiles
that were modified or created since the last export.

*All profiles and/or subprofiles* is the default option. 

### Tab File

Specify the properties of the export file. The default settings are the
most common export settings. \
 [More info about the export file properties](./additional-options-for-your-export-file.md)

### Target and interval

There are several ways to export your data.

-   The export file can be downloaded immediately (you will get a
    download link to the file)
-   The export file can be uploaded to an FTP server at the time and
    interval of your choosing. \
     Example FTPS address:
    ftps://userftp:password@hostname:990/upload/export.txt \
     Make sure you use portnumber 990
-   The export file can be emailed at the time and interval of your
    choosing


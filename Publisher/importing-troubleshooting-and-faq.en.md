On this page you will find some of the most frequently asked questions
about importing data into Copernica.

### Where do I find the import function?

You can find the export data dialog under Profiles \> Current view \>
**Import / Export data**. In the dialog that appears, click on
**Import**.

### I imported a file, and now I have duplicate records in my database

You may have forgotten to set key fields for the import. The system
needs [key
fields](https://www.copernica.com/en/support/what-are-key-fields) in
order to match profiles and subprofiles from an import file with the
current records in your database, and to link subprofiles to its parent
profile. If you have duplicate profiles, you may want to remove the
duplicate profiles from your database first.

### After I imported a file, a new database record (profile) was created for every single imported subprofile

Same story. If you want to update subprofiles, you need to select key
fields on both database and collection level.

### I imported a file to a new database, it all went well, but after the import the database seems to be completely empty / there is only one field: ID

Your data is imported, but the fields are not yet shown in the overview.
To make the fields visible, go to Database management \> [Edit
fields](https://www.copernica.com/en/support/database-and-collection-field-types)

Click a field to edit its properties and check the option ‘**Show this
field on overview pages**’. Repeat this for every field you want to see
on the overview page.

### Help! I’m importing the wrong file/used the wrong settings. Can I cancel the import?

No, once you have clicked on ‘start import’ the import cannot be
stopped. Of course you can undo the wrong import by creating a
(mini)selection afterwards. Use the selection type Check on change,
select the period in which the wrong import occurred and remove the
wrongly imported data via Current view \> edit / remove (sub)profiles.
Note that this is only possible for profiles and subprofiles that were
added to the database during the wrong import. If you have updated a
large amount of profiles, see point below.

### Can I rollback a database to an earlier point after a wrong import?

No, this is not possible. You can only rollback single profiles (this
option can be found in the history tab of the profile). This is of
course no solution if dozens of profiles are affected by a wrong import.
If you want to rollback a database you can send an email to
support@copernica.com. Note that rollbacking a database will cost
**€125.-.**\
\
**The value 0 (zero) is treated the same as an empty value**\
\
 If you use the value '0' (zero) in your import file (for example to
distinguish between opt-out (0) and opt-in (1), and you use the import
setting 'Ignore empty fields in the import file' Then the zero's will
not be imported. 

### My import file has X records, but only Y / more than X records are imported

This can have different causes:

You have used key fields to synchronize records, but some records had
the same value in the field used as a key field.\
 Result: these records are imported as a single record. Solution: use
more key fields and make sure these fields are combined unique for each
record that you want to import.

#### Character encoding

It may also have something to do with special characters in your import
file.

Our software supports UFT-8 character encoding. If your import file has
different encoding settings, please convert the file to UFT-8 encoding
and retry to import the file.

Your import file has tabs/commas/semicolons not intently used as a field
delimiter, but interpreted that way by the importer.\
 You can check this by opening the file in a decent text editor (Free
software Notepad++ is very suitable for this). In the import file, count
the number of columns and the number of rows and multiply these two
numbers. Use the search function (Ctrl-F) to search the number of
instances used as a delimiter. (use ‘\\t’ to search tabs, make sure that
extended search mode is on). If the number of tabs is higher or lower
than the number or rows and columns multiplied, your file contains
mistakes.

Open the file in excel and save it again as a tab delimited txt file.
Maybe try another delimiter (comma or semicolon) and import again. Or
search where it went wrong and resolve the problem manually.

If the files is exported from other software, create a new export and
surround each field with double quotes (if this option is available).

#### The column names are missing in your import file

In a import file, the first row always should contain the name of the
columns. For instance the column with email addresses can be named
‘email’. If a column name matches with a field name used in your
database, it will automatically be linked during the import. Non-matches
(e.g., email vs. emailaddress), can be linked manually using the
importer.

However, if you do not have column names in your import file, the file
can still be imported, but you have to link the database columns to the
first row in your import file. The first record in your import file will
not be imported, because it is used as a reference.

### How long does it take to start and finish an import?

The import will start as soon as possible. Sometimes the server can be
busy though. How long it takes to finish also depends on the size of
your import and the type of import that is performed. Synchronizing data
takes longer than importing only new data. Large imports obviously take
more time than small imports.

### It seems that the import won’t start. Is it stuck?

See point above. Our servers are probably busy. If the problem persists,
contact our support department.

### Can I send multiple notification mails when the import is ready?

Yes, just fill in the email addresses, separated by a comma.

Scheduled imports
-----------------

#### I have scheduled an import, but it is not imported

This can have different causes. One way to find out is to view the
account errors. This can be found in the admin section of the marketing
software.

-   Did you enter a valid file location?
-   The location of the file might have changed. Check if it’s still
    there.
-   If you use a FTP location, make sure that the importer has access to
    the file location.
-   Check if the column names are still the same. If they do not match,
    the file cannot be imported.
-   Check if the file contains data. If it’s empty, the import will not
    start.

Importing date fields
---------------------

**I have valid dates in my import file, but the importer warns me about
invalid dates**

The software makes use of MySQL field types to store data. MySQL
displays date values in ‘YYYY-MM-DD’ format. The supported range is
‘1000-01-01’ to ‘9999-12-31’.

If your import file contains values outside this range, or dates
formatted another way, the importer will give a warning when you start
the import.

If the dates in your import file have a different format, the importer
can transform these to the database format. If your import file contains
all sorts of dates and non-dates, you can use a normal text field to
store the dates.

[Learn more about converting
dates](http://www.copernica.com/en/support/importing-dates-with-format-conversion)

### What happens if I ignore the invalid date warning

Values from your import file that cannot be recognized as dates will not
be imported. After the import the value in your database will remain
empty or the value 0000-00-00 will be stored if the database field is a
date field that may not be emty.

Importing numeric values
------------------------

### I cannot import numeric values with decimals

I have numeric values with a decimal in my import file (e.g., 5,44 or
0.66). When I try to import this column, I get a warning that the column
contains non-supported values.

In the user interface of the software, fractions are not supported in
numeric fields. If you do want to use fractions, use a **text
field**instead.

If you connect with the application through our SOAP API you can use the
field type ‘float’ to store fractions into a numeric field. Note that a
SOAP API imported number with fraction cannot be edited in the user
interface at a later time.

### Is it possible to see which records were updated during an import

There is no such function available in the marketing software, but there
is a workaround.

Create a selection with the condition ‘Check on changes’. Choose the
change type (e.g., Any change to a profile or subprofile) and select a
period of time in which the change must have taken place (e.g., within 1
hour ago). When your import is complete, this selection tells you which
profiles or subprofiles have been updated.

### Exporting data troubleshooting

Where do I find the export function?

You can find the export data dialog under Profiles \> Current view \>
**Import / Export data**. In the dialog that appears, click on
**Export**.

### Can I export errors and such?

Yes, create a selection (check on results email) and export the profiles
from the selection.

### I have a database with more than one collection, but it cannot be exported

You can export multiple collections as a XML file only.

Dates can be written in many ways. Unfortunately. When importing dates
to a date field in Copernica, it is important to know that we use a
specific format for dates. If the dates in your import file have a
different notation, they can (in some cases) be automatically converted
during the import to the appropriate format.

Date fields in Copenica databases only supports the the MySQL date
notation (YYYY-MM-HH). This has some advantages. For instance selections
based on date fields are more reliable and rebuild faster. A
disadvantage is that import files very often house different date
formats.

If your import file has dates formatted other than database format, they
can be converted to the database format during the import.

In the import dialog, go to the tab *Date format*.

First, you need to know the date notation that is used in your import
file. Check if it matches one of the date formats enlisted in the table
below. Use the setting to the left of the matching notation.

| Format used in import file | Use conversion method |
| --- | --- |
| YYYY-MM-DD hh:mm:ss YYYY/MM/DD hh:mm:ss | Database format |
| DD-MM-YYYY hh:mm:ss DD/MM/YYYY hh:mm:ss | European |
| MM/DD/YYYY hh:mm:ss MM-DD-YYYY hh:mm:ss | USA |
| DD-MM-YYYY hh:mm:ss MM/DD/YYYY hh:mm:ss YYYY-MM-DD hh:mm:ss YYYY/MM/DD hh:mm:ss | Auto convert (can be error prone) |

Other scenarios
---------------

### The import file has different date formats

If the import file has a column with dates that come in different
formats, you can choose to import with automatic conversion. The system
will determine what kind of date format is in the import file and
automatically convert it to the database format during the import. This
is however error prone in some cases: the date 03-09-1980 can be meant
to represent March 9th. However it will be imported as 1980-09-03
(September 3th).

### The import file has invalid dates

Dates that cannot be recognized by the application (like Jan 1st 2010 or
24-24-2010) will be ignored during the import. The database field will
remain empty or the value 0000-00-00 will be stored if the database
field is a date field that may not be empty.

If you want to import those invalid dates anyway, you will have to
change the database date field to a text field. This way, no data will
get lost.

If you have valid dates that cannot be recognized by the application
(say 14-03-01 1:30 PM), you can check if the third party software that
you have used to create the import file has an option to export the file
with a different date format.

If you already have an import file with cells or columns that house
non-supported dates, you can try to convert these to standard MySQL
dates using spreadsheet software like Excel or Calc. (In Excel
right-click the cell or column with the date, and choose ‘Cell
properties’ follow the instructions in Excel).

### Field A has the American notation, field B the European

If valid American and European notations are used, you can use the auto
conversion setting.

Per import, you can only set one conversion setting. If you have
different notations in different columns and they are not supported by
auto conversion, you have to split the import and use different
conversion settings for each import.

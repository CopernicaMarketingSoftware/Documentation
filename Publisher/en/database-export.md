# Exporting profiles

You can export profiles and subprofiles to a tab delimited file, or files in
other formats. The export feature can be use to export the entire database
in one go, or to export only parts of the database, for example one collection
at a time. An export creates a file that you can download or you can have it
emailed to your addres.

## Extra remarks

* The fields *ID*, *Access code* and *Profile created* are system fields;
* You can only export fields from one collection at a time to a CSV file. To export multiple collections, choose for export to XML;
* UTF-8 is normally the best encoding for output files;
* Date fields can be formatted in a the format that best suits your needs;
* If you want to keep the export files small, you can compress them. This is especially useful if you want to send export files by mail.


## The delimiter

The delimiter is a special character that is used to separate the fields in
the output file. This normally is a tab, but you can also choose for a comma
or semicolon. if the dabase contains columns that use the delimiter in field
values (for example a hardcoded tab inside a postal code), you can shoose for 
"Quoted columns". The values in the output file will then be wrapped in quotes
to prevent conflicts with the delimiter.

## Exporting email results

You can also export the results of mailings. See [this article](./statistics-export) 
for more information.

To export profiles or subprofiles based on results of email campaigns (like 
exporting all profiles that clicked last week), you first have to create the 
appropriate selection. After you built this selection, you can start the 
export dialog to export the profiles from this selection.

## More information

* [Database management](./database-introduction)
* [Importing a database](./database-import)

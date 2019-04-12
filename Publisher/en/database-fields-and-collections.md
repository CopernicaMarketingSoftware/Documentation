# Fields and collections
The structure of a database consists of fields, interests and collections.
Fields are single-data containers for things like text, a date or a number.
Interests are fields that can only hold yes or no. By adding a
collection to a database you add an extra layer to it. A collection
also consists of single-data fields.

There are many different types of available fields used for specific
types of data. Among these are text fields, numeric fields and date fields.
When designing a database most of the interface speaks for itself, but
for good measure we'll describe the different aspects of databases below anyway.

| Field    	 	     	| Description																				    |
|-----------------------|-----------------------------------------------------------------------------------------------|
| Numeric field      	| Only numerical values [0-9]. Can't be an empty field. Always provide a standard value of 0.   |
| Text field         	| Letters [A-Z], numeric values [0-9] and/or underscores. Maximal number of characters is 225.  |
| Large field        	| Text field up to 16 million characters. Not recommended, because no indexing possible.        |
| Date and time fields 	| Date field (yyyy-mm-dd). Time field contains the hours, minutes and seconds. 					|
| Email field       	| Email field is textfield, intended to safe emailaddresses.                                    |
| Phone field        	| Can be specified for fax, mobile and other phonenumbers.				                        |
| Multiple choice field | Can be used to provide multiple options. Option followed by * is the default value.			|
| Country code field   	| Accepts country codes by ISO 3166 standards.					                                |

You can easily set the values of your field with the "Edit multiple profiles"
functionality.

## Extra options for fields
While editing fields it is possible to select various extra options,
such as sorting a field by default or hiding it. Below you'll find
all options.

### Editing hidden fields
Hidden fields cannot be seen in the profile editing interface. Use this
option for fields you don't want to see or edit in the interface. It is
still possible to import and export the data in these fields.

### Showing a field on overview pages
On pages where a list of profiles is shown, only the fields that have
this option activated are shown. Often times, a database has many more
fields than the ones shown in such a list of profiles. By using this
option you can display the profiles more clearly.

### Sorted fields
This option allows you to sort your list based on a field. It can only
be activated for one field at a time.

### Indexed fields
This option can be used on fields you often search for or fields you use
in selections, making them faster. You may index up to 64 fields, but
using few fields will give you the fastest results. Large fields can not
be indexed.

## More information
Having a clean well-maintained database is the key to successful campaigns.
The articles below give you some tips on building and maintaining your database.

* [Databases](./database-introduction)
* [Database maintenance](./database-maintenance)

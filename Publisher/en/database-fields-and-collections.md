# Database fields
The structure of a database consists of fields, interests and collections.
Fields are single data containers for things like text, a date or a number.
Interests are binary fields that can only be positive or negative. By adding a
collection to a database you add an extra layer to it. A collection
also consists of single data fields, these fields are identical to the ones
used in databases.

There are many different types of fields available for specific
types of data. Among these are text fields, numeric fields and date fields.
When designing a database most of the interface speaks for itself, but
for good measure we'll describe the different aspects of databases below.

| Field    	 	     	| Description																				    |
|-----------------------|-----------------------------------------------------------------------------------------------|
| Text field         	| Letters [A-Z], numeric values [0-9] and/or underscores. Maximal number of characters is 225.  |
| Numeric field      	| Only numerical values [0-9]. Can't be an empty field. Always provide a standard value of 0.   |
| Email field       	| Email field is textfield, intended to safe emailaddresses.                                    |
| Phone field        	| Can be specified for fax, mobile and other phonenumbers.				                        |
| Date and time fields 	| Date field (yyyy-mm-dd). Time field contains the hours, minutes and seconds. 					|
| Country code field   	| Accepts country codes by ISO 3166 standards.					                                |
| Multiple choice field | Can be used to provide multiple options. Option followed by * is the default value.			|
| Large field        	| Text field up to 16 million characters. Not recommended, because no indexing possible.        |
| Reference field       | Field that can be used to reference a profile in another database using that profile's ID     |

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
this option activated are visible. Often times, a database has many more
fields than the ones shown in such a list of profiles. By using this
option you can display the profiles more clearly.

### Sorted fields
This option allows you to sort your list based on a field. It can only
be activated for one field at a time.

### Indexed fields
This option can be used on fields you often search for or those you regularly
use in selections, making them faster. You may index up to 64 fields, but
using few fields will give you the fastest results. Large fields can not
be indexed.

## Interests
Interests are binary fields and can therefore only be turned on or off. You
can also group multiple interests thereby allowing you to cluster them based
on their subject. For example, if you send multiple newsletters, you could
track a profile's subscription to these newsletters using a group of
interests. Interests can be created in the Publisher in the
**Edit database field...** menu under **Database Management**. In the Marketing
Suite interests can be created by going to **Manage fields** which can by found
by clicking on the blue gear in the top-right corner of the
**Database & Profiles** section.

## Creating or editing database fields in the Marketing Suite
To change the structure of your database, go to the section
**Database & Profiles** and click on the blue gear in the top-right corner.
Here you will find the option **Manage fields** where you will find the list
of fields currently in the database and the option to add new fields or
edit the ones that currently exist. Doing so will allow you to give the field
a name, type, and change the extra options explained above.

## Creating or editing database fields in the Publisher
To change the structure of your database, go to the **Profiles** section
and go to the **Edit database field...** menu under **Database Management**.
Here you will find the list of fields currently in the database and the
option to add new fields or edit the ones that currently exist. Doing so
will allow you to give the field a name, type, and change the extra
options explained above.

## More information
Having a clean well-maintained database is the key to successful campaigns.
The articles below give you some tips on building and maintaining your database.

* [Databases](./database-introduction)
* [Database maintenance](./database-maintenance)

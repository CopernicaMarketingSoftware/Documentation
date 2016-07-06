#Database options

Each database and selection in the database management tool has a tab Options, with 
options for specifically that database or selection. 

###Archiving databases

Databases can be archived. An archived database will not show op in the list with databases, unless you 
choose to do so in the filter options. 

Archiving non-used databases has some advantages. 

* You'll maintain a better overview. 
* It will speed up active databases, because selections inside archived databases are not 
updated, leaving all the priority to the selections in the active databases. 

An archived database cannot send mailings. If any, mailings scheduled to a database that gets archived, will automatically be aborted. 

A database can be made active again at any time. From that moment, the database is allowed to send mailing again, 
and selections will start rebuilding again at the usual frequency.

###Database intentions

To prevent accidental mailings to the wrong groups of people, we added an extra safety switch at each database 
and selection, which must be enabled first to allow mailings to be sent to it.

You can find this switch in the tab **Options**, at the database or selection. 

When it's disabled, no mailings can be sent to it. Possible upcoming mailings will not be sent
with mailing intentions disabled. 

###Edit structure

This will bring you to the field [structure management tool](database-field-structure) which allows 
you to configure the field and data structure of your database and its collections.

Note: A database has one structure and knows nothing about selections. 

###Edit name and description

Allows you to edit the name and description of a database or selection. Changing the name and description 
has no effect on running campaigns and will not break linked selections or child selections. 

###Manage privileges

Users with administrator rights are able to set per database or target who is allowed 
to perform certain actions on a database or selection, such as editing, removing and creating. 

###Remove database

If a database is no longer in need, it can be removed. The data in the database will be 
deleted from existence. Statistics about mailings sent to a removed database will remain available. 

Obviously, running campaigns will be aborted when a database is removed. 

Removing a database is irreversible. Once it's gone, it's vanished into thin air.   
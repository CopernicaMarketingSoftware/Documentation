# Followups: database variable

A database linked to your account can be accessed in the data-scripts. 
To request a database object please see the documentation on [the account object](./followups-scripting-copernica)
It is also possible to edit some of the information in the database.

## Available properties

* **ID**: the ID of the database (Read only)
* **name**: the name of the database (Read and write)
* **description**: the description of the database (Read and write)
* **archived**: a boolean value telling if database was archived (Read and write)
* **created**: timestamp of database creation (Read only)
* **profiles**: an array of all database [profiles](./followups-scripting-profile). 
Keys in this array are profile IDs (see example).
* **data**: see the documentation on [the data object](./followups-scripting-data)

## Example profile retrieval
To retrieve a profile from a database you can use the following javascript code.

    <script> 
    var profileID = 54840;

    var someProfile = database.profiles[profileID];
    </script>

## More information
* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [Profile variable](./followups-scripting-profile)
* [Collection variable](./followups-scripting-collection)

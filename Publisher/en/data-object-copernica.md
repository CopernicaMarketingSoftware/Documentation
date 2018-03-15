# Data object: copernica variable

The **copernica** variable is linked to the account registered with 
Copernica. It is available in the data-script object and provides access 
to data linked to your account. This information is available in all scripts 
inside this account.

## Available properties

* **data**: see the documentation on [the data object](./data-object-data)

## Available functions

* **database**: with the name or ID of the [database](./data-object-database) as a key the database 
can be returned
* **collection**: with the ID of the [collection](./data-object-collection) as a key the collection 
can be returned
* **profile**: with the ID of a [profile](./data-object-profile) as a key the profile can be returned
* **subprofile**: with the ID of a [subprofile](./data-object-subprofile) as a key the subprofile 
can be returned
* **template**: with the ID of a [template](./data-object-template) as a key the template 
can be returned

## Example

The following example in javascript can be used to access a database from an account.

    var databaseName = "My database";
    var myDatabase = copernica.database(databaseName);

## More information
* [Data-scripts](./data-object)
* [Data variable](./data-object-data)
* [Profile variable](./data-object-profile)
* [Subprofile variable](./data-object-subprofile)
* [Template variable](./data-object-template)
* [Destination variable](./data-object-destination)

# Followups: copernica variable

The **copernica** variable is linked to the account registered with 
Copernica. It is available in the data-script object and provides access 
to data linked to your account. This information is available in all scripts 
inside this account.

## Available properties

* **data**: see the documentation on [the data object](./followups-scripting-data)
* **properties**: accessible account properties

## Available functions

* **database**: with the name or ID of the [database](./followups-scripting-database) as a key the database 
can be returned
* **collection**: with the ID of the [collection](./followups-scripting-collection) as a key the collection 
can be returned
* **profile**: with the ID of a [profile](./followups-scripting-profile) as a key the profile can be returned
* **subprofile**: with the ID of a [subprofile](./followups-scripting-subprofile) as a key the subprofile 
can be returned

## Example

The following example in javascript can be used to access a database from an account.

    <script>
    
    var databaseName = "My database";
    var myDatabase = copernica.database(databaseName);
    
    </script>

## More information
* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [User profile information](./followups-scripting-profile)
* [User subprofile information](./followups-scripting-subprofile)
* [Destination information](./followups-scripting-destination)

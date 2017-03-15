# Followups: collection variable

A collection is a subset of a [database](./followups-scripting-database) and can be accessed in a data-script.
To request a collection object please see the documentation on [the account object](./followups-scripting-copernica).

## Available properties

* **ID**: The ID of the collection (Read only)
* **name**: The name of the collection (Read and write)
* **created**: The time when collection was created (Read only)
* **data**: The additional [data object](./followups-scripting-data) (Read and write)
* **subprofiles** An array of all [subprofiles](./followups-scripting-subprofile) inside this collection. 
The ID of a subprofile can be used as a key to extract the subprofile 
object from the array (see example).

## Example
To retrieve a subprofile from a collection you can use the following javascript code.

    <script\> 
    var subProfileID = 54840;

    var someSubProfile = collection.subprofiles[subProfileID];
    </script\>

## More information
* [The data-script object](./followups-scripting)
* [Account object](./followups-scripting-copernica)
* [The data object](./followups-scripting-data)
* [Database variable](./followups-scripting-database)
* [Subprofile variable](./followups-scripting-subprofile)


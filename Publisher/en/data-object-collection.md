# Data object: collection variable

A **collection** is a subset of a [database](./data-object-database) and can be accessed in a data-script.
To request a collection object please see the documentation on [the account object](./data-object-copernica).

## Available properties

* **ID**: The ID of the collection (Read only)
* **name**: The name of the collection (Read and write)
* **created**: The time when collection was created (Read only)
* **subprofiles** An array of all [subprofiles](./data-object-subprofile) inside this collection. 
The ID of a subprofile can be used as a key to extract the subprofile 
object from the array (see example).
* **data**: The additional [data object](./data-object-data) (Read and write)

## Example

The following example in javascript can be used to access a subprofile from a collection.

    var subProfileID = 54840;
    var someSubProfile = collection.subprofiles[subProfileID];

## More information
* [The data-script object](./data-object)
* [Copernica/account variable](./data-object-copernica)
* [Data variable](./data-object-data)
* [Database variable](./data-object-database)
* [Subprofile variable](./data-object-subprofile)


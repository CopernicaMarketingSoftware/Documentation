# Followups: **collection** variable

A collection is a subset of a database and can be accessed in a datascript.
To request a collection object please see the documentation on [the account object](./followups-scripting-copernica)

## Available properties

* **ID**: The ID of the collection (Read only)
* **name**: The name of the collection (Read and write)
* **created**: The time when collection was created (Read only)
* **data**: The additional data object (Read and write)
* **subprofiles** An array of all subprofiles inside this collection. 
The ID of a subprofile can be used as a key to extract the subprofile 
object from the array.

## More information
* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [Database variable](./followups-scripting-database)

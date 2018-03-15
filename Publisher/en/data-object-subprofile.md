# Data object: subprofile variable

A variable that gives access to current **subprofile**. To request a 
subprofile object please see the documentation on [the account object](./data-object-copernica).

You can edit the variable and its available properties from Javascript code 
or with the stack icon when a subprofile is selected under the *Database & Profiles* 
tab.

## Available properties

* **ID**: The ID of the subprofile (Read-only)
* **secret**: The secret code of the subprofile. Same as **code** (Read and write)
* **code**: The secret code of the subprofile. Same as **secret** (Read and write)
* **extra**: The extra data. (Read and write)
* **created**: Timestamp of profile creation (Read-only)
* **removed**: Timestamp of profile removal (Read-only)
* **unsubscribed**: A boolean value whether the subprofile is explicitly unsubscribed (Read-only)
* **profile**: An object that gives access to a [profile](./data-object-data) that the subprofile is from
* **collection**: An object that gives access to a [collection](./data-object-data) that the subprofile is from
* **fields**: A hash map of all profiles fields. Fields are set as properties (Read and write)
* **data**: See the documentation on [the data object](./data-object-data)

## Available methods
* **remove()**: Remove this subprofile
* **unsubscribe()**: Unsubscribe this subprofile

## Example

The following example in javascript can be used to access the "age" field of a subprofile.

    var profileAge = subprofile.fields.age;

## More information

* [The data-script object](./data-object)
* [The data object](./data-object-data)
* [User profile information](./data-object-profile)
* [Destination information](./data-object-destination)

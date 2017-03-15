# Followups: subprofile variable

A variable that gives access to current subprofile. To request a 
subprofile object please see the documentation on [the account object](./followups-scripting-copernica).

## Available properties

* **ID**: The ID of the subprofile (Read-only)
* **secret**: The secret code of the subprofile. Same as **code** (Read and write)
* **code**: The secret code of the subprofile. Same as **secret** (Read and write)
* **extra**: The extra data. (Read and write)
* **created**: Timestamp of profile creation (Read-only)
* **removed**: Timestamp of profile removal (Read-only)
* **unsubscribed**: A boolean value whether the subprofile is explicitly unsubscribed (Read-only)
* **profile**: An object that gives access to a [profile](./followups-scripting-data) that the subprofile is from
* **collection**: An object that gives access to a [collection](./followups-scripting-data) that the subprofile is from
* **fields**: A hash map of all profiles fields. Fields are set as properties (Read and write)
* **data**: See the documentation on [the **data** object](./followups-scripting-data)

## Example

The following example in javascript can be used to access the "age" field of a subprofile.

    <script> 
    var profileAge = subprofile.fields.age;
    </script>

## More information

* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [User profile information](./followups-scripting-profile)
* [Destination information](./followups-scripting-destination)

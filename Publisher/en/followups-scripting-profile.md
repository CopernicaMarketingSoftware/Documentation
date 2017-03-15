# Followups: profile variable

In the data-script object you can access information about any profile. 
From a profile object you request and edit the information of the current 
profile. To request a profile object please see the documentation on [the account object](./followups-scripting-copernica).

## Available properties

* **ID**: The ID of the profile (Read-only)
* **secret**: The secret code of the profile. Same as **code** (Read and write)
* **code**: The secret code of the profile. Same as **secret** (Read and write)
* **extra**: The extra data (Read and write)
* **created**: Timestamp of profile creation (Read-only)
* **removed**: Timestamp of profile removal (Read-only)
* **unsubscribed**: A boolean value whether the profile is explicitly unsubscribed (Read-only)
* **database**: An object that gives access to the [database](./followups-scripting-database) that hold the profile (Read-only)
* **fields**: A hash map of all profiles fields. Names of fields are set as properties (Read and write)
* **interests**: A hash map of all profiles interests. Names of interests are
  set as properties (Read and write)
* **data**: See the documentation on [the data object](./followups-scripting-data)

## Example

The following example in javascript can be used to access the "age" field of a profile.

    <script> 
    var profileAge = profile.fields.age;
    </script>

## More information
* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [Database information](./followups-scripting-database)
* [User subprofile information](./followups-scripting-subprofile)
* [Destination information](./followups-scripting-destination)

# Followups: **profile** variable

In the data-script object you can access information about any profile. 
From a profile object you request and edit the information of the current 
profile. To request a profile object please see the documentation on [the account object](./followups-scripting-copernica)

## Available properties

* **ID**: The ID of the profile. (Read-only)
* **secret**: The secret code of the profile. Same as `code`. (Read and write)
* **code**: The secret code of the profile. Same as `secret`. (Read and write)
* **extra**: The extra data. (Read and write)
* **created**: The date when the profile was created at. (Read-only)
* **removed**: The date when the profile was removed at. (Read-only)
* **unsubscribed**: A boolean value whether the profile is explicitly unsubscribed. (Read-only)
* **database**: An object that gives access to the database that hold the profile. (Read-only)
* **fields**: A hash map of all profiles fields. (Read and write)
* **interests**: A hash map of all profiles interests. Names of interests are
  set as properties. (Read and write)
* **data**: see the documentation on [the **data** object](./followups-scripting-data)

## More information
* [The data-script object](./followups-scripting)
* [The **data** object](./followups-scripting-data)
* [Database information](./followups-scripting-database)
* [User subprofile information](./followups-scripting-subprofile)
* [Destination information](./followups-scripting-destination)

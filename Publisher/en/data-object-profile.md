# Data object: profile

In the data-script object you can access information about any **profile**. 
From a profile object you request and edit the information of the current 
profile. To request a profile object please see the documentation on [the copernica object](./data-object-copernica).

You can edit the variable and its available properties from Javascript code 
or with the stack icon when a profile is selected under the *Database & Profiles* 
tab.

## Available properties

* **ID**: The ID of the profile (Read-only)
* **secret**: The secret code of the profile. Same as **code** (Read and write)
* **code**: The secret code of the profile. Same as **secret** (Read and write)
* **extra**: The extra data (Read and write)
* **created**: Timestamp of profile creation (Read-only)
* **removed**: Timestamp of profile removal (Read-only)
* **unsubscribed**: A boolean value whether the profile is explicitly unsubscribed (Read-only)
* **database**: An object that gives access to the [database](./data-object-database) that hold the profile (Read-only)
* **fields**: All fields of the profile, accessible by name (read/write). Can be used like "profile.fields.testfield = 'newval';" (write) or "var testval = profile.fields.testfield;" (read).
* **interests**: All interests of the profile, accessible by name (read/write). Can be used like "profile.interests.testinterest = true;" (write) or "var testval = profile.interests.testinterest;" (read).
* **data**: See the documentation on [the data object](./data-object-data)

## Available methods

* **remove()**: Remove this profile from the database
* **unsubscribe()**: Unsubscribe this profile
* **createSubProfile(collection)**:  Create a new subprofile in the specified collection, returns the newly created subprofile;
* **subProfiles(collection (optional))**:  Retrieve all subprofiles for this profile, optionally specify a collection.

## Example

The following example in javascript can be used to access the "age" field of a profile.

    var profileAge = profile.fields.age;

## More information

* [The data-script object](./data-object)
* [The data object](./data-object-data)
* [Database information](./data-object-database)
* [User subprofile information](./data-object-subprofile)
* [Destination information](./data-object-destination)

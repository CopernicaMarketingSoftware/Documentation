# **profile** variable

A variable that gives access to current profile.

Available properties:

* **ID** The ID of the profile. (Read-only)
* **secret** The secret code of the profile. Same as `code`. (Read and write)
* **code** The secret code of the profile. Same as `secret`. (Read and write)
* **extra** The extra data. (Read and write)
* **created** The date when the profile was created at. (Read-only)
* **removed** The date when the profile was removed at. (Read-only)
* **unsubscribed** A boolean value whether the profile is explicitly unsubscribed. (Read-only)
* [**database**](./folllowup-scripting-database.md) An object that gives access to the database that hold the profile.
* **fields** A hash map of all profiles fields. values are readable and writeable.
* **interests** A hash map of all profiles interests. Names of interests are
  set as properties. Values are readable and writeable.
* [**data**](./followups-scripting-data.md)

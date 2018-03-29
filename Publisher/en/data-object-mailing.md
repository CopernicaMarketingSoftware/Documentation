<<<<<<< HEAD:Publisher/en/followups-scripting-mailing.md
# Scripting: mailing variable
=======
# Data object: mailing variable
>>>>>>> newfollowups:Publisher/en/data-object-mailing.md

The **mailing** variable can also be accessed in the data-script object. From 
a mailing object you can access its properties, but not edit them.

## Available properties

* **ID**: The ID of the emailing. (Read-only)
* **subject**: The subject of the emailing. (Read-only)
<<<<<<< HEAD:Publisher/en/followups-scripting-mailing.md
* **data**: An advanced property you can use to store more information. See 
the documentation on the [data property](./followups-scripting-data) (Read and write)
=======
* **data**: See the documentation on [the data object](./data-object-data)
>>>>>>> newfollowups:Publisher/en/data-object-mailing.md

## Example

The following example in javascript can be used to access a subject of a mailing.

    var mySubject = mailing.subject;

## More information
* [The data-script object](./data-object)
* [The data object](./data-object-data)
* [Template variable](./data-object-template)
* [Message variable](./data-object-message)

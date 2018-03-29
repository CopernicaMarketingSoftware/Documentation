<<<<<<< HEAD:Publisher/en/followups-scripting-message.md
# Scripting: message variable
=======
# Data object: message variable
>>>>>>> newfollowups:Publisher/en/data-object-message.md

A variable that gives access to personalized **snapshot** of a template.

## Available properties

* **name**: The name of the snapshot (Read-only property)
* **source**: The source code of the personalized snapshot (Read-only property)
* **subject**: The subject of the snapshot (Read-only property)
<<<<<<< HEAD:Publisher/en/followups-scripting-message.md
* **data**: An advanced property you can use to store more information. See 
the documentation on the [data property](./followups-scripting-data) (Read and write)
=======
* **data**: See the documentation on [the data object](./data-object-data)
>>>>>>> newfollowups:Publisher/en/data-object-message.md

## Example

The following example in javascript can be used to access the source code for a personalized template.
    
    var mySourceCode = message.source;

## More information

* [The data-script object](./data-object)
* [Template information](./data-object-template)
* [Mailing information](./data-object-mailing)

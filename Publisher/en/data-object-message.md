# Data object: message variable

A variable that gives access to personalized **snapshot** of a template.

## Available properties

* **name**: The name of the snapshot (Read-only property)
* **source**: The source code of the personalized snapshot (Read-only property)
* **subject**: The subject of the snapshot (Read-only property)
* **data**: See the documentation on [the data object](./data-object-data)

## Example

The following example in javascript can be used to access the source code for a personalized template.
    
    var mySourceCode = message.source;

## More information

* [The data-script object](./data-object)
* [Template information](./data-object-template)
* [Mailing information](./data-object-mailing)

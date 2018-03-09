# Scripting: message variable

A variable that gives access to personalized **snapshot** of a template.

## Available properties

* **name**: The name of the snapshot (Read-only property)
* **source**: The source code of the personalized snapshot (Read-only property)
* **subject**: The subject of the snapshot (Read-only property)
* **data**: An advanced property you can use to store more information. See 
the documentation on the [data property](./followups-scripting-data) (Read and write)

## Example

The following example in javascript can be used to access the source code for a personalized template.
    
    var mySourceCode = message.source;

## More information

* [The data-script object](./followups-scripting)
* [Template information](./followups-scripting-template)
* [Mailing information](./followups-scripting-mailing)

# Followups: message variable

A variable that gives access to personalized snapshot of a template.

## Available properties

* **name**: The name of the snapshot (Read-only property)
* **source**: The source code of the personalized snapshot (Read-only property)
* **subject**: The subject of the snapshot (Read-only property)
* **data**: See the documentation on [the **data** object](./followups-scripting-data)

## Example

The following example shows how to retrieve the source code for a message.
    
    <script\> 
    var mySourceCode = message.source
    </script\>

## More information

* [The data-script object](./followups-scripting)
* [Template information](./followups-scripting-template)
* [Mailing information](./followups-scripting-mailing)

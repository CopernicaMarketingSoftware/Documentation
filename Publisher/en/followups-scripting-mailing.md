# Followups: mailing variable

The mailing variable can also be accessed in the data-script object. From 
a mailing object you can access its properties, but not edit them.

## Available properties
* **ID**: The ID of the emailing. (Read-only)
* **subject**: The subject of the emailing. (Read-only)
* **data**: See the documentation on [the **data** object](./followups-scripting-data)

## Example

The following example in javascript can be used to access a subject of a mailing.

    <script> 
    var mySubject = mailing.subject
    </script>

## More information
* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [Template variable](./followups-scripting-template)
* [Message variable](./followups-scripting-message)

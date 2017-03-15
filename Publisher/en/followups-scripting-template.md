# Followups: template variable

A variable that gives access to a unpersonalized template.

## Available properties:

* **ID**: The ID of the template (Read-only)
* **name**: The name of the template (Read, write)
* **subject**: The subject of the templates (Read, write)
* **data**: See the documentation on [the data object](./followups-scripting-data)

## Example

The following javascript code shows how to request the subject of a mailing.

    <script\> 
    var mySubject = mailing.subject
    </script\>

## More information

* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [Personalized template variable](./followups-scripting-message)
* [Mailing variable](./followups-scripting-mailing)

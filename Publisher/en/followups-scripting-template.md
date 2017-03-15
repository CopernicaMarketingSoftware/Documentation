# Followups: template variable

A variable that gives access to a unpersonalized **template**.

## Available properties:

* **ID**: The ID of the template (Read-only)
* **name**: The name of the template (Read, write)
* **subject**: The subject of the templates (Read, write)
* **data**: See the documentation on [the data object](./followups-scripting-data)

## Example

The following example in javascript can be used to access the subject of a template.

    var mySubject = template.subject;

## More information

* [The data-script object](./followups-scripting)
* [The data object](./followups-scripting-data)
* [Personalized template variable](./followups-scripting-message)
* [Mailing variable](./followups-scripting-mailing)

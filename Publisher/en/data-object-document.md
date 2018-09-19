# Data object: document

An object that gives access to a **document**. Please note that this object is only available in Publisher environments. Marketing Suite uses [templates](./data-object-template).

## Available properties:

* **ID**: The ID of the document (Read-only)
* **name**: The name of the document (Read, write)
* **subject**: The subject of the document (Read, write)
* **data**: See the documentation on [the data object](./data-object-data)

## Example

The following example in javascript can be used to access the subject of a document.

```javascript
var mySubject = document.subject;
```

## More information

* [The data-script object](./data-object-scripting)
* [The data object](./data-object-data)

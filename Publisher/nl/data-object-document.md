# Data object - document

Het document data-object kan worden gebruikt om informatie van een document op te vragen 
of aan te passen. Let op: het document-object is alleen beschikbaar in Publisher. In de Marketing Suite1 kan gebruik gemaakt worden van het vergelijkbare [template-object](./data-object-template).

## Beschikbare eigenschappen

* id: 			id van het document (read-only)
* name: 		naam van het document (read, write)
* subject: 		onderwerp van het document (read, write)
* data: 		zie documentatie over het [data data-script](./data-object-data)

## Voorbeeld

Met het volgende voorbeeld kun je het onderwerp van een document opvragen.

```javascript
var mySubject = document.subject;
```

## Meer informatie

* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)

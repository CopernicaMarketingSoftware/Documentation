<<<<<<< HEAD:Publisher/nl/followups-scripting-message.md
# Scripting - message
=======
# Data object - message
>>>>>>> newfollowups:Publisher/nl/data-object-message.md

Het message data-script geeft toegang tot een gepersonaliseerde snapshot van een
[template](./data-object-template). Er kan dus gepersonaliseerde informatie
worden opgevraagd, zoals de broncode en het onderwerp van de message. 

## Beschikbare eigenschappen

* name: 	naam van de snapshot (Read-only property);
* source: 	de broncode van de snapshot (Read-only property);
* subject: 	het onderwerp van de snapshot (Read-only property);
<<<<<<< HEAD:Publisher/nl/followups-scripting-message.md
* data: 	een geavanceerde eigenschap waarin je zelf meer informatie op kan slaan. 
Zie ook de documentatie over de [data eigenschap](./followups-scripting-data).
=======
* data: 	zie documentatie over [data data-script](./data-object-data).

>>>>>>> newfollowups:Publisher/nl/data-object-message.md

## Voorbeeld

Met het volgende voorbeeld in JavaScript kun je de broncode van een gepersonalizeerde template opvragen.

```javascript
var mySourceCode = message.source;
```

## Meer informatie

<<<<<<< HEAD:Publisher/nl/followups-scripting-message.md
* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Template Class](./followups-scripting-template)
=======
* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)
* [Template variabele](./data-object-template)
>>>>>>> newfollowups:Publisher/nl/data-object-message.md

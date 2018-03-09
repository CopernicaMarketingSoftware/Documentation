# Scripting - message

Het message data-script geeft toegang tot een gepersonaliseerde snapshot van een
[template](./followups-scripting-template). Er kan dus gepersonaliseerde informatie
worden opgevraagd, zoals de broncode en het onderwerp van de message. 

## Beschikbare eigenschappen

* name: 	naam van de snapshot (Read-only property);
* source: 	de broncode van de snapshot (Read-only property);
* subject: 	het onderwerp van de snapshot (Read-only property);
* data: 	een geavanceerde eigenschap waarin je zelf meer informatie op kan slaan. 
Zie ook de documentatie over de [data eigenschap](./followups-scripting-data).

## Voorbeeld

Met het volgende voorbeeld in JavaScript kun je de broncode van een gepersonalizeerde template opvragen.

```javascript
var mySourceCode = message.source;
```

## Meer informatie

* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Template Class](./followups-scripting-template)

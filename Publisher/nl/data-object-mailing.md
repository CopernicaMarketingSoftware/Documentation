<<<<<<< HEAD:Publisher/nl/followups-scripting-mailing.md
# Scripting - mailing
=======
# Data object - mailing
>>>>>>> newfollowups:Publisher/nl/data-object-mailing.md

Het mailing data-script kan worden gebruikt om informatie op te vragen over een mailing. 

## Beschikbare eigenschappen

* id: 			id van de mailing (Read-only);
* subject: 		onderwerp van de mailing (Read-only);
<<<<<<< HEAD:Publisher/nl/followups-scripting-mailing.md
* data: 		een geavanceerde eigenschap waarin je zelf meer informatie op kan slaan. 
Zie ook de documentatie over de [data eigenschap](./followups-scripting-data).
=======
* data: 		zie documentatie over het [data data-script](./data-object-data).

>>>>>>> newfollowups:Publisher/nl/data-object-mailing.md

## Voorbeeld

Met het volgende voorbeeld kun je het onderwerp van een mailing opvragen.

```javascript
var mySubject = mailing.subject;
```

## Meer informatie

* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)

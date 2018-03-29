<<<<<<< HEAD:Publisher/nl/followups-scripting-template.md
# Scripting - template

Het template data-script kan worden gebruikt om informatie van een (ongepersonalizeerde) template 
op te vragen of aan te passen. Zie het [message object](./followups-scripting-message) 
voor de gepersonalizeerde versie van een template. 
=======
# Data object - template

Het template data-script kan worden gebruikt om informatie van een template op te vragen 
of aan te passen. 

Je kunt de variabele en beschikbare eigenschappen aanpassen met Javascript code 
of in het "Tools" menu van de Email Designer.
>>>>>>> newfollowups:Publisher/nl/data-object-template.md

## Beschikbare eigenschappen

* id: 			id van de template (read-only);
* name: 		naam van de template (read, write);
* subject: 		onderwerp van de templates (read, write);
<<<<<<< HEAD:Publisher/nl/followups-scripting-template.md
* data: 		een geavanceerde eigenschap waarin je zelf meer informatie op kan slaan. 
Zie ook de documentatie over de [data eigenschap](./followups-scripting-data).
=======
* data: 		zie documentatie over het [data data-script](./data-object-data).
>>>>>>> newfollowups:Publisher/nl/data-object-template.md

## Beschikbare functies

send(target): 	direct verzenden van een e-mail naar een target (database, collection, 
destination, profile of subprofile)

## Voorbeeld

Met het volgende voorbeeld kun je het onderwerp van een mailing opvragen.

```javascript
var mySubject = template.subject;
```

Met het volgende voorbeeld kun je een e-mail versturen zodra er op een link wordt geklikt.

```javascript
var templateID = 1520;

//set global destination
copernica.template(templateID).send(destination);
```

## Meer informatie

* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)
* [Message data-script](./data-object-message)

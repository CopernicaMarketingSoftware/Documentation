# Scripting - template

Het template data-script kan worden gebruikt om informatie van een (ongepersonalizeerde) template 
op te vragen of aan te passen. Zie het [message object](./followups-scripting-message) 
voor de gepersonalizeerde versie van een template. 

## Beschikbare eigenschappen

* id: 			id van de template (read-only);
* name: 		naam van de template (read, write);
* subject: 		onderwerp van de templates (read, write);
* data: 		een geavanceerde eigenschap waarin je zelf meer informatie op kan slaan. 
Zie ook de documentatie over de [data eigenschap](./followups-scripting-data).

## Beschikbare methoden

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

* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Message data-script](./followups-scripting-message)

# Data-script - template

Het template data-script kan worden gebruikt om informatie van een template op te vragen of aan te passen. 


## Beschikbare eigenschappen

* id: 			id van de template (read-only);
* name: 		naam van de template (read, write);
* subject: 		onderwerp van de templates (read, write);
* data: 		zie documentatie over het [data data-script](./followups-scripting-data).


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

# Followups: Template Class

De **Template** Class kan worden gebruikt om informatie van een template op te vragen en aan te passen. 
Er is in ieder script een globale `template` variabele aanwezig, met een instantie van het template 
waarmee de email is gemaakt. Dit is ongepersonaliseerd, in tegenstelling tot de [message](./followups-scripting-message).

Zie daarnaast de documentatie van de [Copernica class](./followups-scripting-message) om een template op te vragen met een id.

## Beschikbare eigenschappen

* **id**: Id van de template (Read-only)
* **name**: Naam van de template (Read, write)
* **subject**: Onderwerp van de templates (Read, write)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Beschikbare methoden

`send(*target*): direct verzenden van een email naar een target (database, collectie, profiel of subprofiel)`

De send methode kan worden gebruikt om een template naar een *target* te versturen. 
Het target kan een gewone (enkele) bestemming zijn, zoals een profiel of een subprofiel, 
maar ook met meerdere bestemmingen zoals een gehele database of collectie. 

## Voorbeeld

Met het volgende voorbeeld in javascript kun je het onderwerp van een mailing opvragen.

```javascript
var mySubject = template.subject;
```

Neem nu voor een leuker voorbeeld aan dat er nog een mail klaar staat om verzonden te worden
zodra er op de link is geklikt.

```javascript
var templateID = 1520;

//set global destination
copernica.template(templateID).send(destination)
```

## Meer informatie

* [Het data-script](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Message Class](./followups-scripting-message)

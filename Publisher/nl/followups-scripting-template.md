# Followups: template variabele

Variabele die toegang geeft tot een niet-gepersonalizeerde **template**.

## Beschikbare eigenschappen

* **ID**: ID van de template (Read-only)
* **name**: Naam van de template (Read, write)
* **subject**: Onderwerp van de templates (Read, write)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Beschikbare methoden

### send(*target*)
De send methode kan worden gebruikt om dit template object naar een *target* te sturen. Dit
kan een enkele bestemming zijn zoals een profiel of subprofiel, maar ook meerdere bestemmingen 
zoals een gehele database of collectie. De mail wordt na het aanroepen direct verzonden, en
wordt verder hetzelfde behandeld als iedere andere mail naar deze bestemming.



## Voorbeeld

Met het volgende voorbeeld in javascript kun je het onderwerp van een mailing opvragen.

    var mySubject = template.subject;

Neem nu voor een leuker voorbeeld aan dat er nog een mail klaar staat om verzonden te worden
zodra er op de link is geklikt. Het verzenden van een template op basis van zijn id is zo simpel
als de regel hieronder.

    copernica.template(*id*).send(destination)


## Meer informatie
* [Het data-script object](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Gepersonaliseerde template](./followups-scripting-message)

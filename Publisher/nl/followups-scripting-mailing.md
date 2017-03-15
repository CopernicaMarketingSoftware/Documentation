# Followups: mailing variabele

De **mailing** variabele kan gebruikt worden in het data-script object. Een 
mailing is al geweest, dus je kunt alleen zijn eigenschappen lezen en niet 
bewerken.

## Beschikbare eigenschappen

* **ID**: ID van de mailing (Read-only)
* **subject**: Onderwerp van de mailing (Read-only)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je het onderwerp van een mailing opvragen.

    var mySubject = mailing.subject;

## Meer informatie
* [Het data-script object](./followups-scripting)
* [Het data object](./followups-scripting-data)

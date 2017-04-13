# Followups: mailing klasse

De **mailing** klasse kan worden gebruikt om informatie op te vragen over een mailing binnen het account. 
De enige beschikbare instantie is momenteel de globale `mailing` variabele, en omdat deze mailing al geweest
is zijn de eigenschappen alleen leesbaar. 

## Beschikbare eigenschappen

* **ID**: ID van de mailing (Read-only)
* **subject**: Onderwerp van de mailing (Read-only)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je het onderwerp van een mailing opvragen.

    var mySubject = mailing.subject;

## Meer informatie
* [Het data-script](./followups-scripting)
* [Het data object](./followups-scripting-data)

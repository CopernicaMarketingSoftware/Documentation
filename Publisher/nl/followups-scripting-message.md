# Followups: message variabele
Een variabele die toegang geeft tot een gepersonalizeerde snapshot van 
een [template](./followups-scripting-template).

## Beschikbare eigenschappen

* **name**: Naam van de snapshot (Read-only property)
* **source**: De broncode van de snapshot (Read-only property)
* **subject**: Het onderwerp van de snapshot. (Read-only property)

## Voorbeeld

Het volgende voorbeeld in javascript kun je gebruiken om de broncode van 
een gepersonalizeerde template op te vragen.

    <script\> 
    var mySourceCode = message.source
    </script\>

## Meer informatie
* [Het data-script object](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Template variabele](./followups-scripting-template)

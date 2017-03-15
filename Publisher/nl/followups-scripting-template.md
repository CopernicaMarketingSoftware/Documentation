# Followups: template variabele

Variabele die toegang geeft tot een niet-gepersonalizeerde template.

## Beschikbare eigenschappen

* **ID**: ID van de template (Read-only)
* **name**: Naam van de template (Read, write)
* **subject**: Onderwerp van de templates (Read, write)
* **data**: Zie documentatie over [the data object](./followups-scripting-data)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je het onderwerp van een mailing opvragen.

    <script> 
    var mySubject = template.subject;
    </script>

## Meer informatie
* [Het data-script object](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Gepersonaliseerde template](./followups-scripting-message)

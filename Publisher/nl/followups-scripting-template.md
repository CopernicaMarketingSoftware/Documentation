# Followups: template variabele

De **template** klasse kan worden gebruikt om informatie op te vragen en aan te passen van
een template. Er is in ieder script een globale `template` variabele aanwezig, met een instantie
van het template waarmee de email is gemaakt. Dit is ongepersonaliseerd, in tegenstelling tot de [message](./followups-scripting-message).

Zie daarnaast de documentatie van de [copernica klasse](./followups-scripting-message) om een template op te vragen met een ID.

## Beschikbare eigenschappen

* **ID**: ID van de template (Read-only)
* **name**: Naam van de template (Read, write)
* **subject**: Onderwerp van de templates (Read, write)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Beschikbare methoden

* **send(*target*)**: direct verzenden van een email naar een target (database, collectie, profiel of subprofiel)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je het onderwerp van een mailing opvragen.

    var mySubject = template.subject;

Neem nu voor een leuker voorbeeld aan dat er nog een mail klaar staat om verzonden te worden
zodra er op de link is geklikt.

    var templateID = 1520;
    
    // destination is altijd de globale bestemming van de huidige mail met de geklikte link,
    // en we willen deze mail sturen als vervolg naar de klikker
    copernica.template(templateID).send(destination)


## Meer informatie
* [Het data-script](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [message klasse](./followups-scripting-message)

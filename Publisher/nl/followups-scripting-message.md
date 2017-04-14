# Followups: message klasse

De **message** klasse geeft toegang tot een gepersonalizeerde snaphot van een
[template](./followups-scripting-template). Hiermee kan gepersonaliseerde informatie worden
opgevraagd, zoals de broncode en het onderwerp van de message zoals deze verzonden is. Omdat dit
een snapshot is, maakt het niet uit als ondertussen de template compleet veranderd is of andere
eigenschappen zijn aangepast, deze zijn binnen de message klasse nog hetzelfde als het moment
dat de email verzonden is.

De enige instantie van de **message** klasse is momenteel het globale `message` object, wat
de gepersonaliseerde versie bevat van het huidige [template](./followups-scripting-template).

## Beschikbare eigenschappen

* **name**: Naam van de snapshot (Read-only property)
* **source**: De broncode van de snapshot (Read-only property)
* **subject**: Het onderwerp van de snapshot. (Read-only property)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je de broncode van een gepersonalizeerde template opvragen.

    var mySourceCode = message.source;

## Meer informatie

* [Het data-script](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Template klasse](./followups-scripting-template)

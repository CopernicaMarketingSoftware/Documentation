# Followups: subprofiel klasse

De **subprofiel** klasse kan worden gebruikt om informatie over een subprofiel op te vragen en aan te passen. 
Een subprofiel kan op meerdere manieren worden verkregen. Ten eerste, als de huidige bestemming een collectie 
of mini-selectie was, dan is er een globale `subprofile` variabele aanwezig met een instantie van het subprofiel
waar het naar verzonden is. Daarnaast kan het nog per ID worden opgevraagd via de [copernica klasse](./followups-scripting-copernica).
Als laatste kan het ook nog uit een [collectie](./followups-scripting-collection) worden verkregen.

## Beschikbare eigenschappen

* **ID**: ID van een profiel (Read-only)
* **secret**: Geheime code van het profiel, gelijk aan `code`. (Read and write)
* **code**: Geheime code van het profiel, gelijk aan `secret`. (Read and write)
* **extra**: Extra data (Read and write)
* **created**: Tijdstip van aanmaken profiel (Read-only)
* **removed**: Tijdstip van verwijderen profiel (Read-only)
* **unsubscribed**: Boolean waarde die aangeeft of een profiel uitgeschreven is (Read-only)
* **collection**: [Collectie](./followups-scripting-collection) van het subprofiel (Read-only)
* **fields**: Hash map van de "fields" parameter van een profiel. De namen worden hier gebruikt als eigenschap (Read and write)
* **interests**: Hash map van de "interests" parameter van een profiel. De namen worden hier gebruikt als eigenschap (Read and write)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Beschikbare methoden
* **remove()**: Verwijder dit subprofiel
* **unsubscribe()**: Unsubscribe dit subprofiel

## Voorbeeld

Met het volgende voorbeeld in javascript kun je een veld van een subprofiel 
opvragen. In dit geval vragen we de leeftijd op, maar je kunt elk veld in 
het subprofiel op deze manier opvragen.

    var profileAge = subprofile.fields.age;

## Meer informatie
* [Het data-script](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Database klasse](./followups-scripting-database)
* [Profiel klasse](./followups-scripting-profile)
* [Destination variabele](./followups-scripting-destination)


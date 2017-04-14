# Followups: profiel klasse

De **profiel** klasse wordt gebruikt om gegevens van een profiel aan te passen en op
te vragen. Een profiel kan op meerdere manieren worden verkregen. Ten eerste is er altijd 
een globale `profile` variabele, welke een instantie van de **profiel** klasse bevat. Dit is altijd 
het profiel waar de mail naar is verzonden. Daarnaast kan een profiel worden opgevraagd via het 
[copernica](./followups-scripting-copernica) object, met een ID. Als laatste kan een profiel worden verkregen
uit een [database](./followups-scripting-database).

## Beschikbare eigenschappen

* **ID**: ID van een profiel (Read-only)
* **secret**: Geheime code van het profiel, gelijk aan `code`. (Read and write)
* **code**: Geheime code van het profiel, gelijk aan `secret`. (Read and write)
* **extra**: Extra data (Read and write)
* **created**: Tijdstip van aanmaken profiel (Read-only)
* **removed**: Tijdstip van verwijderen profiel (Read-only)
* **unsubscribed**: Boolean waarde die aangeeft of een profiel uitgeschreven is (Read-only)
* **database**: [Database](./followups-scripting-database) van het profiel (Read-only)
* **fields**: Hash map van de "fields" parameter van een profiel. De naam wordt hier gebruikt als eigenschap (Read and write)
* **interests**: Hash map van de "interests" parameter van een profiel. De naam wordt hier gebruikt als eigenschap (Read and write)
* **data**: Zie documentatie over [het data object](./followups-scripting-data)

## Beschikbare functies
* **remove()**: Verwijder dit profiel
* **unsubscribe()**: Unsubscribe dit profiel

## Voorbeeld

Met het volgende voorbeeld in javascript kun je een veld van een profiel 
opvragen. In dit geval vragen we de leeftijd op, maar je kunt elk veld in 
het profiel op deze manier opvragen.

    var profileAge = profile.fields.age;

## Meer informatie

* [Het data-script](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Database klasse](./followups-scripting-database)
* [Subprofiel klasse](./followups-scripting-subprofile)
* [Destination variabele](./followups-scripting-destination)

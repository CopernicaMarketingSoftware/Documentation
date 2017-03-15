# Followups: subprofile variabele

In het data-script object kun je informatie opvragen over elk subprofiel.
Van een profiel kun je informatie opvragen en aanpassen. Om een subprofiel op 
te vragen kun je meer informatie vinden in de documentatie over [het account object](./followups-scripting-copernica)

## Beschikbare eigenschappen

* **ID**: ID van een profiel (Read-only)
* **secret**: Geheime code van het profiel, gelijk aan `code`. (Read and write)
* **code**: Geheime code van het profiel, gelijk aan `secret`. (Read and write)
* **extra**: Extra data (Read and write)
* **created**: Tijdstip van aanmaken profiel (Read-only)
* **removed**: Tijdstip van verwijderen profiel (Read-only)
* **unsubscribed**: Boolean waarde die aangeeft of een profiel uitgeschreven is (Read-only)
* **collection**: Collectie van het profiel (Read-only)
* **fields**: Hash map van de "fields" parameter van een profiel (Read and write)
* **interests**: Hash map van de "interests" parameter van een profiel (Read and write)
* **data**: zie documentatie over [het **data** object](./followups-scripting-data)

## Meer informatie
* [Het data-script object](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Database informatie](./followups-scripting-database)
* [User profile informatie](./followups-scripting-profile)
* [Destination informatie](./followups-scripting-destination)


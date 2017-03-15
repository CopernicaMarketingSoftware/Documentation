# Followups: database variabele

Een database gelinkt aan jouw account kan gebruikt worden in data-scripts.
Om een database op te vragen kun je instructies vinden in de documentatie 
over [het account object](./followups-scripting-copernica).
Het is ook mogelijk om informatie binnen de database aan te passen.

## Beschikbare eigenschappen

* **ID**: ID van de database (Read only)
* **name**: Naam van de database (Read and write)
* **description**: Omschrijving van de database (Read and write)
* **archived**: Een boolean waarde om aan te geven of de database gearchiveerd is (Read and write)
* **created**: Tijdstip van aanmaken (Read only)
* **profiles**: Array van database profielen. De keys in dit object zijn IDs van profielen 
die gebruikt kunnen worden om de profielen zelf op te vragen.
* **data**: zie de documentatie over [het data object](./followups-scripting-data)

## Meer informatie
* [Het data-script object](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Collection variabele](./followups-scripting-collection)

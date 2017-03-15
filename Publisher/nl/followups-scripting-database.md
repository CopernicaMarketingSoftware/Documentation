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
* **profiles**: Array van database [profielen](./followups-scripting-profile). De keys in dit object zijn IDs van profielen 
die gebruikt kunnen worden om de profielen zelf op te vragen.
* **data**: zie de documentatie over [het data object](./followups-scripting-data)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je een profiel uit een database 
opvragen.

    <script\> 
    var profileID = 54840;

    var someProfile = database.profiles[profileID];
    </script\>

## Meer informatie
* [Het data-script object](./followups-scripting)
* [Data variabele](./followups-scripting-data)
* [Collectie variabele](./followups-scripting-collection)
* [Profiel variabele](./followups-scripting-data)

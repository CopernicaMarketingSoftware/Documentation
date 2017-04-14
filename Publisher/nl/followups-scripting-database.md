# Followups: database klasse

Een database gelinkt aan jouw account kan worden opgevraagd en gebruikt in data-scripts binnen het account.
Het is met dit object mogelijk om informatie binnen de database aan te passen, om de database te 
archiveren en om de profielen van de database te verkrijgen. 
Zie [de profiel klasse](./followups-scripting-profile) om een database instantie van een profiel te verkrijgen, en zie de documentatie over \
[de copernica klasse](./followups-scripting-copernica) voor het verkrijgen van een willekeurige database instantie op 
basis van ID of naam.

## Beschikbare eigenschappen

* **ID**: ID van de database (Read only)
* **name**: Naam van de database (Read and write)
* **description**: Omschrijving van de database (Read and write)
* **archived**: Een boolean waarde om aan te geven of de database gearchiveerd is (Read and write)
* **created**: Tijdstip van aanmaken (Read only)
* **profiles**: Array van database [profielen](./followups-scripting-profile). De keys in dit object zijn IDs van profielen 
die gebruikt kunnen worden om de profielen zelf op te vragen
* **data**: zie de documentatie over [het data object](./followups-scripting-data)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je een profiel uit een database 
opvragen.

    var profileID = 54840;
    var someProfile = database.profiles[profileID];

## Meer informatie

* [Het data-script](./followups-scripting)
* [Data klasse](./followups-scripting-data)
* [Collectie klasse](./followups-scripting-collection)
* [Profiel klasse](./followups-scripting-data)

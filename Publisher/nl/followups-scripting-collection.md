# Followups: collection klasse

Een collectie is een subset van een [database](./followups-scripting-database) en kan ook gebruikt worden 
in een data-script of followup. Zie [het copernica object](./followups-scripting-copernica) voor het opvragen
van een instantie van een collectie.

## Beschikbare eigenschappen

* **ID**: ID van de collectie (Read only)
* **name**: Naam van de collectie (Read and write)
* **created**: Tijdstip waarop de collectie is aangemaakt (Read only)
* **subprofiles** Een array met [subprofielen](./followups-scripting-data) in deze collectie. 
Het ID van een subprofiel kan als key gebruikt worden om een subprofiel object 
uit de array op te vragen (zie voorbeeld).
* **data**: Zie de documentatie over [de data variabele](./followups-scripting-data)

## Voorbeeld

Met het volgende voorbeeld in javascript kun je een subprofiel uit een 
collectie opvragen.

    var subProfileID = 54840;
    var someSubProfile = collection.subprofiles[subProfileID];

## Meer informatie
* [Het data-script](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Database variabele](./followups-scripting-database)

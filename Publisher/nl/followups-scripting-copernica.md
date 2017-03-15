# Followups: copernica variabele

De **copernica** variabele is gelinkt aan de account die je hebt geregistreerd
bij Copernica. Deze is beschikbaar in het data-script object en geeft 
toegang tot de data die bij jouw account hoort. Deze informatie is beschikbaar
binnen alle scripts gemaakt met deze account.

## Beschikbare eigenschappen

* **data**: zie de documentatie van [het data object](./followups-scripting-data)
* **properties**: de informatie over de account

## Beschikbare functies

* **database**: een [database](./followups-scripting-database) kan opgevraagd worden per naam of ID
* **collection**: een [collectie](./followups-scripting-collection) kan opgevraagd worden per ID
* **profile**: een [profiel](./followups-scripting-profile) kan opgevraagd worden per ID
* **subprofile**: een [subprofiel](./followups-scripting-subprofile) kan opgevraagd worden per ID

## Voorbeeld

Het volgende voorbeeld laat zien hoe je een database op kunt vragen.

    <script> 
    var databaseName = "My database";

    var myDatabase = copernica.database(databaseName);
    </script>

## Meer informatie
* [Het data-script object](./followups-scripting)
* [Het data object](./followups-scripting-data)
* [Profiel informatie](./followups-scripting-profile)
* [Subprofiel informatie](./followups-scripting-subprofile)
* [Destination informatie](./followups-scripting-destination)

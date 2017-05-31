# Copernica data-script 

Het copernica data-script is gelinkt aan het account dat je hebt geregistreerd bij Copernica. 
Asnpassingen aan het globale `copernica.data` object zijn in alle scripts van het account 
zichtbaar.


## Beschikbare eigenschappen

* data: zie de documentatie van [data data-script](./followups-scripting-data)


## Beschikbare functies

* database(*id* of *naam*): een [database](./followups-scripting-database) instantie kan opgevraagd worden per naam of id;
* collection(*id*): een [collection](./followups-scripting-collection) instantie kan opgevraagd worden per id;
* profile(*id*): een [profile](./followups-scripting-profile) instantie kan opgevraagd worden per id;
* subprofile(*id*): een [subprofile](./followups-scripting-subprofile) instantie kan opgevraagd worden per id;
* template(*id*): een [template](./followups-scripting-template) instantie kan opgevraagd worden per id.


## Voorbeeld

Met het volgende voorbeeld in Javascript kun je een database van een account opvragen.

```javascript
var databaseName = "Mijn database";
var myDatabase = copernica.database(databaseName);
```

## Meer informatie

* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Profile data-script](./followups-scripting-profile)
* [Subprofile data-script](./followups-scripting-subprofile)
* [Template data-script](./followups-scripting-template)
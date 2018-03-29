#  Data object - copernica 

Het copernica data-script is gelinkt aan het account dat je hebt geregistreerd bij Copernica. 
Aanpassingen aan het globale `copernica.data` object zijn in alle scripts van het account 
zichtbaar.


## Beschikbare eigenschappen

* data: zie de documentatie van [data data-script](./data-object-data)


## Beschikbare functies

* database(id of naam): 		een [database](./data-object-database) instantie kan opgevraagd worden per naam of id;
* collection(id): 				een [collection](./data-object-collection) instantie kan opgevraagd worden per id;
* profile(id): 					een [profile](./data-object-profile) instantie kan opgevraagd worden per id;
* subprofile(id):				een [subprofile](./data-object-subprofile) instantie kan opgevraagd worden per id;
* template(id): 				een [template](./data-object-template) instantie kan opgevraagd worden per id.


## Voorbeeld

Met het volgende voorbeeld in JavaScript kun je een database van een account opvragen.

```javascript
var databaseName = "Mijn database";
var myDatabase = copernica.database(databaseName);
```


## Meer informatie

* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)
* [Profiel data-script](./data-object-profile)
* [Subprofiel data-script](./data-object-subprofile)
* [Template data-script](./data-object-template)

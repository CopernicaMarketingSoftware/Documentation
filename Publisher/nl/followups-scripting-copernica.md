# Copernica data-script 

De *copernica* class is gelinkt aan het account die je hebt geregistreerd bij Copernica. De globale `copernica`
variabele is de enige instantie van deze class. Deze is beschikbaar in het script en geeft 
toegang tot de data die bij jouw account hoort. Deze informatie is beschikbaar binnen alle scripts gemaakt met deze account,
dus aanpassing van het globale `copernica.data` object zijn in alle scripts over het hele account zichtbaar.


## Beschikbare eigenschappen

* **data**: zie de documentatie van [het data object](./followups-scripting-data)


## Beschikbare functies

* **database(*id* of *naam*)**: een [database](./followups-scripting-database) instantie kan opgevraagd worden per naam of ID
* **collection(*id*)**: een [collectie](./followups-scripting-collection) instantie kan opgevraagd worden per ID
* **profile(*id*)**: een [profiel](./followups-scripting-profile) instantie kan opgevraagd worden per ID
* **subprofile(*id*)**: een [subprofiel](./followups-scripting-subprofile) instantie kan opgevraagd worden per ID
* **template(*id*)**: een [template](./followups-scripting-template) instantie kan opgevraagd worden per ID


## Voorbeeld

Met het volgende voorbeeld in Javascript kun je een database van een account opvragen.

```javascript
var databaseName = "Mijn database";
var myDatabase = copernica.database(databaseName);
```

## Meer informatie

* [Data-script](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Profile data-script](./followups-scripting-profile)
* [Subprofile data-script](./followups-scripting-subprofile)
* [Template data-script](./followups-scripting-template)
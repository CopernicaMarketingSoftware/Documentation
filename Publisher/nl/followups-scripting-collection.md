#  Scripting - collection

Een collectie is een subset van een [database](./followups-scripting-database) 
en kan ook gebruikt worden in een data-script of followup. 
Zie [het copernica data-script](./followups-scripting-copernica) voor het
opvragen van een instantie van een collectie.

## Beschikbare eigenschappen

* id: 			id van de collection (read only)
* name: 		naam van de collection (read and write)
* created: 		tijdstip waarop de collection is aangemaakt (read only)
* subprofiles: 	een array met [subprofiles](./followups-scripting-data) 
                in deze collection. Het id van een subprofile kan als key gebruikt 
                worden om een subprofile object uit de array op te vragen (zie voorbeeld).
* data: 		een geavanceerde eigenschap waarin je zelf meer informatie op kan slaan. 
Zie ook de documentatie over de [data eigenschap](./followups-scripting-data).

## Voorbeeld

Met het volgende voorbeeld in JavaScript kun je een subprofiel uit een 
collectie opvragen.

```javascript
var subProfileID = 54840;
var someSubProfile = collection.subprofiles[subProfileID];
```

## Meer informatie

* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Database data-script](./followups-scripting-database)

#  Data object - collection

Een collection is een subset van een [database](./data-object-database) en kan ook gebruikt worden 
in een data-script of followup. Zie [het copernica data-script](./data-object-copernica) voor het
opvragen van een instantie van een collectie.

## Beschikbare eigenschappen

* id: 			id van de collection (read only)
* name: 		naam van de collection (read and write)
* created: 		tijdstip waarop de collection is aangemaakt (read only)
* subprofiles: 	een array met [subprofiles](./data-object-data) in deze collection. Het id van een subprofile kan als key gebruikt worden om een subprofile object uit de array op te vragen (zie voorbeeld).
* data: 		zie de documentatie over de [data data-script](./data-object-data)

## Voorbeeld

Met het volgende voorbeeld in JavaScript kun je een subprofile uit een 
collection opvragen.

```javascript
var subProfileID = 54840;
var someSubProfile = collection.subprofiles[subProfileID];
```

## Meer informatie
* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)
* [Database data-script](./data-object-database)

# Data object - database

Je kunt het database data-script gebruiken om data uit de database
op te vragen of te veranderen. Er zijn een aantal eigenschappen
beschikbaar om aan te geven wat je precies uit de database wilt
opvragen.


## Beschikbare eigenschappen

* id: 				id van de database (read only);
* name: 			naam van de database (read and write);
* description: 		omschrijving van de database (read and write);
* archived: 		een boolean waarde om aan te geven of de database gearchiveerd is (read and write);
* created: 			tijdstip van aanmaken (read only);
* profiles: 		array van database [profielen](./data-object-profile). De keys in dit object zijn ids van profielen die gebruikt kunnen worden om de profielen zelf op te vragen;
* data: 			zie de documentatie over [het data object](./data-object-data).


## Voorbeeld

Met het volgende voorbeeld kun je een profiel uit een database 
opvragen:

```javascript
var profileID = 54840;
var someProfile = database.profiles[profileID];
```


## Meer informatie

* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)
* [Collectie data-script](./data-object-collection)

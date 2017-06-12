# Data-script - database

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
* profiles: 		array van database [profielen](./followups-scripting-profile). De keys in dit object zijn ids van profielen die gebruikt kunnen worden om de profielen zelf op te vragen;
* data: 			zie de documentatie over [het data object](./followups-scripting-data).


## Voorbeeld

Met het volgende voorbeeld kun je een profiel uit een database 
opvragen:

```javascript
var profileID = 54840;
var someProfile = database.profiles[profileID];
```


## Meer informatie

* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Collection data-script](./followups-scripting-collection)
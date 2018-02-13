# Data-script - profile

Het profile data-script wordt gebruikt om gegevens 
van een profile aan te passen of op te vragen. 
Een profile kan op meerdere manieren worden 
verkregen. Bijvoorbeeld via het [copernica data-script](./followups-scripting-copernica) 
of via het [database data-script](./followups-scripting-database).


## Beschikbare eigenschappen

* id: 				id van een profile (read-only);
* secret: 			geheime code van het profile, gelijk aan code (read and write);
* code: 			geheime code van het profile, gelijk aan secret (read and write);
* extra: 			extra data (Read and write);
* created: 			tijdstip van aanmaken profile (read-only);
* removed: 			tijdstip van verwijderen profile (read-only);
* unsubscribed: 	boolean waarde die aangeeft of een profile uitgeschreven is (read-only);
* database: 		[database](./followups-scripting-database) van het profile (read-only);
* fields:			hash map van de "fields" parameter van een profile. De naam wordt hier gebruikt als eigenschap (read and write);
* interests: 		hash map van de "interests" parameter van een profile. De naam wordt hier gebruikt als eigenschap (read and write);
* data: 			zie documentatie over het [data data-script](./followups-scripting-data).


## Beschikbare functies

* remove():			remove profile;
* unsubscribe(): 	unsubscribe profile;
* createSubProfile(collection):  Create a subprofile in the specified collection, returns the newly created subprofile;
* subProfiles(collection (optional)):  Retrieve subprofiles from this profile, optionally specify a collection.


## Voorbeeld

Met het volgende voorbeeld kun je een veld 
van een profile opvragen. In dit geval wordt 
de leeftijd van een profile opgevraagd. 
Uiteraard kun je elk veld linken aan een profile.


```javascript
var profileAge = profile.fields.age;
```


## Meer informatie

* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Database data-script](./followups-scripting-database)
* [Subprofile data-script](./followups-scripting-subprofile)
* [Destination data-script](./followups-scripting-destination)

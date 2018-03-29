<<<<<<< HEAD:Publisher/nl/followups-scripting-subprofile.md
# Scripting - subprofile
=======
# Data object - subprofile
>>>>>>> newfollowups:Publisher/nl/data-object-subprofile.md

Het subprofiel data-script kan worden gebruikt om 
informatie over een subprofiel op te vragen of aan 
te passen. Hieronder staan de beschikbare eigenschappen
beschreven. 

<<<<<<< HEAD:Publisher/nl/followups-scripting-subprofile.md
=======
Je kunt de variabele en zijn beschikbare eigenschappen aanpassen vanuit 
Javascript code of met het "Subprofile microdata" knopje wanneer je een profiel 
geselecteerd hebt onder het *Database & Profiles* tabje.

>>>>>>> newfollowups:Publisher/nl/data-object-subprofile.md
## Beschikbare eigenschappen

* id:				id van een profile (read-only);
* secret: 			geheime code van het profile, gelijk aan code (read and write);
* code: 			geheime code van het profile, gelijk aan secret (read and write);
* extra: 			extra data (read and write);
* reated: 			tijdstip van aanmaken profile (read-only);
* removed: 			tijdstip van verwijderen profile (read-only);
* unsubscribed: 	boolean waarde die aangeeft of een profile uitgeschreven is (read-only);
* collection: 		[collection](./data-object-collection) van het subprofiel (read-only);
* fields: 			hash map van de "fields" parameter van een profile. De namen worden hier gebruikt als eigenschap (read and write);
* interests: 		hash map van de "interests" parameter van een profile. De namen worden hier gebruikt als eigenschap (read and write);
<<<<<<< HEAD:Publisher/nl/followups-scripting-subprofile.md
* data:				een geavanceerde eigenschap waarin je zelf meer informatie op kan slaan. 
Zie ook de documentatie over de [data eigenschap](./followups-scripting-data).
=======
* data:				zie documentatie over het [data data-script](./data-object-data).
>>>>>>> newfollowups:Publisher/nl/data-object-subprofile.md

## Beschikbare functies

* remove(): 		remove subprofile;
* unsubscribe(): 	unsubscribe subprofile.

## Voorbeeld

Met het volgende voorbeeld kun je een veld van een subprofiel 
opvragen. In dit geval wordt de leeftijd opgevraagd. Uiteraard
kun je elk veld linken aan een profile.


```javascript
var profileAge = subprofile.fields.age;
```

## Meer informatie

* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)
* [Database data-script](./data-object-database)
* [Profiel data-script](./data-object-profile)
* [Destination data-script](./data-object-destination)

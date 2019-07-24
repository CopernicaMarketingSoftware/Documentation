# Data object - profile

Het profile data-script wordt gebruikt om gegevens 
van een profile aan te passen of op te vragen. 
Een profile kan op meerdere manieren worden 
verkregen. Bijvoorbeeld via het [copernica data-script](./data-object-copernica) 
of via het [database data-script](./data-object-database).

Je kunt de variabele en zijn beschikbare eigenschappen aanpassen vanuit 
Javascript code of met het "Profile microdata" knopje wanneer je een profiel 
geselecteerd hebt onder het *Database & Profiles* tabje.

## Beschikbare eigenschappen

* id: 				id van een profile (read-only)
* secret: 			geheime code van het profile, gelijk aan code (read and write)
* code: 			geheime code van het profile, gelijk aan secret (read and write)
* extra: 			extra data (Read and write)
* created: 			tijdstip van aanmaken profile (read-only)
* removed: 			tijdstip van verwijderen profile (read-only)
* unsubscribed: 	boolean waarde die aangeeft of een profile uitgeschreven is (read-only)
* database: 		[database](./data-object-database) van het profile (read-only)
* fields:			velden behorend bij een profile, elk veld is een property (read/write) en kan worden gebruikt als ("profile.fields.testfield = 'newval';" (write) of "var testval = profile.fields.testfield;" (read) 
* interests: 		interesses behorend bij een profile, elke interesse is een property (read/write) en kan worden gebruikt als ("profile.interests.testinterest = true;" (write) of "var testinterest = profile.interests.testinterest;" (read)
* data: 			zie documentatie over het [data data-script](./data-object-data)

## Beschikbare functies

* remove():			Verwijder profiel;
* unsubscribe(): 	Schrijf profiel uit;
* createSubProfile(collection):  Maak een nieuw subprofiel aan, returnwaarde is het nieuwe subprofiel;
* subProfiles(collection (optioneel)):  Haal alle subprofielen op, eventueel uit een specifieke collectie.

## Voorbeeld

Met het volgende voorbeeld kun je een veld 
van een profile opvragen. In dit geval wordt 
de leeftijd van een profile opgevraagd. 
Uiteraard kun je elk veld linken aan een profile.

```javascript
var profileAge = profile.fields.age;
```

## Meer informatie

* [Data-scripts](./data-object)
* [Data data-script](./data-object-data)
* [Database data-script](./data-object-database)
* [Subprofiel data-script](./data-object-subprofile)
* [Destination data-script](./data-object-destination)

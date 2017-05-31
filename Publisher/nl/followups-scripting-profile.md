# Profile data-script

Het profile data-script wordt gebruikt om gegevens van een profiel aan te passen en op
te vragen. Een profiel kan op meerdere manieren worden verkregen. Ten eerste is er altijd 
een globale `profile` variabele, welke een instantie van de **profiel** class bevat. Dit is altijd 
het profiel waar de mail naar is verzonden. Daarnaast kan een profiel worden opgevraagd via het 
[Copernica](./followups-scripting-copernica) object, met een id. Als laatste kan een profiel worden verkregen
uit een [database](./followups-scripting-database).

## Beschikbare eigenschappen

* id: 				id van een profile (Read-only);
* secret: 			geheime code van het profile, gelijk aan `code`. (Read and write);
* code: 			geheime code van het profile, gelijk aan `secret`. (Read and write);
* extra: 			extra data (Read and write);
* created: 			tijdstip van aanmaken profile (Read-only);
* removed: 			tijdstip van verwijderen profile (Read-only);
* unsubscribed: 	boolean waarde die aangeeft of een profile uitgeschreven is (Read-only);
* database: 		[Database](./followups-scripting-database) van het profile (Read-only);
* fields:			hash map van de "fields" parameter van een profile. De naam wordt hier gebruikt als eigenschap (Read and write);
* interests: 		hash map van de "interests" parameter van een profile. De naam wordt hier gebruikt als eigenschap (Read and write);
* data: 			zie documentatie over [data data-script](./followups-scripting-data).


## Beschikbare functies

* remove():			verwijder dit profile
* unsubscribe(): 	unsubscribe dit profile

## Voorbeeld

Met het volgende voorbeeld kun je een veld van een profile opvragen. 
In dit geval vragen we de leeftijd op, maar je kunt elk veld in 
het profile op deze manier opvragen.

    var profileAge = profile.fields.age;

## Meer informatie

* [Data-scripts](./followups-scripting)
* [Data data-script](./followups-scripting-data)
* [Database data-script](./followups-scripting-database)
* [Subprofile data-script](./followups-scripting-subprofile)
* [Destination data-script](./followups-scripting-destination)
